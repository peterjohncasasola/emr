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

            StaffingPatternSrvcs.list_others({id:'', reportingyear:$stateParams.reportingyear}).then (function (response) {
                if(response.data.status == 200)
                {
                    vm.consultantList = response.data.data;
                    console.log(vm.consultantList)
                }
            }, function (){ alert('Bad Request!!!') })

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
                        
                        StaffingPatternSrvcs.list_others({id:'', reportingyear:$stateParams.reportingyear}).then (function (response) {
                            if(response.data.status == 200)
                            {
                                vm.data2 = response.data.data;
                                console.log(vm.data2)

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
                                                data: vm.data,
                                                data2: vm.data2
                                            };
                                        }
                                    },
                                    size: 'xlg'
                                });
                            }
                        }, function (){ alert('Bad Request!!!') })
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
            vm.others = collection.data2;
            vm.collection_copy = collection.data;

            vm.reportingyear = $stateParams.reportingyear; 

            console.log(vm.collection)
            console.log(vm.others)

            var counter=1;

            vm.newConsultantList = [ 
                {
                    id:counter, parent:1, professiondesignation: '', specialtyboardcertified: '',
                    fulltime40permanent: '',fulltime40contractual:'',parttimepermanent:'',parttimecontractual:'',
                    activerotatingaffiliate: '',outsourced:'', reportingyear:$stateParams.reportingyear
                }
            ];   

            vm.createNewConsultantBtn = function($event){
                counter++;
                vm.newConsultantList.push(
                    {
                        id:counter, parent:1, professiondesignation: '', specialtyboardcertified: '',
                        fulltime40permanent: '',fulltime40contractual:'',parttimepermanent:'',parttimecontractual:'',
                        activerotatingaffiliate: '',outsourced:'', reportingyear:$stateParams.reportingyear
                    }
                );
                $event.preventDefault();
            }

            vm.newPostGraduateFellowList = [ 
                {
                    id:counter, parent:16, professiondesignation: '', specialtyboardcertified: '',
                    fulltime40permanent: '',fulltime40contractual:'',parttimepermanent:'',parttimecontractual:'',
                    activerotatingaffiliate: '',outsourced:'', reportingyear:$stateParams.reportingyear
                }
            ];   

            vm.createNewPostGraduateFellowsBtn = function($event){
                counter++;
                vm.newPostGraduateFellowList.push(
                    {
                        id:counter, parent:16, professiondesignation: '', specialtyboardcertified: '',
                        fulltime40permanent: '',fulltime40contractual:'',parttimepermanent:'',parttimecontractual:'',
                        activerotatingaffiliate: '',outsourced:'', reportingyear:$stateParams.reportingyear
                    }
                );
                $event.preventDefault();
            }

            vm.newResidentsList = [ 
                {
                    id:counter, parent:17, professiondesignation: '', specialtyboardcertified: '',
                    fulltime40permanent: '',fulltime40contractual:'',parttimepermanent:'',parttimecontractual:'',
                    activerotatingaffiliate: '',outsourced:'', reportingyear:$stateParams.reportingyear
                }
            ];   

            vm.createNewResidentsBtn = function($event){
                counter++;
                vm.newResidentsList.push(
                    {
                        id:counter, parent:17, professiondesignation: '', specialtyboardcertified: '',
                        fulltime40permanent: '',fulltime40contractual:'',parttimepermanent:'',parttimecontractual:'',
                        activerotatingaffiliate: '',outsourced:'', reportingyear:$stateParams.reportingyear
                    }
                );
                $event.preventDefault();
            }

            vm.newAlliedMedicalList = [ 
                {
                    id:counter, parent:33, professiondesignation: '', specialtyboardcertified: '',
                    fulltime40permanent: '',fulltime40contractual:'',parttimepermanent:'',parttimecontractual:'',
                    activerotatingaffiliate: '',outsourced:'', reportingyear:$stateParams.reportingyear
                }
            ];   

            vm.createNewAlliedMedicalBtn = function($event){
                counter++;
                vm.newAlliedMedicalList.push(
                    {
                        id:counter, parent:33, professiondesignation: '', specialtyboardcertified: '',
                        fulltime40permanent: '',fulltime40contractual:'',parttimepermanent:'',parttimecontractual:'',
                        activerotatingaffiliate: '',outsourced:'', reportingyear:$stateParams.reportingyear
                    }
                );
                $event.preventDefault();
            }

            vm.newNonMedicalList = [ 
                {
                    id:counter, parent:41, professiondesignation: '', specialtyboardcertified: '',
                    fulltime40permanent: '',fulltime40contractual:'',parttimepermanent:'',parttimecontractual:'',
                    activerotatingaffiliate: '',outsourced:'', reportingyear:$stateParams.reportingyear
                }
            ];   

            vm.createNewNonMedicalBtn = function($event){
                counter++;
                vm.newNonMedicalList.push(
                    {
                        id:counter, parent:41, professiondesignation: '', specialtyboardcertified: '',
                        fulltime40permanent: '',fulltime40contractual:'',parttimepermanent:'',parttimecontractual:'',
                        activerotatingaffiliate: '',outsourced:'', reportingyear:$stateParams.reportingyear
                    }
                );
                $event.preventDefault();
            }

            vm.newGeneralStaffList = [ 
                {
                    id:counter, parent:42, professiondesignation: '', specialtyboardcertified: '',
                    fulltime40permanent: '',fulltime40contractual:'',parttimepermanent:'',parttimecontractual:'',
                    activerotatingaffiliate: '',outsourced:'', reportingyear:$stateParams.reportingyear
                }
            ];   

            vm.createNewGeneralStaffBtn = function($event){
                counter++;
                vm.newGeneralStaffList.push(
                    {
                        id:counter, parent:42, professiondesignation: '', specialtyboardcertified: '',
                        fulltime40permanent: '',fulltime40contractual:'',parttimepermanent:'',parttimecontractual:'',
                        activerotatingaffiliate: '',outsourced:'', reportingyear:$stateParams.reportingyear
                    }
                );
                $event.preventDefault();
            }

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

                    v.values['parent'] = 0;
                    v['reportingyear'] = $stateParams.reportingyear;
                })

                var datatypes = {
                    orginal:[], others:[], newothers:[]
                };

                datatypes.orginal.push(data);//original fields

                datatypes.others.push(vm.others);

                datatypes.newothers.push(vm.newConsultantList);
                datatypes.newothers.push(vm.newPostGraduateFellowList);
                datatypes.newothers.push(vm.newResidentsList);

                datatypes.newothers.push(vm.newAlliedMedicalList);

                datatypes.newothers.push(vm.newNonMedicalList);
                datatypes.newothers.push(vm.newGeneralStaffList);

                
                StaffingPatternSrvcs.update_others(datatypes).then(function(response){

                    if (response.data.status == 200) {
                        alert(response.data.message);

                        console.log(response)

                        StaffingPatternSrvcs.list({id:'', reportingyear:$stateParams.reportingyear}).then (function (response) {
                            if(response.data.status == 200)
                            {
                                vm.testing = response.data.data[0];
                                console.log(vm.testing)
                            }
                        }, function (){ alert('Bad Request!!!') })

                        $state.go('staffing-pattern', {reportingyear:$stateParams.reportingyear});
                        $uibModalInstance.close();
                    }
                    else {
                        alert(response.data.message);
                    }
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