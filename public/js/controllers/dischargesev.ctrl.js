(function(){
    'use strict';
    angular
        .module('emrApp')
        .controller('DischargesEVCtrl', DischargesEVCtrl)
        .controller('DischargesEVCreateCtrl', DischargesEVCCreateCtrl)
        .controller('DischargesEVActionModalInsatanceCtrl', DischargesEVActionModalInsatanceCtrl)

        DischargesEVCtrl.$inject = ['DischargesEVSrvcs', '$stateParams', '$uibModal', '$window'];
        function DischargesEVCtrl(DischargesEVSrvcs, $stateParams, $uibModal, $window){
            var vm = this;
            var data = {};

            alert('ev')

            DischargesEVSrvcs.list({id:'', reporting_year:$stateParams.reporting_year}).then (function (response) {
                if(response.data.status == 200)
                {
                    vm.opv = response.data.data[0];
                    vm.opv_count = response.data.count;
                    console.log(vm.opv)
                }
            }, function (){ alert('Bad Request!!!') })

            vm.sendDataDoh = function(){
                DischargesEVSrvcs.send_data_doh().then (function (response) {
                    alert('Success!')
                }, function (){ alert('Bad Request!!!') })
            }

            vm.routeTo = function(route){
                $window.location.href = route;
            }; 
        }

        DischargesEVCCreateCtrl.$inject = ['DischargesEVSrvcs', '$stateParams', '$uibModal', '$window'];
        function DischargesEVCCreateCtrl(DischargesEVSrvcs, $stateParams, $uibModal, $window){
            var vm = this;
            var data = {}; 

            alert('ev details')
        
            if($stateParams.reporting_year){

                DischargesEVSrvcs.list({id:'', reporting_year:$stateParams.reporting_year}).then (function (response) {
                    if(response.data.status == 200)
                    {
                        vm.data = response.data.data[0];
                        vm.data_count = response.data.count;
                        console.log(vm.data)

                        $uibModal.open({
                            templateUrl: 'add-discharges-ev-modal',
                            controller: 'DischargesEVActionModalInsatanceCtrl',
                            controllerAs: 'dischargesEVCtrl',
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

        DischargesEVActionModalInsatanceCtrl.$inject = ['collection', 'DischargesEVSrvcs', '$state', '$stateParams', '$uibModalInstance', '$window'];
        function DischargesEVActionModalInsatanceCtrl (collection, DischargesEVSrvcs, $state, $stateParams, $uibModalInstance, $window) {

            var vm = this;
            vm.collection = collection.data;
            vm.collection_copy = collection.data;

            vm.createDischargeEVBtn = function(data){
                
                data['reportingyear'] = $stateParams.reporting_year;
                console.log(data);
                DischargesEVSrvcs.store(data).then(function(response){
                    if (response.data.status == 200) {
                        alert(response.data.message);
                        $state.go('hospital-operations-discharges-ev', {reporting_year:$stateParams.reporting_year});
                        $uibModalInstance.close();
                    }
                    else {
                        alert(response.data.message);
                    }
                    console.log(response.data);
                });
            };

            vm.updateDischargeEVBtn = function(data){

                data['reportingyear'] = $stateParams.reporting_year;
                console.log(data);

                DischargesEVSrvcs.update(data).then(function(response){
                    if (response.data.status == 200) {
                        alert(response.data.message);
                        $state.go('hospital-operations-discharges-ev', {reporting_year:$stateParams.reporting_year});
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