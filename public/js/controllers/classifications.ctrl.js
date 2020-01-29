(function(){
    'use strict';
    angular
        .module('emrApp')
        .controller('ClassificationsCreateCtrl', ClassificationsCreateCtrl)
        .controller('ClassificationActionModalInsatanceCtrl', ClassificationActionModalInsatanceCtrl)

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
                        console.log(vm.data)

                        $uibModal.open({
                            templateUrl: 'add-classification-modal',
                            controller: 'ClassificationActionModalInsatanceCtrl',
                            controllerAs: 'classificationsCtrl',
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
            

            vm.servicecapabilities = [
                {id:1, name:'General'},
                {id:2, name:'Specialty'},
                {id:3, name:'Infirmary'}
            ];

            vm.generals = [
                {id:1, name:'Level 1 Hospital'},
                {id:2, name:'Level 2 Hospital'},
                {id:3, name:'Level 3 Hospital'}
            ];

            vm.specialties = [
                {id:1, name:'Treats a particular disease'},
                {id:2, name:'Treats a particular organ'},
                {id:3, name:'Treats a particular class of patients'},
                {id:4, name:'Others'},
            ];

            vm.traumacapabilities = [
                {id:1, name:'Trauma Capable'},
                {id:2, name:'Trauma Receiving'},
                {id:3, name:'Not Applicable'}
            ];

            vm.natureofownership = [
                {id:1, name:'Government'},
                {id:2, name:'Private'}
            ];

            vm.governments = [
                {id:1, name:'National'},
                {id:2, name:'Local'},
                {id:3, name:'State Universities and Colleges (SUCs)'}
            ];

            vm.nationals = [
                {id:1, name:'DOH Retained / Renationalized'},
                {id:2, name:'DILG - PNP'},
                {id:3, name:'DND - AFP'},
                {id:4, name:'DOJ'}
            ];

            vm.locals = [
                {id:1, name:'Province'},
                {id:2, name:'City'},
                {id:3, name:'Municipality'},
                {id:4, name:'District'}
            ];

            vm.private = [
                {id:1, name:'Single Proprietorship'},
                {id:2, name:'Partnership'},
                {id:3, name:'Corporation'},
                {id:4, name:'Religious'},
                {id:5, name:'Civic Organization'},
                {id:6, name:'Foundation'},
                {id:7, name:'Cooperative'}
            ];

            vm.collection = collection.data;
            vm.collection_copy = collection.data;

            vm.createClassificationBtn = function(data){
                data['reportingyear'] = $stateParams.reporting_year;
                console.log(data);
                ClassificationsSrvcs.store(data).then(function(response){
                    if (response.data.status == 200) {
                        alert(response.data.message);
                        $state.go('general-info', {reporting_year:$stateParams.reporting_year});
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
                        $state.go('general-info', {reporting_year:$stateParams.reporting_year});
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