(function(){
    'use strict';
    angular
        .module('emrApp')
        .controller('SurgicalOperationsMinorCtrl', SurgicalOperationsMinorCtrl)
        .controller('SurgicalOperationsMinorActionModalInsatanceCtrl', SurgicalOperationsMinorActionModalInsatanceCtrl)

        SurgicalOperationsMinorCtrl.$inject = ['SurgicalOperationsMinorSrvcs','SurgeriesSrvcs', '$stateParams', '$state', '$uibModal', '$window', '$rootScope', '$scope'];
        function SurgicalOperationsMinorCtrl(SurgicalOperationsMinorSrvcs, SurgeriesSrvcs, $stateParams, $state, $uibModal, $window, $rootScope, $scope){
            var vm = this;
            var data = {};

            vm.reportingyear = $stateParams.reportingyear; 
 
            var counter = 1;

            vm.reportingyears = [];
            for(var year=2010; year<=2019; year++){
                vm.reportingyears.push({id:counter, year:year})
                counter++;
            }

            console.log(vm.reportingyears)

            vm.selectReportingYear = function(reportingyear){
                $state.go('hospital-operations-surgical-operations-minor', {reportingyear:reportingyear});
            }

            vm.is_loader_disabled = false;
            vm.is_submit_disabled = false;

            SurgicalOperationsMinorSrvcs.list({id:'', reportingyear:$stateParams.reportingyear}).then (function (response) {
                if(response.data.status == 200)
                {
                    vm.surgical_operations = response.data.data;
                    vm.surgical_operations_count = response.data.count;
                    console.log(vm.surgical_operations)
                }
            }, function (){ alert('Bad Request!!!') })

            vm.selectSurgeryType =  function(){
        
                var uibModal = $uibModal.open({
                    templateUrl: 'add-surgical-operation-minor-modal',
                    controller: 'SurgicalOperationsMinorActionModalInsatanceCtrl',
                    controllerAs: 'surgicalOperationsMinorCtrl',
                    backdrop: 'static',
                    keyboard  : false,
                    resolve :{
                        collection: function () {
                            return {
                                // data: vm.surgical_operation,
                                
                            };
                        }
                    },
                    size: 'lg'
                });

                uibModal.result.then(function(result) {
                    console.log(result);
                    vm.surgical_operation = result;
                })
            }

            vm.createSurgicalOperationtBtn = function(data){
                
                data['reportingyear'] = $stateParams.reportingyear;
                console.log(data);
                SurgicalOperationsMinorSrvcs.store(data).then(function(response){
                    if (response.data.status == 200) {
                        alert(response.data.message);
                        SurgicalOperationsMinorSrvcs.list({id:'', reportingyear:$stateParams.reportingyear}).then (function (response) {
                            if(response.data.status == 200)
                            {
                                vm.surgical_operations = response.data.data;
                                console.log(vm.surgical_operations)
                            }
                        }, function (){ alert('Bad Request!!!') })
                    }
                    else {
                        alert(response.data.message);
                    }
                    console.log(response.data);
                });
            };

            vm.deleteSurgicalOperationtBtn = function(id){
                
                data['id'] = id;
                data['reportingyear'] = $stateParams.reportingyear;
                console.log(data);
                SurgicalOperationsMinorSrvcs.remove(data).then(function(response){
                    if (response.data.status == 200) {
                        alert(response.data.message);
                        SurgicalOperationsMinorSrvcs.list({id:'', reportingyear:$stateParams.reportingyear}).then (function (response) {
                            if(response.data.status == 200)
                            {
                                vm.surgical_operations = response.data.data;
                                console.log(vm.surgical_operations)
                            }
                        }, function (){ alert('Bad Request!!!') })
                    }
                    else {
                        alert(response.data.message);
                    }
                    console.log(response.data);
                });
            };


            vm.sendDataDoh = function(){

                vm.is_loader_disabled = true;
                vm.is_submit_disabled = true;

                data['reportingyear'] = $stateParams.reportingyear;
                SurgicalOperationsMinorSrvcs.send_data_doh(data).then (function (response) {
                    alert('Successfully submitted!')

                    vm.is_loader_disabled = false;
                    vm.is_submit_disabled = false;
                }, function (){ alert('Bad Request!!!') })
            }

            vm.routeTo = function(route){
                $window.location.href = route;
            };


        }

        SurgicalOperationsMinorActionModalInsatanceCtrl.$inject = ['collection', 'SurgicalOperationsMinorSrvcs', 'SurgeriesSrvcs', 'mySharedService', '$state', '$stateParams', '$uibModalInstance', '$window', '$rootScope','$scope', '$compile', 'DTOptionsBuilder', 'DTColumnBuilder'];
        function SurgicalOperationsMinorActionModalInsatanceCtrl (collection, SurgicalOperationsMinorSrvcs, SurgeriesSrvcs, mySharedService, $state, $stateParams, $uibModalInstance, $window, $rootScope, $scope, $compile, DTOptionsBuilder, DTColumnBuilder) {

            var vm = this;
            vm.collection = collection.data;
            vm.collection_copy = collection.data;

            console.log(vm.collection)

            SurgeriesSrvcs.list({id:'', proccode:''}).then (function (response) {
                if(response.data.status == 200)
                {
                    vm.serguries = response.data.data;
                    vm.serguries_count = response.data.count;
                    console.log(vm.serguries)
                }
            }, function (){ alert('Bad Request!!!') })

            vm.chooseOperaCode = function(proccode){
 
                SurgeriesSrvcs.list({id:'', proccode:proccode}).then (function (response) {
                    if(response.data.status == 200)
                    {
                        vm.surgery  = response.data.data[0];
                        vm.surgical_operation = {operationcode:vm.surgery.proccode, surgicaloperation:vm.surgery.procdesc};
                        $uibModalInstance.close(vm.surgical_operation);
                    }
                }, function (){ alert('Bad Request!!!') })

            }

            vm.render = function(data) {
                return ' <a href="#" ng-click="surgicalOperationsMinorCtrl.chooseOperaCode(\'' + data + '\');"> ' + data + '</a>';
            }

            vm.dtOptions = DTOptionsBuilder.newOptions()
                .withOption('ajax', {
                // Either you specify the AjaxDataProp here
                // dataSrc: 'data',
                url: 'api/v1/surgeries2',
                type: 'GET'
            })
            // or here
            .withDataProp('data')
                .withOption('processing', true)
                .withOption('serverSide', true)
                .withPaginationType('full_numbers');
            vm.dtColumns = [
                DTColumnBuilder.newColumn('id').withTitle('ID'),
                DTColumnBuilder.newColumn('proccode').withTitle('CODE').renderWith(vm.render)
                .withOption('createdCell', function(cell, cellData, rowData, rowIndex, colIndex) {
                    $compile(angular.element(cell).contents())($scope);
                }), 
                DTColumnBuilder.newColumn('procdesc').withTitle('DESC')
            ];

            

            vm.routeTo = function(route){
                $window.location.href = route;
            };

            vm.close = function() {
                $uibModalInstance.close();
            };
        }

})();