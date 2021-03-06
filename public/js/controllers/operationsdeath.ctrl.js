(function(){
    'use strict';
    angular
        .module('emrApp')
        .controller('OperationsDeathCtrl', OperationsDeathCtrl)
        .controller('OperationsDeathCreateCtrl', OperationsDeathCreateCtrl)
        .controller('OperationsDeathActionModalInsatanceCtrl', OperationsDeathActionModalInsatanceCtrl)

        OperationsDeathCtrl.$inject = ['OperationsDeathSrvcs', '$stateParams', '$state', '$uibModal', '$window'];
        function OperationsDeathCtrl(OperationsDeathSrvcs, $stateParams, $state, $uibModal, $window){
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
                $state.go('hospital-operations-death', {reportingyear:reportingyear});
            }

            vm.is_loader_disabled = false;
            vm.is_submit_disabled = false;

            OperationsDeathSrvcs.list({id:'', reportingyear:$stateParams.reportingyear}).then (function (response) {
                if(response.data.status == 200)
                {
                    vm.operations_death = response.data.data[0];
                    vm.operations_death_count = response.data.count;
                    console.log(vm.operations_death)
                }
            }, function (){ alert('Bad Request!!!') })

            vm.sendDataDoh = function(){

                vm.is_loader_disabled = true;
                vm.is_submit_disabled = true;

                data['reportingyear'] = $stateParams.reportingyear;
                OperationsDeathSrvcs.send_data_doh(data).then (function (response) {
                    // alert('Successfully submitted!')
                    alert(response.data.message)

                    vm.is_loader_disabled = false;
                    vm.is_submit_disabled = false;
                }, function (){ alert('Bad Request!!!') })
            }

            vm.routeTo = function(route){
                $window.location.href = route;
            }; 
        }

        OperationsDeathCreateCtrl.$inject = ['OperationsDeathSrvcs', '$stateParams', '$uibModal', '$window'];
        function OperationsDeathCreateCtrl(OperationsDeathSrvcs, $stateParams, $uibModal, $window){
            var vm = this;
            var data = {}; 

        
            if($stateParams.reportingyear){

                OperationsDeathSrvcs.list({id:'', reportingyear:$stateParams.reportingyear}).then (function (response) {
                    if(response.data.status == 200)
                    {
                        vm.data = response.data.data[0];
                        vm.data_count = response.data.count;
                        console.log(vm.data)

                        $uibModal.open({
                            templateUrl: 'add-operations-death-modal',
                            controller: 'OperationsDeathActionModalInsatanceCtrl',
                            controllerAs: 'operationsDeathCtrl',
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

        OperationsDeathActionModalInsatanceCtrl.$inject = ['collection', 'OperationsDeathSrvcs', '$state', '$stateParams', '$uibModalInstance', '$window'];
        function OperationsDeathActionModalInsatanceCtrl (collection, OperationsDeathSrvcs, $state, $stateParams, $uibModalInstance, $window) {

            var vm = this;
            vm.collection = collection.data;
            vm.collection_copy = collection.data;
            vm.reportingyear = $stateParams.reportingyear; 

            // vm.computeTotalDeaths = function(data){
            //     console.log(data)

            //     vm.totalDeaths = parseInt(data.totaldeaths48down)+
            //                     parseInt(data.totaldeaths48up)+
            //                     parseInt(data.totalerdeaths)+
            //                     parseInt(data.totaldoa)+
            //                     parseInt(data.totalstillbirths)+
            //                     parseInt(data.totalneonataldeaths)+
            //                     parseInt(data.totalmaternaldeaths);

            //     console.log(vm.totalDeaths)

            //     vm.collection.totaldeaths = vm.totalDeaths;
            // }

            vm.createOperationsDeathBtn = function(data){
                
                data['reportingyear'] = $stateParams.reportingyear;
                console.log(data);
                OperationsDeathSrvcs.store(data).then(function(response){
                    if (response.data.status == 200) {
                        alert(response.data.message);
                        $state.go('hospital-operations-death', {reportingyear:$stateParams.reportingyear});
                        $uibModalInstance.close();
                    }
                    else {
                        alert(response.data.message);
                    }
                    console.log(response.data);
                });
            };

            vm.updateOperationsDeathBtn = function(data){

                data['reportingyear'] = $stateParams.reportingyear;
                console.log(data);

                OperationsDeathSrvcs.update(data).then(function(response){
                    if (response.data.status == 200) {
                        alert(response.data.message);
                        $state.go('hospital-operations-death', {reportingyear:$stateParams.reportingyear});
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