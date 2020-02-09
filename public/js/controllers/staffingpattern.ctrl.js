(function(){
    'use strict';
    angular
        .module('emrApp')
        .controller('StaffingPatternCtrl', StaffingPatternCtrl)
        .controller('StaffingPatternMedicalCreateCtrl', StaffingPatternMedicalCreateCtrl)
        .controller('StaffingPatternAlliedMedicalCreateCtrl', StaffingPatternAlliedMedicalCreateCtrl)
        .controller('StaffingPatternNonMedicalCreateCtrl', StaffingPatternNonMedicalCreateCtrl)
        .controller('StaffingPatternActionModalInsatanceCtrl', StaffingPatternActionModalInsatanceCtrl)

        StaffingPatternCtrl.$inject = ['StaffingPatternSrvcs', '$stateParams', '$uibModal', '$window'];
        function StaffingPatternCtrl(StaffingPatternSrvcs, $stateParams, $uibModal, $window){
            var vm = this;
            var data = {};

            vm.is_loader_disabled = false;
            vm.is_submit_disabled = false;

            StaffingPatternSrvcs.list({id:'', reporting_year:$stateParams.reporting_year}).then (function (response) {
                if(response.data.status == 200)
                {
                    vm.staffingPatterns = response.data.data;
                    console.log(vm.staffingPatterns)
                }
            }, function (){ alert('Bad Request!!!') })

            vm.sendDataDoh = function(){
                vm.is_loader_disabled = true;
                vm.is_submit_disabled = true;

                StaffingPatternSrvcs.send_data_doh().then (function (response) {
                    alert('Successfully submitted!')

                    StaffingPatternSrvcs.list({id:'', reporting_year:$stateParams.reporting_year}).then (function (response) {
                        if(response.data.status == 200)
                        {
                            vm.staffingPatterns = response.data.data;
                            console.log(vm.staffingPatterns)
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

        StaffingPatternMedicalCreateCtrl.$inject = ['StaffingPatternSrvcs', '$stateParams', '$uibModal', '$window'];
        function StaffingPatternMedicalCreateCtrl(StaffingPatternSrvcs, $stateParams, $uibModal, $window){
            var vm = this;
            var data = {}; 

            if($stateParams.reporting_year){

                StaffingPatternSrvcs.list({id:'', reporting_year:$stateParams.reporting_year}).then (function (response) {
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
                            templateUrl: 'add-staffing-pattern-medical-modal',
                            controller: 'StaffingPatternActionModalInsatanceCtrl',
                            controllerAs: 'staffingPatternCtrl',
                            backdrop: 'static',
                            keyboard  : false,
                            resolve :{
                                collection: function () {
                                    return {
                                        data: vm.data
                                    };
                                }
                            },
                            size: 'xlg'
                        });
                    }
                }, function (){ alert('Bad Request!!!') })
            }

            vm.routeTo = function(route){
                $window.location.href = route;
            }; 
        }

        StaffingPatternAlliedMedicalCreateCtrl.$inject = ['StaffingPatternSrvcs', '$stateParams', '$uibModal', '$window'];
        function StaffingPatternAlliedMedicalCreateCtrl(StaffingPatternSrvcs, $stateParams, $uibModal, $window){
            var vm = this;
            var data = {}; 

            if($stateParams.reporting_year){

                StaffingPatternSrvcs.list({id:'', reporting_year:$stateParams.reporting_year}).then (function (response) {
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
                            templateUrl: 'add-staffing-pattern-allied-medical-modal',
                            controller: 'StaffingPatternActionModalInsatanceCtrl',
                            controllerAs: 'staffingPatternCtrl',
                            backdrop: 'static',
                            keyboard  : false,
                            resolve :{
                                collection: function () {
                                    return {
                                        data: vm.data
                                    };
                                }
                            },
                            size: 'xlg'
                        });
                    }
                }, function (){ alert('Bad Request!!!') })
            }

            vm.routeTo = function(route){
                $window.location.href = route;
            }; 
        }

        StaffingPatternNonMedicalCreateCtrl.$inject = ['StaffingPatternSrvcs', '$stateParams', '$uibModal', '$window'];
        function StaffingPatternNonMedicalCreateCtrl(StaffingPatternSrvcs, $stateParams, $uibModal, $window){
            var vm = this;
            var data = {}; 

            if($stateParams.reporting_year){

                StaffingPatternSrvcs.list({id:'', reporting_year:$stateParams.reporting_year}).then (function (response) {
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
                            templateUrl: 'add-staffing-pattern-non-medical-modal',
                            controller: 'StaffingPatternActionModalInsatanceCtrl',
                            controllerAs: 'staffingPatternCtrl',
                            backdrop: 'static',
                            keyboard  : false,
                            resolve :{
                                collection: function () {
                                    return {
                                        data: vm.data
                                    };
                                }
                            },
                            size: 'xlg'
                        });
                    }
                }, function (){ alert('Bad Request!!!') })
            }

            vm.routeTo = function(route){
                $window.location.href = route;
            }; 
        }

        StaffingPatternActionModalInsatanceCtrl.$inject = ['collection', 'StaffingPatternSrvcs', '$state', '$stateParams', '$uibModalInstance', '$window'];
        function StaffingPatternActionModalInsatanceCtrl (collection, StaffingPatternSrvcs, $state, $stateParams, $uibModalInstance, $window) {

            var vm = this;
            vm.collection = collection.data;
            vm.collection_copy = collection.data;

            console.log(vm.collection)

            vm.createStaffingPatternBtn = function(data){
              

                angular.forEach(data, function(v, k){
                    v['reportingyear'] = $stateParams.reporting_year;
                })

                console.log(data)

                StaffingPatternSrvcs.store(data).then(function(response){

                    console.log(response.data);

                    if (response.data.status == 200) {
                        alert(response.data.message);

                        StaffingPatternSrvcs.list({id:'', reporting_year:$stateParams.reporting_year}).then (function (response) {
                            if(response.data.status == 200)
                            {
                                vm.testing = response.data.data[0];
                                vm.testing_count = response.data.count;
                                console.log(vm.testing)
                            }
                        }, function (){ alert('Bad Request!!!') })

                        $state.go('staffing-pattern', {reporting_year:$stateParams.reporting_year});
                        $uibModalInstance.close();
                    }
                    else {
                        alert(response.data.message);
                    }
                    console.log(response.data);
                });
            };

            vm.updateStaffingPatternBtn = function(data){


                angular.forEach(data, function(v, k){
                    v['reportingyear'] = $stateParams.reporting_year;
                })

                StaffingPatternSrvcs.update(data).then(function(response){
                    if (response.data.status == 200) {
                        alert(response.data.message);

                        StaffingPatternSrvcs.list({id:'', reporting_year:$stateParams.reporting_year}).then (function (response) {
                            if(response.data.status == 200)
                            {
                                vm.testing = response.data.data[0];
                                vm.testing_count = response.data.count;
                                console.log(vm.testing)
                            }
                        }, function (){ alert('Bad Request!!!') })

                        $state.go('staffing-pattern', {reporting_year:$stateParams.reporting_year});
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