(function(){
    'use strict';
    angular
        .module('emrApp')
        .controller('DischargesOPVCtrl', DischargesOPVCtrl)
        .controller('DischargesOPVCreateCtrl', DischargesOPVCCreateCtrl)
        .controller('DischargesOPVActionModalInsatanceCtrl', DischargesOPVActionModalInsatanceCtrl)

        DischargesOPVCtrl.$inject = ['DischargesOPVSrvcs', '$stateParams', '$state', '$uibModal', '$window'];
        function DischargesOPVCtrl(DischargesOPVSrvcs, $stateParams, $state, $uibModal, $window){
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
                $state.go('hospital-operations-discharges-opv', {reportingyear:reportingyear});
            }

            DischargesOPVSrvcs.list({id:'', reportingyear:$stateParams.reportingyear}).then (function (response) {
                if(response.data.status == 200)
                {
                    vm.opv = response.data.data[0];
                    vm.opv_count = response.data.count;
                    console.log(vm.opv)
                }
            }, function (){ alert('Bad Request!!!') })

            vm.sendDataDoh = function(){

                data['reportingyear'] = $stateParams.reportingyear;
                DischargesOPVSrvcs.send_data_doh(data).then (function (response) {
                    alert('Successfully submitted!')
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

            if($stateParams.reportingyear){

                DischargesOPVSrvcs.list({id:'', reportingyear:$stateParams.reportingyear}).then (function (response) {
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
            vm.reportingyear = $stateParams.reportingyear; 

            vm.createDischargeOPVBtn = function(data){
                
                data['reportingyear'] = $stateParams.reportingyear;
                console.log(data);
                DischargesOPVSrvcs.store(data).then(function(response){
                    if (response.data.status == 200) {
                        alert(response.data.message);
                        $state.go('hospital-operations-discharges-opv', {reportingyear:$stateParams.reportingyear});
                        $uibModalInstance.close();
                    }
                    else {
                        alert(response.data.message);
                    }
                    console.log(response.data);
                });
            };

            vm.updateDischargeOPVBtn = function(data){

                data['reportingyear'] = $stateParams.reportingyear;
                console.log(data);

                DischargesOPVSrvcs.update(data).then(function(response){
                    if (response.data.status == 200) {
                        alert(response.data.message);
                        $state.go('hospital-operations-discharges-opv', {reportingyear:$stateParams.reportingyear});
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