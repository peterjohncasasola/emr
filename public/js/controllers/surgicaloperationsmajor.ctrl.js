(function(){
    'use strict';
    angular
        .module('emrApp')
        .controller('SurgicalOperationsMajorCtrl', SurgicalOperationsMajorCtrl)
        .controller('SurgicalOperationsMajorActionModalInsatanceCtrl', SurgicalOperationsMajorActionModalInsatanceCtrl)

        SurgicalOperationsMajorCtrl.$inject = ['SurgicalOperationsMajorSrvcs','SurgeriesSrvcs', '$stateParams', '$state', '$uibModal', '$window', '$rootScope', '$scope'];
        function SurgicalOperationsMajorCtrl(SurgicalOperationsMajorSrvcs, SurgeriesSrvcs, $stateParams, $state, $uibModal, $window, $rootScope, $scope){
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
                $state.go('hospital-operations-surgical-operations-major', {reportingyear:reportingyear});
            }

            SurgicalOperationsMajorSrvcs.list({id:'', reportingyear:$stateParams.reportingyear}).then (function (response) {
                if(response.data.status == 200)
                {
                    vm.surgical_operations = response.data.data;
                    vm.surgical_operations_count = response.data.count;
                    console.log(vm.surgical_operations)
                }
            }, function (){ alert('Bad Request!!!') })

            vm.selectSurgeryType =  function(){
        
                var uibModal = $uibModal.open({
                    templateUrl: 'add-surgical-operation-modal',
                    controller: 'SurgicalOperationsMajorActionModalInsatanceCtrl',
                    controllerAs: 'surgicalOperationsMajorCtrl',
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
                SurgicalOperationsMajorSrvcs.store(data).then(function(response){
                    if (response.data.status == 200) {
                        alert(response.data.message);
                        SurgicalOperationsMajorSrvcs.list({id:'', reportingyear:$stateParams.reportingyear}).then (function (response) {
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
                SurgicalOperationsMajorSrvcs.remove(data).then(function(response){
                    if (response.data.status == 200) {
                        alert(response.data.message);
                        SurgicalOperationsMajorSrvcs.list({id:'', reportingyear:$stateParams.reportingyear}).then (function (response) {
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
                data['reportingyear'] = $stateParams.reportingyear;
                SurgicalOperationsMajorSrvcs.send_data_doh(data).then (function (response) {
                    alert('Successfully submitted!')
                }, function (){ alert('Bad Request!!!') })
            }

            vm.routeTo = function(route){
                $window.location.href = route;
            };


        }

        SurgicalOperationsMajorActionModalInsatanceCtrl.$inject = ['collection', 'SurgicalOperationsMajorSrvcs', 'SurgeriesSrvcs', 'mySharedService', '$state', '$stateParams', '$uibModalInstance', '$window', '$rootScope','$scope'];
        function SurgicalOperationsMajorActionModalInsatanceCtrl (collection, SurgicalOperationsMajorSrvcs, SurgeriesSrvcs, mySharedService, $state, $stateParams, $uibModalInstance, $window, $rootScope, $scope) {

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

            

            vm.routeTo = function(route){
                $window.location.href = route;
            };

            vm.close = function() {
                $uibModalInstance.close();
            };
        }

})();