(function(){
    'use strict';
    angular
        .module('emrApp')
        .controller('ExpensesCtrl', ExpensesCtrl)
        .controller('ExpensesCreateCtrl', ExpensesCreateCtrl)
        .controller('ExpenseActionModalInsatanceCtrl', ExpenseActionModalInsatanceCtrl)

        ExpensesCtrl.$inject = ['ExpensesSrvcs', '$stateParams', '$state', '$uibModal', '$window'];
        function ExpensesCtrl(ExpensesSrvcs, $stateParams, $state, $uibModal, $window){
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
                $state.go('expenses', {reportingyear:reportingyear});
            }
 
            vm.is_loader_disabled = false;
            vm.is_submit_disabled = false;

            ExpensesSrvcs.list({id:'', reportingyear:$stateParams.reportingyear}).then (function (response) {
                if(response.data.status == 200)
                {
                    vm.expense = response.data.data[0];
                    vm.expense_count = response.data.count;
                    console.log(vm.expense)
                }
            }, function (){ alert('Bad Request!!!') })

            vm.sendDataDoh = function(){
                vm.is_loader_disabled = true;
                vm.is_submit_disabled = true;

                data['reportingyear'] = $stateParams.reportingyear;

                ExpensesSrvcs.send_data_doh(data).then (function (response) {
                    alert('Successfully submitted!')

                    ExpensesSrvcs.list({id:'', reportingyear:$stateParams.reportingyear}).then (function (response) {
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

        ExpensesCreateCtrl.$inject = ['ExpensesSrvcs', '$stateParams', '$uibModal', '$window'];
        function ExpensesCreateCtrl(ExpensesSrvcs, $stateParams, $uibModal, $window){
            var vm = this;
            var data = {};


            
            if($stateParams.reportingyear){

                vm.expense_data = {
                    reportingyear:$stateParams.reportingyear
                }

                ExpensesSrvcs.list({id:'', reportingyear:$stateParams.reportingyear}).then (function (response) {
                    if(response.data.status == 200)
                    {
                        vm.data = response.data.data[0];
                        vm.data_count = response.data.count;
                        console.log(vm.expense)

                        $uibModal.open({
                            templateUrl: 'add-expense-modal',
                            controller: 'ExpenseActionModalInsatanceCtrl',
                            controllerAs: 'expensesCtrl',
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

        ExpenseActionModalInsatanceCtrl.$inject = ['collection', 'ExpensesSrvcs', '$state', '$stateParams', '$uibModalInstance', '$window'];
        function ExpenseActionModalInsatanceCtrl (collection, ExpensesSrvcs, $state, $stateParams, $uibModalInstance, $window) {

            var vm = this;
            vm.collection = collection.data;
            vm.collection_copy = collection.data;
            vm.reportingyear = $stateParams.reportingyear;

            vm.createExpenseBtn = function(data){
                data['reportingyear'] = $stateParams.reportingyear;
                console.log(data);
                ExpensesSrvcs.store(data).then(function(response){
                    if (response.data.status == 200) {
                        alert(response.data.message);

                        ExpensesSrvcs.list({id:'', reportingyear:$stateParams.reportingyear}).then (function (response) {
                            if(response.data.status == 200)
                            {
                                vm.expense = response.data.data[0];
                                vm.expense_count = response.data.count;
                                console.log(vm.expense)
                            }
                        }, function (){ alert('Bad Request!!!') })

                        $state.go('expenses', {reportingyear:$stateParams.reportingyear});
                        $uibModalInstance.close();
                    }
                    else {
                        alert(response.data.message);
                    }
                    console.log(response.data);
                });
            };

            vm.updateExpenseBtn = function(data){

                data['reportingyear'] = $stateParams.reportingyear;
                console.log(data);


                ExpensesSrvcs.update(data).then(function(response){
                    if (response.data.status == 200) {
                        alert(response.data.message);

                        ExpensesSrvcs.list({id:'', reportingyear:$stateParams.reportingyear}).then (function (response) {
                            if(response.data.status == 200)
                            {
                                vm.expense = response.data.data[0];
                                vm.expense_count = response.data.count;
                                console.log(vm.expense)
                            }
                        }, function (){ alert('Bad Request!!!') })

                        $state.go('expenses', {reportingyear:$stateParams.reportingyear});
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