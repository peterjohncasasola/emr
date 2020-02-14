(function(){
    'use strict';
    angular
        .module('emrApp')
        .controller('OperationsHAICtrl', OperationsHAICtrl)
        .controller('OperationsHAICreateCtrl', OperationsHAICreateCtrl)
        .controller('OperationsHAIActionModalInsatanceCtrl', OperationsHAIActionModalInsatanceCtrl)

        OperationsHAICtrl.$inject = ['OperationsHAISrvcs', '$stateParams', '$state', '$uibModal', '$window'];
        function OperationsHAICtrl(OperationsHAISrvcs, $stateParams, $state, $uibModal, $window){
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
                $state.go('hospital-operations-hai', {reportingyear:reportingyear});
            }
 

            vm.is_loader_disabled = false;
            vm.is_submit_disabled = false;

            OperationsHAISrvcs.list({id:'', reportingyear:$stateParams.reportingyear}).then (function (response) {
                if(response.data.status == 200)
                {
                    vm.hai = response.data.data[0];
                    vm.hai_count = response.data.count;
                    console.log(vm.hai)
                }
            }, function (){ alert('Bad Request!!!') })

            vm.sendDataDoh = function(){
                vm.is_loader_disabled = true;
                vm.is_submit_disabled = true;

                data['reportingyear'] = $stateParams.reportingyear;

                OperationsHAISrvcs.send_data_doh(data).then (function (response) {
                    alert('Successfully submitted!')

                    OperationsHAISrvcs.list({id:'', reportingyear:$stateParams.reportingyear}).then (function (response) {
                        if(response.data.status == 200)
                        {
                            vm.hai = response.data.data[0];
                            vm.hai_count = response.data.count;
                            console.log(vm.hai)
                        }
                    }, function (){ alert('Bad Request!!!') })

                    vm.is_loader_disabled = false;
                    vm.is_submit_disabled = false;

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
        
            if($stateParams.reportingyear){

                OperationsHAISrvcs.list({id:'', reportingyear:$stateParams.reportingyear}).then (function (response) {
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
                            size: 'xlg'
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
            vm.reportingyear = $stateParams.reportingyear; 

            vm.createOperationsHAIBtn = function(data){
                
                data['reportingyear'] = $stateParams.reportingyear;
                console.log(data);
                OperationsHAISrvcs.store(data).then(function(response){
                    if (response.data.status == 200) {
                        alert(response.data.message);
                        $state.go('hospital-operations-hai', {reportingyear:$stateParams.reportingyear});
                        $uibModalInstance.close();
                    }
                    else {
                        alert(response.data.message);
                    }
                    console.log(response.data);
                });
            };

            vm.updateOperationsHAIBtn = function(data){

                data['reportingyear'] = $stateParams.reportingyear;
                console.log(data);

                OperationsHAISrvcs.update(data).then(function(response){
                    if (response.data.status == 200) {
                        alert(response.data.message);
                        $state.go('hospital-operations-hai', {reportingyear:$stateParams.reportingyear});
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