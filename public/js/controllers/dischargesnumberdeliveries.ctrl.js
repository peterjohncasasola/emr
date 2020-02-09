(function(){
    'use strict';
    angular
        .module('emrApp')
        .controller('DischargesNumberDeliveriesCtrl', DischargesNumberDeliveriesCtrl)
        .controller('DischargesNumberDeliveriesCreateCtrl', DischargesNumberDeliveriesCreateCtrl)
        .controller('DischargesNumberDeliveriesActionModalInsatanceCtrl', DischargesNumberDeliveriesActionModalInsatanceCtrl)

        DischargesNumberDeliveriesCtrl.$inject = ['DischargesNumberDeliveriesSrvcs', '$stateParams', '$state', '$uibModal', '$window'];
        function DischargesNumberDeliveriesCtrl(DischargesNumberDeliveriesSrvcs, $stateParams, $state, $uibModal, $window){
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
                $state.go('hospital-operations-discharges-number-deliveries', {reportingyear:reportingyear});
            }

            DischargesNumberDeliveriesSrvcs.list({id:'', reportingyear:$stateParams.reportingyear}).then (function (response) {
                if(response.data.status == 200)
                {
                    vm.number_delivery = response.data.data[0];
                    vm.number_delivery_count = response.data.count;
                    console.log(vm.number_delivery)
                }
            }, function (){ alert('Bad Request!!!') })

            vm.sendDataDoh = function(){

                data['reportingyear'] = $stateParams.reportingyear;
                DischargesNumberDeliveriesSrvcs.send_data_doh(data).then (function (response) {
                    alert('Successfully submitted!')
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
        
            if($stateParams.reportingyear){

                DischargesNumberDeliveriesSrvcs.list({id:'', reportingyear:$stateParams.reportingyear}).then (function (response) {
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
            vm.reportingyear = $stateParams.reportingyear; 

            vm.createDischargeNumberDeliveryBtn = function(data){
                
                data['reportingyear'] = $stateParams.reportingyear;
                console.log(data);
                DischargesNumberDeliveriesSrvcs.store(data).then(function(response){
                    if (response.data.status == 200) {
                        alert(response.data.message);
                        $state.go('hospital-operations-discharges-number-deliveries', {reportingyear:$stateParams.reportingyear});
                        $uibModalInstance.close();
                    }
                    else {
                        alert(response.data.message);
                    }
                    console.log(response.data);
                });
            };

            vm.updateDischargeNumberDeliveryBtn = function(data){

                data['reportingyear'] = $stateParams.reportingyear;
                console.log(data);

                DischargesNumberDeliveriesSrvcs.update(data).then(function(response){
                    if (response.data.status == 200) {
                        alert(response.data.message);
                        $state.go('hospital-operations-discharges-number-deliveries', {reportingyear:$stateParams.reportingyear});
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