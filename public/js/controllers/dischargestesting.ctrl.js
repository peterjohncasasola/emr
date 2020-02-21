(function(){
    'use strict';
    angular
        .module('emrApp')
        .controller('DischargesTestingCtrl', DischargesTestingCtrl)
        .controller('DischargesTestingCreateCtrl', DischargesTestingCreateCtrl)
        .controller('DischargesTestingActionModalInsatanceCtrl', DischargesTestingActionModalInsatanceCtrl)

        DischargesTestingCtrl.$inject = ['DischargesTestingSrvcs', '$stateParams', '$state', '$uibModal', '$window'];
        function DischargesTestingCtrl(DischargesTestingSrvcs, $stateParams, $state, $uibModal, $window){
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
                $state.go('hospital-operations-discharges-testing', {reportingyear:reportingyear});
            }

            vm.is_loader_disabled = false;
            vm.is_submit_disabled = false;

            DischargesTestingSrvcs.list({id:'', reportingyear:$stateParams.reportingyear}).then (function (response) {
                if(response.data.status == 200)
                {
                    vm.testing = response.data.data;
                    vm.testing_count = response.data.count;
                    console.log(vm.testing)
                }
            }, function (){ alert('Bad Request!!!') })

            vm.sendDataDoh = function(){

                vm.is_loader_disabled = true;
                vm.is_submit_disabled = true;

                data['reportingyear'] = $stateParams.reportingyear;
                DischargesTestingSrvcs.send_data_doh(data).then (function (response) {
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

        DischargesTestingCreateCtrl.$inject = ['DischargesTestingSrvcs', '$stateParams', '$uibModal', '$window'];
        function DischargesTestingCreateCtrl(DischargesTestingSrvcs, $stateParams, $uibModal, $window){
            var vm = this;
            var data = {}; 

            if($stateParams.reportingyear){

                DischargesTestingSrvcs.list({id:'', reportingyear:$stateParams.reportingyear}).then (function (response) {
                    if(response.data.status == 200)
                    {
                        vm.data = response.data.data;
                        vm.data_count = response.data.count;
                        console.log(vm.data)

                        if(vm.data.length==0){
                            vm.data = null;
                        }

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
            vm.reportingyear = $stateParams.reportingyear; 

            vm.createDischargeTestingBtn = function(data){
                data['reportingyear'] = $stateParams.reportingyear;
                console.log(data);
                DischargesTestingSrvcs.store(data).then(function(response){
                    if (response.data.status == 200) {
                        alert(response.data.message);

                        DischargesTestingSrvcs.list({id:'', reportingyear:$stateParams.reportingyear}).then (function (response) {
                            if(response.data.status == 200)
                            {
                                vm.testing = response.data.data[0];
                                vm.testing_count = response.data.count;
                                console.log(vm.testing)
                            }
                        }, function (){ alert('Bad Request!!!') })

                        $state.go('hospital-operations-discharges-testing', {reportingyear:$stateParams.reportingyear});
                        $uibModalInstance.close();
                    }
                    else {
                        alert(response.data.message);
                    }
                    console.log(response.data);
                });
            };

            vm.updateDischargeTestingBtn = function(data){

                data['reportingyear'] = $stateParams.reportingyear;
                console.log(data);

                DischargesTestingSrvcs.update(data).then(function(response){
                    if (response.data.status == 200) {
                        alert(response.data.message);

                        DischargesTestingSrvcs.list({id:'', reportingyear:$stateParams.reportingyear}).then (function (response) {
                            if(response.data.status == 200)
                            {
                                vm.testing = response.data.data[0];
                                vm.testing_count = response.data.count;
                                console.log(vm.testing)
                            }
                        }, function (){ alert('Bad Request!!!') })

                        $state.go('hospital-operations-discharges-testing', {reportingyear:$stateParams.reportingyear});
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