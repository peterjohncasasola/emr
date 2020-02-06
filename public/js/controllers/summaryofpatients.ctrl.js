(function(){
    'use strict';
    angular
        .module('emrApp')
        .controller('SummaryOfPatientsCtrl', SummaryOfPatientsCtrl)
        .controller('SummaryOfPatientsCreateCtrl', SummaryOfPatientsCreateCtrl)
        .controller('SummaryOfPatientsActionModalInsatanceCtrl', SummaryOfPatientsActionModalInsatanceCtrl)

        SummaryOfPatientsCtrl.$inject = ['SummaryOfPatientsSrvcs', '$stateParams', '$uibModal', '$window'];
        function SummaryOfPatientsCtrl(SummaryOfPatientsSrvcs, $stateParams, $uibModal, $window){
            var vm = this;
            var data = {};

            vm.is_loader_disabled = false;
            vm.is_submit_disabled = false;

            SummaryOfPatientsSrvcs.list({id:'', reporting_year:$stateParams.reporting_year}).then (function (response) {
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

                SummaryOfPatientsSrvcs.send_data_doh().then (function (response) {
                    alert('Successfully submitted!')

                    SummaryOfPatientsSrvcs.list({id:'', reporting_year:$stateParams.reporting_year}).then (function (response) {
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
        
            if($stateParams.reporting_year){

                SummaryOfPatientsSrvcs.list({id:'', reporting_year:$stateParams.reporting_year}).then (function (response) {
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

            vm.createSummaryOfPatientBtn = function(data){
                
                data['reportingyear'] = $stateParams.reporting_year;
                console.log(data);
                SummaryOfPatientsSrvcs.store(data).then(function(response){
                    if (response.data.status == 200) {
                        alert(response.data.message);
                        $state.go('hospital-operations-summary-of-patients', {reporting_year:$stateParams.reporting_year});
                        $uibModalInstance.close();
                    }
                    else {
                        alert(response.data.message);
                    }
                    console.log(response.data);
                });
            };

            vm.updateSummaryOfPatientBtn = function(data){

                data['reportingyear'] = $stateParams.reporting_year;
                console.log(data);

                SummaryOfPatientsSrvcs.update(data).then(function(response){
                    if (response.data.status == 200) {
                        alert(response.data.message);
                        $state.go('hospital-operations-summary-of-patients', {reporting_year:$stateParams.reporting_year});
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