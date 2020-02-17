(function(){
    'use strict';
    angular
        .module('emrApp')
        .controller('DischargesERCtrl', DischargesERCtrl)
        .controller('DischargesERActionModalInsatanceCtrl', DischargesERActionModalInsatanceCtrl)

        DischargesERCtrl.$inject = ['DischargesERSrvcs','RicbSrvcs', '$stateParams', '$uibModal', '$window', '$rootScope', '$scope'];
        function DischargesERCtrl(DischargesERSrvcs, RicbSrvcs, $stateParams, $uibModal, $window, $rootScope, $scope){
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
                $state.go('hospital-operations-discharges-er', {reportingyear:reportingyear});
            }

            vm.is_loader_disabled = false;
            vm.is_submit_disabled = false;

            DischargesERSrvcs.list({id:'', reportingyear:$stateParams.reportingyear}).then (function (response) {
                if(response.data.status == 200)
                {
                    vm.discharges_er = response.data.data;
                    vm.discharges_er_count = response.data.count;
                    console.log(vm.discharges_er)
                }
            }, function (){ alert('Bad Request!!!') })

            vm.selectIcdType =  function(){
        
                var uibModal = $uibModal.open({
                    templateUrl: 'add-discharges-er-modal',
                    controller: 'DischargesERActionModalInsatanceCtrl',
                    controllerAs: 'dischargesERCtrl',
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
                    vm.ricd10_details = result;
                })
            }

            vm.createDischargeERBtn = function(data){
                
                data['reportingyear'] = $stateParams.reportingyear;
                console.log(data);
                DischargesERSrvcs.store(data).then(function(response){
                    if (response.data.status == 200) {
                        alert(response.data.message);
                        DischargesERSrvcs.list({id:'', reportingyear:$stateParams.reportingyear}).then (function (response) {
                            if(response.data.status == 200)
                            {
                                vm.discharges_er = response.data.data;
                            }
                        }, function (){ alert('Bad Request!!!') })
                    }
                    else {
                        alert(response.data.message);
                    }
                    console.log(response.data);
                });
            };

            vm.deleteDischargeERBtn = function(id){
                
                data['id'] = id;
                data['reportingyear'] = $stateParams.reportingyear;
                console.log(data);
                DischargesERSrvcs.remove(data).then(function(response){
                    if (response.data.status == 200) {
                        alert(response.data.message);
                        DischargesERSrvcs.list({id:'', reportingyear:$stateParams.reportingyear}).then (function (response) {
                            if(response.data.status == 200)
                            {
                                vm.discharges_er = response.data.data;
                                console.log(vm.discharges_er)
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
                DischargesERSrvcs.send_data_doh(data).then (function (response) {
                    alert('Successfully submitted!')


                    vm.is_loader_disabled = false;
                    vm.is_submit_disabled = false;
                }, function (){ alert('Bad Request!!!') })
            }

            vm.routeTo = function(route){
                $window.location.href = route;
            };


        }

        DischargesERActionModalInsatanceCtrl.$inject = ['collection', 'DischargesERSrvcs', 'RicbSrvcs', 'mySharedService', '$state', '$stateParams', '$uibModalInstance', '$window', '$rootScope','$scope', '$compile', 'DTOptionsBuilder', 'DTColumnBuilder'];
        function DischargesERActionModalInsatanceCtrl (collection, DischargesERSrvcs, RicbSrvcs, mySharedService, $state, $stateParams, $uibModalInstance, $window, $rootScope, $scope, $compile, DTOptionsBuilder, DTColumnBuilder) {

            var vm = this;
            vm.collection = collection.data;
            vm.collection_copy = collection.data;
            vm.reportingyear = $stateParams.reportingyear; 

            console.log(vm.collection)

            // RicbSrvcs.list({id:'', icd10code:''}).then (function (response) {
            //     if(response.data.status == 200)
            //     {
            //         vm.ricd10 = response.data.data;
            //         vm.ricd10_count = response.data.count;
            //         console.log(vm.ricd10)
            //     }
            // }, function (){ alert('Bad Request!!!') })
            

            vm.chooseRicd10Code = function(icd10code){

                RicbSrvcs.list({id:'', icd10code:icd10code}).then (function (response) {
                    if(response.data.status == 200)icd10code
                    {
                        vm.ricd10  = response.data.data[0];
                        vm.ricd10_details = {icd10code:vm.ricd10.icd10code, icd10desc:vm.ricd10.icd10desc, icd10cat:vm.ricd10.icd10cat};
                        $uibModalInstance.close(vm.ricd10_details);
                    }
                }, function (){ alert('Bad Request!!!') })

            }

            vm.render = function(data) {
                return ' <a href="#" ng-click="dischargesERCtrl.chooseRicd10Code(\'' + data + '\');"> ' + data + '</a>';
            }

            vm.dtOptions = DTOptionsBuilder.newOptions()
                .withOption('ajax', {
                // Either you specify the AjaxDataProp here
                // dataSrc: 'data',
                url: 'api/v1/ricd2',
                type: 'GET'
            })
            // or here
            .withDataProp('data')
                .withOption('processing', true)
                .withOption('serverSide', true)
                .withPaginationType('full_numbers');
            vm.dtColumns = [
                DTColumnBuilder.newColumn('id').withTitle('ID'),
                DTColumnBuilder.newColumn('icd10code').withTitle('CODE').renderWith(vm.render)
                .withOption('createdCell', function(cell, cellData, rowData, rowIndex, colIndex) {
                    $compile(angular.element(cell).contents())($scope);
                }), 
                DTColumnBuilder.newColumn('icd10desc').withTitle('DESC')
            ];

            vm.routeTo = function(route){
                $window.location.href = route;
            };

            vm.close = function() {
                $uibModalInstance.close();
            };
        }

})();