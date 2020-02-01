(function(){
    'use strict';
    angular
        .module('emrApp')
        .controller('OperationsHAICtrl', OperationsHAICtrl)
        .controller('OperationsHAICreateCtrl', OperationsHAICreateCtrl)
        .controller('OperationsHAIActionModalInsatanceCtrl', OperationsHAIActionModalInsatanceCtrl)

        OperationsHAICtrl.$inject = ['OperationsHAISrvcs', '$stateParams', '$uibModal', '$window'];
        function OperationsHAICtrl(OperationsHAISrvcs, $stateParams, $uibModal, $window){
            var vm = this;
            var data = {};

            OperationsHAISrvcs.list({id:'', reporting_year:$stateParams.reporting_year}).then (function (response) {
                if(response.data.status == 200)
                {
                    vm.opv = response.data.data[0];
                    vm.opv_count = response.data.count;
                    console.log(vm.opv)
                }
            }, function (){ alert('Bad Request!!!') })

            vm.sendDataDoh = function(){
                OperationsHAISrvcs.send_data_doh().then (function (response) {
                    alert('Success!')
                }, function (){ alert('Bad Request!!!') })
            }

            vm.routeTo = function(route){
                $window.location.href = route;
            }; 
        }

        OperationsHAICreateCtrl.$inject = ['OperationsHAISrvcs', '$stateParams', '$uibModal', '$window'];
        function OperationsHAICreateCtrl(OperationsHAISrvcs, $stateParams, $uibModal, $window){
            var vm = this;
            var data = {}; 
        
            if($stateParams.reporting_year){

                OperationsHAISrvcs.list({id:'', reporting_year:$stateParams.reporting_year}).then (function (response) {
                    if(response.data.status == 200)
                    {
                        vm.data = response.data.data[0];
                        vm.data_count = response.data.count;
                        console.log(vm.data)

                        $uibModal.open({
                            templateUrl: 'add-operation-hai-modal',
                            controller: 'OperationsHAIActionModalInsatanceCtrl',
                            controllerAs: 'operationsHAICtrl',
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

        OperationsHAIActionModalInsatanceCtrl.$inject = ['collection', 'OperationsHAISrvcs', '$state', '$stateParams', '$uibModalInstance', '$window'];
        function OperationsHAIActionModalInsatanceCtrl (collection, OperationsHAISrvcs, $state, $stateParams, $uibModalInstance, $window) {

            var vm = this;
            vm.collection = collection.data;
            vm.collection_copy = collection.data;

            vm.createOperationsHAIBtn = function(data){
                
                data['reportingyear'] = $stateParams.reporting_year;
                console.log(data);
                OperationsHAISrvcs.store(data).then(function(response){
                    if (response.data.status == 200) {
                        alert(response.data.message);
                        $state.go('hospital-operations-hai', {reporting_year:$stateParams.reporting_year});
                        $uibModalInstance.close();
                    }
                    else {
                        alert(response.data.message);
                    }
                    console.log(response.data);
                });
            };

            vm.updateOperationsHAIBtn = function(data){

                data['reportingyear'] = $stateParams.reporting_year;
                console.log(data);

                OperationsHAISrvcs.update(data).then(function(response){
                    if (response.data.status == 200) {
                        alert(response.data.message);
                        $state.go('hospital-operations-hai', {reporting_year:$stateParams.reporting_year});
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