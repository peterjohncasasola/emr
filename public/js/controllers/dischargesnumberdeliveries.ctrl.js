(function(){
    'use strict';
    angular
        .module('emrApp')
        .controller('DischargesNumberDeliveriesCtrl', DischargesNumberDeliveriesCtrl)
        .controller('DischargesNumberDeliveriesCreateCtrl', DischargesNumberDeliveriesCreateCtrl)
        .controller('DischargesNumberDeliveriesActionModalInsatanceCtrl', DischargesNumberDeliveriesActionModalInsatanceCtrl)

        DischargesNumberDeliveriesCtrl.$inject = ['DischargesNumberDeliveriesSrvcs', '$stateParams', '$uibModal', '$window'];
        function DischargesNumberDeliveriesCtrl(DischargesNumberDeliveriesSrvcs, $stateParams, $uibModal, $window){
            var vm = this;
            var data = {};

            DischargesNumberDeliveriesSrvcs.list({id:'', reporting_year:$stateParams.reporting_year}).then (function (response) {
                if(response.data.status == 200)
                {
                    vm.number_delivery = response.data.data[0];
                    vm.number_delivery_count = response.data.count;
                    console.log(vm.number_delivery)
                }
            }, function (){ alert('Bad Request!!!') })

            vm.sendDataDoh = function(){
                DischargesNumberDeliveriesSrvcs.send_data_doh().then (function (response) {
                    alert('Success!')
                }, function (){ alert('Bad Request!!!') })
            }

            vm.routeTo = function(route){
                $window.location.href = route;
            }; 
        }

        DischargesNumberDeliveriesCreateCtrl.$inject = ['DischargesNumberDeliveriesSrvcs', '$stateParams', '$uibModal', '$window'];
        function DischargesNumberDeliveriesCreateCtrl(DischargesNumberDeliveriesSrvcs, $stateParams, $uibModal, $window){
            var vm = this;
            var data = {}; 
        
            if($stateParams.reporting_year){

                DischargesNumberDeliveriesSrvcs.list({id:'', reporting_year:$stateParams.reporting_year}).then (function (response) {
                    if(response.data.status == 200)
                    {
                        vm.data = response.data.data[0];
                        vm.data_count = response.data.count;
                        console.log(vm.data)

                        $uibModal.open({
                            templateUrl: 'add-discharges-number-delivery-modal',
                            controller: 'DischargesNumberDeliveriesActionModalInsatanceCtrl',
                            controllerAs: 'dischargesNumberDeliveriesCtrl',
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

        DischargesNumberDeliveriesActionModalInsatanceCtrl.$inject = ['collection', 'DischargesNumberDeliveriesSrvcs', '$state', '$stateParams', '$uibModalInstance', '$window'];
        function DischargesNumberDeliveriesActionModalInsatanceCtrl (collection, DischargesNumberDeliveriesSrvcs, $state, $stateParams, $uibModalInstance, $window) {

            var vm = this;
            vm.collection = collection.data;
            vm.collection_copy = collection.data;

            vm.createDischargeNumberDeliveryBtn = function(data){
                
                data['reportingyear'] = $stateParams.reporting_year;
                console.log(data);
                DischargesNumberDeliveriesSrvcs.store(data).then(function(response){
                    if (response.data.status == 200) {
                        alert(response.data.message);
                        $state.go('hospital-operations-discharges-number-deliveries', {reporting_year:$stateParams.reporting_year});
                        $uibModalInstance.close();
                    }
                    else {
                        alert(response.data.message);
                    }
                    console.log(response.data);
                });
            };

            vm.updateDischargeNumberDeliveryBtn = function(data){

                data['reportingyear'] = $stateParams.reporting_year;
                console.log(data);

                DischargesNumberDeliveriesSrvcs.update(data).then(function(response){
                    if (response.data.status == 200) {
                        alert(response.data.message);
                        $state.go('hospital-operations-discharges-number-deliveries', {reporting_year:$stateParams.reporting_year});
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