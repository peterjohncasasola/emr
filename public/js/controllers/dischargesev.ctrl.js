(function(){
    'use strict';
    angular
        .module('emrApp')
        .controller('DischargesEVCtrl', DischargesEVCtrl)
        .controller('DischargesEVCreateCtrl', DischargesEVCCreateCtrl)
        .controller('DischargesEVActionModalInsatanceCtrl', DischargesEVActionModalInsatanceCtrl)

        DischargesEVCtrl.$inject = ['DischargesEVSrvcs', '$stateParams', '$state', '$uibModal', '$window'];
        function DischargesEVCtrl(DischargesEVSrvcs, $stateParams, $state, $uibModal, $window){
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
                $state.go('hospital-operations-discharges-ev', {reportingyear:reportingyear});
            }

            vm.is_loader_disabled = false;
            vm.is_submit_disabled = false;

            DischargesEVSrvcs.list({id:'', reportingyear:$stateParams.reportingyear}).then (function (response) {
                if(response.data.status == 200)
                {
                    vm.ev = response.data.data[0];
                    vm.ev_count = response.data.count;
                    console.log(vm.ev)
                }
            }, function (){ alert('Bad Request!!!') })

            vm.sendDataDoh = function(){

                vm.is_loader_disabled = true;
                vm.is_submit_disabled = true;

                data['reportingyear'] = $stateParams.reportingyear;
                DischargesEVSrvcs.send_data_doh(data).then (function (response) {
                    alert('Successfully submitted!');

                    vm.is_loader_disabled = false;
                    vm.is_submit_disabled = false;

                    
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

        
            if($stateParams.reportingyear){

                DischargesEVSrvcs.list({id:'', reportingyear:$stateParams.reportingyear}).then (function (response) {
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
            vm.reportingyear = $stateParams.reportingyear; 

            vm.createDischargeEVBtn = function(data){
                
                data['reportingyear'] = $stateParams.reportingyear;
                console.log(data);
                DischargesEVSrvcs.store(data).then(function(response){
                    if (response.data.status == 200) {
                        alert(response.data.message);
                        $state.go('hospital-operations-discharges-ev', {reportingyear:$stateParams.reportingyear});
                        $uibModalInstance.close();
                    }
                    else {
                        alert(response.data.message);
                    }
                    console.log(response.data);
                });
            };

            vm.updateDischargeEVBtn = function(data){

                data['reportingyear'] = $stateParams.reportingyear;
                console.log(data);

                DischargesEVSrvcs.update(data).then(function(response){
                    if (response.data.status == 200) {
                        alert(response.data.message);
                        $state.go('hospital-operations-discharges-ev', {reportingyear:$stateParams.reportingyear});
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