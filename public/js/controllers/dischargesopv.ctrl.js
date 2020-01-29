(function(){
    'use strict';
    angular
        .module('emrApp')
        .controller('DischargesOPVCtrl', DischargesOPVCtrl)
        .controller('DischargesOPVCreateCtrl', DischargesOPVCCreateCtrl)
        .controller('DischargesOPVActionModalInsatanceCtrl', DischargesOPVActionModalInsatanceCtrl)

        DischargesOPVCtrl.$inject = ['DischargesOPVSrvcs', '$stateParams', '$uibModal', '$window'];
        function DischargesOPVCtrl(DischargesOPVSrvcs, $stateParams, $uibModal, $window){
            var vm = this;
            var data = {};

            alert('opv')

            DischargesOPVSrvcs.list({id:'', reporting_year:$stateParams.reporting_year}).then (function (response) {
                if(response.data.status == 200)
                {
                    vm.opv = response.data.data[0];
                    vm.opv_count = response.data.count;
                    console.log(vm.opv)
                }
            }, function (){ alert('Bad Request!!!') })

            vm.sendDataDoh = function(){
                DischargesOPVSrvcs.send_data_doh().then (function (response) {
                    alert('Success!')
                }, function (){ alert('Bad Request!!!') })
            }

            vm.routeTo = function(route){
                $window.location.href = route;
            }; 
        }

        DischargesOPVCCreateCtrl.$inject = ['DischargesOPVSrvcs', '$stateParams', '$uibModal', '$window'];
        function DischargesOPVCCreateCtrl(DischargesOPVSrvcs, $stateParams, $uibModal, $window){
            var vm = this;
            var data = {}; 

            alert('opv details')
        
            if($stateParams.reporting_year){

                DischargesOPVSrvcs.list({id:'', reporting_year:$stateParams.reporting_year}).then (function (response) {
                    if(response.data.status == 200)
                    {
                        vm.data = response.data.data[0];
                        vm.data_count = response.data.count;
                        console.log(vm.data)

                        $uibModal.open({
                            templateUrl: 'add-discharges-opv-modal',
                            controller: 'DischargesOPVActionModalInsatanceCtrl',
                            controllerAs: 'dischargesOPVCtrl',
                            backdrop: 'static',
                            keyboard  : false,
                            resolve :{
                                collection: function () {
                                    return {
                                        data: vm.data
                                    };
                                }
                            },
                            size: 'lg'
                        });
                    }
                }, function (){ alert('Bad Request!!!') })
            }

            vm.routeTo = function(route){
                $window.location.href = route;
            }; 
        }

        DischargesOPVActionModalInsatanceCtrl.$inject = ['collection', 'DischargesOPVSrvcs', '$state', '$stateParams', '$uibModalInstance', '$window'];
        function DischargesOPVActionModalInsatanceCtrl (collection, DischargesOPVSrvcs, $state, $stateParams, $uibModalInstance, $window) {

            var vm = this;
            vm.collection = collection.data;
            vm.collection_copy = collection.data;

            vm.createDischargeOPVBtn = function(data){
                
                data['reportingyear'] = $stateParams.reporting_year;
                console.log(data);
                DischargesOPVSrvcs.store(data).then(function(response){
                    if (response.data.status == 200) {
                        alert(response.data.message);
                        $state.go('hospital-operations-discharges-opv', {reporting_year:$stateParams.reporting_year});
                        $uibModalInstance.close();
                    }
                    else {
                        alert(response.data.message);
                    }
                    console.log(response.data);
                });
            };

            vm.updateDischargeOPVBtn = function(data){

                data['reportingyear'] = $stateParams.reporting_year;
                console.log(data);

                DischargesOPVSrvcs.update(data).then(function(response){
                    if (response.data.status == 200) {
                        alert(response.data.message);
                        $state.go('hospital-operations-discharges-opv', {reporting_year:$stateParams.reporting_year});
                        $uibModalInstance.close();
                    }
                    else {
                        alert(response.data.message);
                    }
                    console.log(response.data);
                });
            };

            vm.routeTo = function(route){
                $window.location.href = route;
            };

            vm.close = function() {
                $uibModalInstance.close();
            };
        }

})();