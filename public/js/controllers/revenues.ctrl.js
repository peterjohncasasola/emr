(function(){
    'use strict';
    angular
        .module('emrApp')
        .controller('RevenuesCtrl', RevenuesCtrl)
        .controller('RevenuesCreateCtrl', RevenuesCreateCtrl)
        .controller('RevenueActionModalInsatanceCtrl', RevenueActionModalInsatanceCtrl)

        RevenuesCtrl.$inject = ['RevenuesSrvcs', '$stateParams', '$state', '$uibModal', '$window'];
        function RevenuesCtrl(RevenuesSrvcs, $stateParams, $state, $uibModal, $window){
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
                $state.go('revenues', {reportingyear:reportingyear});
            }

            vm.is_loader_disabled = false;
            vm.is_submit_disabled = false;

            RevenuesSrvcs.list({id:'', reportingyear:$stateParams.reportingyear}).then (function (response) {
                if(response.data.status == 200)
                {
                    vm.revenue = response.data.data[0];
                    vm.revenue_count = response.data.count;
                    console.log(vm.expense)
                }
            }, function (){ alert('Bad Request!!!') })

            vm.sendDataDoh = function(){
                vm.is_loader_disabled = true;
                vm.is_submit_disabled = true;

                data['reportingyear'] = $stateParams.reportingyear;

                RevenuesSrvcs.send_data_doh(data).then (function (response) {
                    // alert('Successfully submitted!')

                    alert(response.data.message)

                    RevenuesSrvcs.list({id:'', reportingyear:$stateParams.reportingyear}).then (function (response) {
                        if(response.data.status == 200)
                        {
                            vm.revenue = response.data.data[0];
                            vm.revenue_count = response.data.count;
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

        RevenuesCreateCtrl.$inject = ['RevenuesSrvcs', '$stateParams', '$uibModal', '$window'];
        function RevenuesCreateCtrl(RevenuesSrvcs, $stateParams, $uibModal, $window){
            var vm = this;
            var data = {};
        
            if($stateParams.reportingyear){

                vm.expense_data = {
                    reportingyear:$stateParams.reportingyear
                }

                RevenuesSrvcs.list({id:'', reportingyear:$stateParams.reportingyear}).then (function (response) {
                    if(response.data.status == 200)
                    {
                        vm.data = response.data.data[0];
                        vm.data_count = response.data.count;

                        $uibModal.open({
                            templateUrl: 'add-revenue-modal',
                            controller: 'RevenueActionModalInsatanceCtrl',
                            controllerAs: 'revenuesCtrl',
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

        RevenueActionModalInsatanceCtrl.$inject = ['collection', 'RevenuesSrvcs', '$state', '$stateParams', '$uibModalInstance', '$window'];
        function RevenueActionModalInsatanceCtrl (collection, RevenuesSrvcs, $state, $stateParams, $uibModalInstance, $window) {

            var vm = this;
            vm.collection = collection.data;
            vm.collection_copy = collection.data;

            vm.reportingyear = $stateParams.reportingyear; 

            vm.createRevenueBtn = function(data){
                data['reportingyear'] = $stateParams.reportingyear;
                console.log(data);
                RevenuesSrvcs.store(data).then(function(response){
                    if (response.data.status == 200) {
                        alert(response.data.message);

                        RevenuesSrvcs.list({id:'', reportingyear:$stateParams.reportingyear}).then (function (response) {
                            if(response.data.status == 200)
                            {
                                vm.expense = response.data.data[0];
                                vm.expense_count = response.data.count;
                                console.log(vm.expense)
                            }
                        }, function (){ alert('Bad Request!!!') })

                        $state.go('revenues', {reportingyear:$stateParams.reportingyear});
                        $uibModalInstance.close();
                    }
                    else {
                        alert(response.data.message);
                    }
                    console.log(response.data);
                });
            };

            vm.updateRevenueBtn = function(data){

                data['reportingyear'] = $stateParams.reportingyear;
                console.log(data);


                RevenuesSrvcs.update(data).then(function(response){
                    if (response.data.status == 200) {
                        alert(response.data.message);

                        RevenuesSrvcs.list({id:'', reportingyear:$stateParams.reportingyear}).then (function (response) {
                            if(response.data.status == 200)
                            {
                                vm.expense = response.data.data[0];
                                vm.expense_count = response.data.count;
                                console.log(vm.expense)
                            }
                        }, function (){ alert('Bad Request!!!') })

                        $state.go('revenues', {reportingyear:$stateParams.reportingyear});
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