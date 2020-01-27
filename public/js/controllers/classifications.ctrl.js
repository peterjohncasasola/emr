(function(){
    'use strict';
    angular
        .module('emrApp')
        .controller('ClassificaitonsCtrl', ClassificaitonsCtrl)
        .controller('ClassificationsCreateCtrl', ClassificationsCreateCtrl)
        .controller('ClassificationActionModalInsatanceCtrl', ClassificationActionModalInsatanceCtrl)

        ClassificaitonsCtrl.$inject = ['ClassificationsSrvcs', '$stateParams', '$uibModal', '$window'];
        function ClassificaitonsCtrl(ClassificationsSrvcs, $stateParams, $uibModal, $window){
            var vm = this;
            var data = {};

            ClassificationsSrvcs.list({id:'', reporting_year:$stateParams.reporting_year}).then (function (response) {
                if(response.data.status == 200)
                {
                    vm.general_info = response.data.data[0];
                    vm.general_info = response.data.count;
                    console.log(vm.expense)
                }
            }, function (){ alert('Bad Request!!!') })

            vm.routeTo = function(route){
                $window.location.href = route;
            }; 
        }

        ClassificationsCreateCtrl.$inject = ['ClassificationsSrvcs', '$stateParams', '$uibModal', '$window'];
        function ClassificationsCreateCtrl(ClassificationsSrvcs, $stateParams, $uibModal, $window){
            var vm = this;
            var data = {};
        
            if($stateParams.reporting_year){

                ClassificationsSrvcs.list({id:'', reporting_year:$stateParams.reporting_year}).then (function (response) {
                    if(response.data.status == 200)
                    {
                        vm.data = response.data.data[0];
                        vm.data_count = response.data.count;
                        console.log(vm.expense)

                        $uibModal.open({
                            templateUrl: 'add-classificatioon-modal',
                            controller: 'ClassificationActionModalInsatanceCtrl',
                            controllerAs: 'genearalInfoCtrl',
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

        ClassificationActionModalInsatanceCtrl.$inject = ['collection', 'ClassificationsSrvcs', '$state', '$stateParams', '$uibModalInstance', '$window'];
        function ClassificationActionModalInsatanceCtrl (collection, ClassificationsSrvcs, $state, $stateParams, $uibModalInstance, $window) {

            var vm = this;
            vm.collection = collection.data;
            vm.collection_copy = collection.data;

            vm.createClassificationBtn = function(data){
                data['reportingyear'] = $stateParams.reporting_year;
                console.log(data);
                ClassificationsSrvcs.store(data).then(function(response){
                    if (response.data.status == 200) {
                        alert(response.data.message);

                        ClassificationsSrvcs.list({id:'', reporting_year:$stateParams.reporting_year}).then (function (response) {
                            if(response.data.status == 200)
                            {
                                vm.expense = response.data.data[0];
                                vm.expense_count = response.data.count;
                                console.log(vm.expense)
                            }
                        }, function (){ alert('Bad Request!!!') })

                        $state.go('classifications', {reporting_year:$stateParams.reporting_year});
                        $uibModalInstance.close();
                    }
                    else {
                        alert(response.data.message);
                    }
                    console.log(response.data);
                });
            };

            vm.updateClassificationBtn = function(data){

                data['reportingyear'] = $stateParams.reporting_year;
                console.log(data);


                ClassificationsSrvcs.update(data).then(function(response){
                    if (response.data.status == 200) {
                        alert(response.data.message);

                        ClassificationsSrvcs.list({id:'', reporting_year:$stateParams.reporting_year}).then (function (response) {
                            if(response.data.status == 200)
                            {
                                vm.expense = response.data.data[0];
                                vm.expense_count = response.data.count;
                                console.log(vm.expense)
                            }
                        }, function (){ alert('Bad Request!!!') })

                        $state.go('classifications', {reporting_year:$stateParams.reporting_year});
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

            // vm.close = function() {
            //     $state.go('employees');
            //     $uibModalInstance.close();
            // };
        }

})();