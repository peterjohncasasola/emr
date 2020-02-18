(function(){
    'use strict';
    angular
        .module('emrApp')
        .controller('ExpensesCtrl', ExpensesCtrl)
        .controller('ExpensesCreateCtrl', ExpensesCreateCtrl)
        .controller('ExpenseActionModalInsatanceCtrl', ExpenseActionModalInsatanceCtrl)

        ExpensesCtrl.$inject = ['ExpensesSrvcs', 'RicbSrvcs', '$scope', '$stateParams', '$state', '$uibModal', '$window', 'DTOptionsBuilder', 'DTColumnBuilder'];
        function ExpensesCtrl(ExpensesSrvcs, RicbSrvcs, $scope, $stateParams, $state, $uibModal, $window, DTOptionsBuilder, DTColumnBuilder){
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

            vm.getExpenses = (id, reportingyear) => {
                return new Promise(resolve => {
                    ExpensesSrvcs.list({id:id, reportingyear:reportingyear}).then (function (response) {
                        if(response.data.status == 200)
                        {
                            resolve(response.data.data[0]);
                        }
                    }, function (){ alert('Bad Request!!!') })
                });
            };

            vm.init = async (id, reportingyear) => {
                    const data = await vm.getExpenses(id, reportingyear);
                    $scope.$apply(() => vm.expense = {
                        ...data
                    });
            };

            vm.init('', $stateParams.reportingyear);

            // ExpensesSrvcs.list({id:'', reportingyear:$stateParams.reportingyear}).then (function (response) {
            //     if(response.data.status == 200)
            //     {
            //         vm.expense = response.data.data[0];
            //         vm.expense_count = response.data.count;
            //         console.log(vm.expense)
            //     }
            // }, function (){ alert('Bad Request!!!') })

            vm.sendDataDoh = async function() {
                vm.is_loader_disabled = true;
                vm.is_submit_disabled = true;

                data['reportingyear'] = $stateParams.reportingyear;

                ExpensesSrvcs.send_data_doh(data).then (function (response) {
                     
                    // if(response.data.status==200){

                    alert(response.data.message)

                    ExpensesSrvcs.list({id:'', reportingyear:$stateParams.reportingyear}).then (function (response) {
                        if(response.data.status == 200)
                        {
                            vm.expense = response.data.data[0];
                            vm.expense_count = response.data.count;
                            console.log(vm.expense)
                        }
                    }, function (){ alert('Bad Request!!!') })

                    // }

                    vm.is_loader_disabled = false;
                    vm.is_submit_disabled = false;

                }, function (){ alert('Bad Request!!!') })
            }

            vm.routeTo = function(route){
                $window.location.href = route;
            }; 


            // sample only
            vm.authorized = false;

            RicbSrvcs.list({id:'', icd10code:''}).then (function (response) {
                if(response.data.status == 200)
                {
                    vm.ricd10 = response.data.data;
                    vm.ricd10_count = response.data.count;
                    console.log(vm.ricd10)
                }
            }, function (){ alert('Bad Request!!!') })

            vm.dtOptions = DTOptionsBuilder.newOptions()
                .withOption('ajax', {
                url: 'api/v1/ricd3',
                type: 'GET'
            })
            
            // or here
            .withDataProp('data')
                .withOption('processing', true)
                .withOption('serverSide', true)
                .withPaginationType('full_numbers');
            vm.dtColumns = [
                DTColumnBuilder.newColumn('id').withTitle('ID'),
                DTColumnBuilder.newColumn('icd10desc').withTitle('First name')
            ];


            // sample

            var counter=0;
            vm.questionelemnt = [ {id:counter, question : 'Question-Click on me to edit!', answer : '', answer2 : '', inline:true} ];
        
            vm.newItem = function($event){
                counter++;
                vm.questionelemnt.push(  { id:counter, question : 'Question-Click on me to edit!', answer : '',answer2 : '',inline:true} );
                $event.preventDefault();
            }
            vm.inlinef= function($event,inlinecontrol){
                var checkbox = $event.target;
                if(checkbox.checked){
                    $('#'+ inlinecontrol).css('display','inline');
                }else{
                    $('#'+ inlinecontrol).css('display','');
                }
        
            }
            vm.showitems = function($event){
                $('#displayitems').css('visibility','none');
            }
            
            // sample
            
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

        ExpenseActionModalInsatanceCtrl.$inject = ['collection', 'ExpensesSrvcs', 'RicbSrvcs', '$state', '$stateParams', '$uibModalInstance', '$window', 'DTOptionsBuilder', 'DTColumnBuilder'];
        function ExpenseActionModalInsatanceCtrl (collection, ExpensesSrvcs, RicbSrvcs, $state, $stateParams, $uibModalInstance, $window, DTOptionsBuilder, DTColumnBuilder) {

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



            vm.dtOptions = DTOptionsBuilder.newOptions()
                .withOption('ajax', {
                // Either you specify the AjaxDataProp here
                // dataSrc: 'data',
                url: 'api/v1/ricd3',
                type: 'GET'
            })
            // or here
            .withDataProp('data')
                .withOption('processing', true)
                .withOption('serverSide', true)
                .withPaginationType('full_numbers');
            vm.dtColumns = [
                DTColumnBuilder.newColumn('id').withTitle('ID'),
                DTColumnBuilder.newColumn('icd10desc').withTitle('First name')
            ];

        }

})();