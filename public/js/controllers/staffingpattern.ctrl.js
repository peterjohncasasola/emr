(function(){
    'use strict';
    angular
        .module('emrApp')
        .controller('StaffingPatternCtrl', StaffingPatternCtrl)
        .controller('StaffingPatternMedicalCreateCtrl', StaffingPatternMedicalCreateCtrl)
        .controller('StaffingPatternAlliedMedicalCreateCtrl', StaffingPatternAlliedMedicalCreateCtrl)
        .controller('StaffingPatternNonMedicalCreateCtrl', StaffingPatternNonMedicalCreateCtrl)
        .controller('StaffingPatternActionModalInsatanceCtrl', StaffingPatternActionModalInsatanceCtrl)

        StaffingPatternCtrl.$inject = ['StaffingPatternSrvcs', '$stateParams', '$state', '$uibModal', '$window'];
        function StaffingPatternCtrl(StaffingPatternSrvcs, $stateParams, $state, $uibModal, $window){
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
                $state.go('staffing-pattern', {reportingyear:reportingyear});
            }

            vm.is_loader_disabled = false;
            vm.is_submit_disabled = false;

            StaffingPatternSrvcs.list({id:'', reportingyear:$stateParams.reportingyear}).then (function (response) {
                if(response.data.status == 200)
                {
                    vm.staffingPatterns = response.data.data;
                    console.log(vm.staffingPatterns)
                }
            }, function (){ alert('Bad Request!!!') })

            vm.sendDataDoh = function(){
                vm.is_loader_disabled = true;
                vm.is_submit_disabled = true;

                data['reportingyear'] = $stateParams.reportingyear;
                StaffingPatternSrvcs.send_data_doh(data).then (function (response) {
                    alert('Successfully submitted!')

                    StaffingPatternSrvcs.list({id:'', reportingyear:$stateParams.reportingyear}).then (function (response) {
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

            if($stateParams.reportingyear){

                StaffingPatternSrvcs.list({id:'', reportingyear:$stateParams.reportingyear}).then (function (response) {
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

            if($stateParams.reportingyear){

                StaffingPatternSrvcs.list({id:'', reportingyear:$stateParams.reportingyear}).then (function (response) {
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

            if($stateParams.reportingyear){

                StaffingPatternSrvcs.list({id:'', reportingyear:$stateParams.reportingyear}).then (function (response) {
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

            vm.reportingyear = $stateParams.reportingyear; 

            console.log(vm.collection)

            vm.createStaffingPatternBtn = function(data){
              

                angular.forEach(data, function(v, k){
                    v['reportingyear'] = $stateParams.reportingyear;
                })

                console.log(data)

                StaffingPatternSrvcs.store(data).then(function(response){

                    console.log(response.data);

                    if (response.data.status == 200) {
                        alert(response.data.message);

                        StaffingPatternSrvcs.list({id:'', reportingyear:$stateParams.reportingyear}).then (function (response) {
                            if(response.data.status == 200)
                            {
                                vm.testing = response.data.data[0];
                                vm.testing_count = response.data.count;
                                console.log(vm.testing)
                            }
                        }, function (){ alert('Bad Request!!!') })

                        $state.go('staffing-pattern', {reportingyear:$stateParams.reportingyear});
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
                    v['reportingyear'] = $stateParams.reportingyear;
                })

                StaffingPatternSrvcs.update(data).then(function(response){
                    if (response.data.status == 200) {
                        alert(response.data.message);

                        StaffingPatternSrvcs.list({id:'', reportingyear:$stateParams.reportingyear}).then (function (response) {
                            if(response.data.status == 200)
                            {
                                vm.testing = response.data.data[0];
                                vm.testing_count = response.data.count;
                                console.log(vm.testing)
                            }
                        }, function (){ alert('Bad Request!!!') })

                        $state.go('staffing-pattern', {reportingyear:$stateParams.reportingyear});
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