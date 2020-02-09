(function(){
    'use strict';
    angular
        .module('emrApp')
        .controller('SummaryOfPatientsCtrl', SummaryOfPatientsCtrl)
        .controller('SummaryOfPatientsCreateCtrl', SummaryOfPatientsCreateCtrl)
        .controller('SummaryOfPatientsActionModalInsatanceCtrl', SummaryOfPatientsActionModalInsatanceCtrl)

        SummaryOfPatientsCtrl.$inject = ['SummaryOfPatientsSrvcs', '$stateParams', '$state', '$uibModal', '$window'];
        function SummaryOfPatientsCtrl(SummaryOfPatientsSrvcs, $stateParams, $state, $uibModal, $window){
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
                $state.go('hospital-operations-summary-of-patients', {reportingyear:reportingyear});
            }

            vm.is_loader_disabled = false;
            vm.is_submit_disabled = false;

            SummaryOfPatientsSrvcs.list({id:'', reportingyear:$stateParams.reportingyear}).then (function (response) {
                if(response.data.status == 200)
                {
                    vm.summary_of_patient = response.data.data[0];
                    vm.summary_of_patient_count = response.data.count;
                    console.log(vm.summary_of_patient)
                }
            }, function (){ alert('Bad Request!!!') })

            vm.sendDataDoh = function(){
                vm.is_loader_disabled = true;
                vm.is_submit_disabled = true;

                data['reportingyear'] = $stateParams.reportingyear;

                SummaryOfPatientsSrvcs.send_data_doh(data).then (function (response) {
                    alert('Successfully submitted!')

                    SummaryOfPatientsSrvcs.list({id:'', reportingyear:$stateParams.reportingyear}).then (function (response) {
                        if(response.data.status == 200)
                        {
                            vm.summary_of_patient = response.data.data[0];
                            vm.summary_of_patient_count = response.data.count;
                            console.log(vm.summary_of_patient)
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

        SummaryOfPatientsCreateCtrl.$inject = ['SummaryOfPatientsSrvcs', '$stateParams', '$uibModal', '$window'];
        function SummaryOfPatientsCreateCtrl(SummaryOfPatientsSrvcs, $stateParams, $uibModal, $window){
            var vm = this;
            var data = {}; 

            
        
            if($stateParams.reportingyear){

                SummaryOfPatientsSrvcs.list({id:'', reportingyear:$stateParams.reportingyear}).then (function (response) {
                    if(response.data.status == 200)
                    {
                        vm.data = response.data.data[0];
                        vm.data_count = response.data.count;
                        console.log(vm.data)

                        $uibModal.open({
                            templateUrl: 'add-summary-of-patient-modal',
                            controller: 'SummaryOfPatientsActionModalInsatanceCtrl',
                            controllerAs: 'summaryOfPatientsCtrl',
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

        SummaryOfPatientsActionModalInsatanceCtrl.$inject = ['collection', 'SummaryOfPatientsSrvcs', '$state', '$stateParams', '$uibModalInstance', '$window'];
        function SummaryOfPatientsActionModalInsatanceCtrl (collection, SummaryOfPatientsSrvcs, $state, $stateParams, $uibModalInstance, $window) {

            var vm = this;
            vm.collection = collection.data;
            vm.collection_copy = collection.data;
            vm.reportingyear = $stateParams.reportingyear; 

            vm.createSummaryOfPatientBtn = function(data){
                
                data['reportingyear'] = $stateParams.reportingyear;
                console.log(data);
                SummaryOfPatientsSrvcs.store(data).then(function(response){
                    if (response.data.status == 200) {
                        alert(response.data.message);
                        $state.go('hospital-operations-summary-of-patients', {reportingyear:$stateParams.reportingyear});
                        $uibModalInstance.close();
                    }
                    else {
                        alert(response.data.message);
                    }
                    console.log(response.data);
                });
            };

            vm.updateSummaryOfPatientBtn = function(data){

                data['reportingyear'] = $stateParams.reportingyear;
                console.log(data);

                SummaryOfPatientsSrvcs.update(data).then(function(response){
                    if (response.data.status == 200) {
                        alert(response.data.message);
                        $state.go('hospital-operations-summary-of-patients', {reportingyear:$stateParams.reportingyear});
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