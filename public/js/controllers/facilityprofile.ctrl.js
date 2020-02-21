(function(){
    'use strict';
    angular
        .module('emrApp')
        .controller('FacilityProfileCtrl', FacilityProfileCtrl)
        .controller('FacilityProfileCreateCtrl', FacilityProfileCreateCtrl)
        .controller('FacilityProfileActionModalInsatanceCtrl', FacilityProfileActionModalInsatanceCtrl)

        FacilityProfileCtrl.$inject = ['FacilityProfileSrvcs', '$scope', '$stateParams', '$state', '$uibModal', '$window', 'DTOptionsBuilder', 'DTColumnBuilder'];
        function FacilityProfileCtrl(FacilityProfileSrvcs, $scope, $stateParams, $state, $uibModal, $window, DTOptionsBuilder, DTColumnBuilder){
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
                $state.go('FacilityProfile', {reportingyear:reportingyear});
            }
 
            vm.is_loader_disabled = false;
            vm.is_submit_disabled = false;

            vm.getFacilityProfile = (id, reportingyear) => {
                return new Promise(resolve => {
                    FacilityProfileSrvcs.list({id:id, reportingyear:reportingyear}).then (function (response) {
                        if(response.data.status == 200)
                        {
                            resolve(response.data.data[0]);
                        }
                    }, function (){ alert('Bad Request!!!') })
                });
            };

            vm.init = async (id, reportingyear) => {
                    const data = await vm.getFacilityProfile(id, reportingyear);
                    $scope.$apply(() => vm.expense = {
                        ...data
                    });
            };

            vm.init('', $stateParams.reportingyear);

            vm.sendDataDoh = async function() {
                vm.is_loader_disabled = true;
                vm.is_submit_disabled = true;

                data['reportingyear'] = $stateParams.reportingyear;

                FacilityProfileSrvcs.send_data_doh(data).then (function (response) {
                    // alert('Successfully submitted!')

                    // const data = vm.getFacilityProfile('', $stateParams.reportingyear);
                    // $scope.$apply(() => vm.expense = {
                    //     ...data
                    // });

                    alert(response.data.message)

                    FacilityProfileSrvcs.list({id:'', reportingyear:$stateParams.reportingyear}).then (function (response) {
                        if(response.data.status == 200)
                        {
                            vm.expense = response.data.data[0];
                            vm.expense_count = response.data.count;
                            console.log(vm.expense)
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

        FacilityProfileCreateCtrl.$inject = ['FacilityProfileSrvcs', '$stateParams', '$uibModal', '$window'];
        function FacilityProfileCreateCtrl(FacilityProfileSrvcs, $stateParams, $uibModal, $window){
            var vm = this;
            var data = {};
            
            if($stateParams.reportingyear){

                vm.expense_data = {
                    reportingyear:$stateParams.reportingyear
                }

                FacilityProfileSrvcs.list({id:'', reportingyear:$stateParams.reportingyear}).then (function (response) {
                    if(response.data.status == 200)
                    {
                        vm.data = response.data.data[0];
                        vm.data_count = response.data.count;
                        console.log(vm.expense)

                        $uibModal.open({
                            templateUrl: 'add-expense-modal',
                            controller: 'FacilityProfileActionModalInsatanceCtrl',
                            controllerAs: 'FacilityProfileCtrl',
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

        FacilityProfileActionModalInsatanceCtrl.$inject = ['collection', 'FacilityProfileSrvcs', 'RicbSrvcs', '$state', '$stateParams', '$uibModalInstance', '$window', 'DTOptionsBuilder', 'DTColumnBuilder'];
        function FacilityProfileActionModalInsatanceCtrl (collection, FacilityProfileSrvcs, RicbSrvcs, $state, $stateParams, $uibModalInstance, $window, DTOptionsBuilder, DTColumnBuilder) {

            var vm = this;
            vm.collection = collection.data;
            vm.collection_copy = collection.data;
            vm.reportingyear = $stateParams.reportingyear;

            vm.createFacilityProfileBtn = function(data){
                data['reportingyear'] = $stateParams.reportingyear;
                console.log(data);
                FacilityProfileSrvcs.store(data).then(function(response){
                    if (response.data.status == 200) {
                        alert(response.data.message);

                        FacilityProfileSrvcs.list({id:'', reportingyear:$stateParams.reportingyear}).then (function (response) {
                            if(response.data.status == 200)
                            {
                                vm.expense = response.data.data[0];
                                vm.expense_count = response.data.count;
                                console.log(vm.expense)
                            }
                        }, function (){ alert('Bad Request!!!') })

                        $state.go('FacilityProfile', {reportingyear:$stateParams.reportingyear});
                        $uibModalInstance.close();
                    }
                    else {
                        alert(response.data.message);
                    }
                    console.log(response.data);
                });
            };

            vm.updateFacilityProfileBtn = function(data){

                data['reportingyear'] = $stateParams.reportingyear;
                console.log(data);
                
                FacilityProfileSrvcs.update(data).then(function(response){
                    if (response.data.status == 200) {
                        alert(response.data.message);

                        FacilityProfileSrvcs.list({id:'', reportingyear:$stateParams.reportingyear}).then (function (response) {
                            if(response.data.status == 200)
                            {
                                vm.expense = response.data.data[0];
                                vm.expense_count = response.data.count;
                                console.log(vm.expense)
                            }
                        }, function (){ alert('Bad Request!!!') })

                        $state.go('FacilityProfile', {reportingyear:$stateParams.reportingyear});
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