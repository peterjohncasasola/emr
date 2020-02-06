(function(){
    'use strict';
    angular
        .module('emrApp')
        .controller('DischargesTestingCtrl', DischargesTestingCtrl)
        .controller('DischargesTestingCreateCtrl', DischargesTestingCreateCtrl)
        .controller('DischargesTestingActionModalInsatanceCtrl', DischargesTestingActionModalInsatanceCtrl)

        DischargesTestingCtrl.$inject = ['DischargesTestingSrvcs', '$stateParams', '$uibModal', '$window'];
        function DischargesTestingCtrl(DischargesTestingSrvcs, $stateParams, $uibModal, $window){
            var vm = this;
            var data = {};

            DischargesTestingSrvcs.list({id:'', reporting_year:$stateParams.reporting_year}).then (function (response) {
                if(response.data.status == 200)
                {
                    vm.testing = response.data.data;
                    vm.testing_count = response.data.count;
                    console.log(vm.testing)
                }
            }, function (){ alert('Bad Request!!!') })

            vm.sendDataDoh = function(){
                DischargesTestingSrvcs.send_data_doh().then (function (response) {
                    alert('Success!')
                }, function (){ alert('Bad Request!!!') })
            }

            vm.routeTo = function(route){
                $window.location.href = route;
            }; 
        }

        DischargesTestingCreateCtrl.$inject = ['DischargesTestingSrvcs', '$stateParams', '$uibModal', '$window'];
        function DischargesTestingCreateCtrl(DischargesTestingSrvcs, $stateParams, $uibModal, $window){
            var vm = this;
            var data = {}; 

            if($stateParams.reporting_year){

                DischargesTestingSrvcs.list({id:'', reporting_year:$stateParams.reporting_year}).then (function (response) {
                    if(response.data.status == 200)
                    {
                        vm.data = response.data.data;
                        vm.data_count = response.data.count;
                        console.log(vm.data)

                        $uibModal.open({
                            templateUrl: 'add-discharges-testing-modal',
                            controller: 'DischargesTestingActionModalInsatanceCtrl',
                            controllerAs: 'dischargesTestingCtrl',
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

        DischargesTestingActionModalInsatanceCtrl.$inject = ['collection', 'DischargesTestingSrvcs', '$state', '$stateParams', '$uibModalInstance', '$window'];
        function DischargesTestingActionModalInsatanceCtrl (collection, DischargesTestingSrvcs, $state, $stateParams, $uibModalInstance, $window) {

            var vm = this;
            vm.collection = collection.data;
            vm.collection_copy = collection.data;

            vm.createDischargeTestingBtn = function(data){
                data['reportingyear'] = $stateParams.reporting_year;
                console.log(data);
                DischargesTestingSrvcs.store(data).then(function(response){
                    if (response.data.status == 200) {
                        alert(response.data.message);

                        DischargesTestingSrvcs.list({id:'', reporting_year:$stateParams.reporting_year}).then (function (response) {
                            if(response.data.status == 200)
                            {
                                vm.testing = response.data.data[0];
                                vm.testing_count = response.data.count;
                                console.log(vm.testing)
                            }
                        }, function (){ alert('Bad Request!!!') })

                        $state.go('hospital-operations-discharges-testing', {reporting_year:$stateParams.reporting_year});
                        $uibModalInstance.close();
                    }
                    else {
                        alert(response.data.message);
                    }
                    console.log(response.data);
                });
            };

            vm.updateDischargeTestingBtn = function(data){

                data['reportingyear'] = $stateParams.reporting_year;
                console.log(data);


                DischargesTestingSrvcs.update(data).then(function(response){
                    if (response.data.status == 200) {
                        alert(response.data.message);

                        DischargesTestingSrvcs.list({id:'', reporting_year:$stateParams.reporting_year}).then (function (response) {
                            if(response.data.status == 200)
                            {
                                vm.testing = response.data.data[0];
                                vm.testing_count = response.data.count;
                                console.log(vm.testing)
                            }
                        }, function (){ alert('Bad Request!!!') })

                        $state.go('hospital-operations-discharges-testing', {reporting_year:$stateParams.reporting_year});
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