(function(){
    'use strict';
    angular
        .module('emrApp')
        .controller('ExpensesCtrl', ExpensesCtrl)
        .controller('ExpensesCreateCtrl', ExpensesCreateCtrl)
        .controller('ExpenseActionModalInsatanceCtrl', ExpenseActionModalInsatanceCtrl)

        ExpensesCtrl.$inject = ['ExpensesSrvcs', '$stateParams', '$uibModal', '$window'];
        function ExpensesCtrl(ExpensesSrvcs, $stateParams, $uibModal, $window){
            var vm = this;
            var data = {};

            ExpensesSrvcs.list({id:'', reporting_year:$stateParams.reporting_year}).then (function (response) {
                if(response.data.status == 200)
                {
                    vm.expense = response.data.data[0];
                    vm.expense_count = response.data.count;
                    console.log(vm.expense)
                }
            }, function (){ alert('Bad Request!!!') })

            vm.sendDataDoh = function(){
                ExpensesSrvcs.send_data_doh().then (function (response) {
                    alert('Success!')
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
        
            if($stateParams.reporting_year){

                vm.expense_data = {
                    reporting_year:$stateParams.reporting_year
                }

                ExpensesSrvcs.list({id:'', reporting_year:$stateParams.reporting_year}).then (function (response) {
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

            vm.createExpenseBtn = function(data){
                data['reportingyear'] = $stateParams.reporting_year;
                console.log(data);
                ExpensesSrvcs.store(data).then(function(response){
                    if (response.data.status == 200) {
                        alert(response.data.message);

                        ExpensesSrvcs.list({id:'', reporting_year:$stateParams.reporting_year}).then (function (response) {
                            if(response.data.status == 200)
                            {
                                vm.expense = response.data.data[0];
                                vm.expense_count = response.data.count;
                                console.log(vm.expense)
                            }
                        }, function (){ alert('Bad Request!!!') })

                        $state.go('expenses', {reporting_year:$stateParams.reporting_year});
                        $uibModalInstance.close();
                    }
                    else {
                        alert(response.data.message);
                    }
                    console.log(response.data);
                });
            };

            vm.updateExpenseBtn = function(data){

                data['reportingyear'] = $stateParams.reporting_year;
                console.log(data);


                ExpensesSrvcs.update(data).then(function(response){
                    if (response.data.status == 200) {
                        alert(response.data.message);

                        ExpensesSrvcs.list({id:'', reporting_year:$stateParams.reporting_year}).then (function (response) {
                            if(response.data.status == 200)
                            {
                                vm.expense = response.data.data[0];
                                vm.expense_count = response.data.count;
                                console.log(vm.expense)
                            }
                        }, function (){ alert('Bad Request!!!') })

                        $state.go('expenses', {reporting_year:$stateParams.reporting_year});
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
                $state.go('employees');
                $uibModalInstance.close();
            };
        }

})();