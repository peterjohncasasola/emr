(function(){
    'use strict';
    angular
        .module('emrApp')
        .controller('GeneralInfoCtrl', GeneralInfoCtrl)

        GeneralInfoCtrl.$inject = ['BedCapacitiesSrvcs', 'ClassificationsSrvcs', 'QualityManagementSrvcs', '$stateParams', '$uibModal', '$window'];
        function GeneralInfoCtrl(BedCapacitiesSrvcs, ClassificationsSrvcs, QualityManagementSrvcs, $stateParams, $uibModal, $window){
            var vm = this;
            var data = {};

            vm.is_loader_disabled = false;
            vm.is_submit_disabled_classification = false;
            vm.is_submit_disabled_bed_capacity = false;
            vm.is_submit_disabled_quality_management = false;

            BedCapacitiesSrvcs.list({id:'', reporting_year:$stateParams.reporting_year}).then (function (response) {
                if(response.data.status == 200)
                {
                    vm.general_info = response.data.data[0];
                    vm.general_info_count = response.data.count;
                    console.log(vm.general_info)
                }
            }, function (){ alert('Bad Request!!!') })


            ClassificationsSrvcs.list({id:'', reporting_year:$stateParams.reporting_year}).then (function (response) {
                if(response.data.status == 200)
                {
                    vm.classification = response.data.data[0];
                    vm.classification_count = response.data.count;
                    console.log(vm.classification)
                }
            }, function (){ alert('Bad Request!!!') })

            QualityManagementSrvcs.list({id:'', reporting_year:$stateParams.reporting_year}).then (function (response) {
                if(response.data.status == 200)
                {
                    vm.quality_management = response.data.data;
                    vm.quality_management_count = response.data.count;
                    console.log(vm.quality_management)
                }
            }, function (){ alert('Bad Request!!!') })
            
            vm.sendDataClassificationDoh = function(){
                vm.is_loader_disabled = true;
                vm.is_submit_disabled_classification = true;
                vm.is_submit_disabled_bed_capacity = true;
                vm.is_submit_disabled_quality_management = true;
               
                ClassificationsSrvcs.send_data_doh().then (function (response) {
                    alert('Successfully submitted!')

                    ClassificationsSrvcs.list({id:'', reporting_year:$stateParams.reporting_year}).then (function (response) {
                        if(response.data.status == 200)
                        {
                            vm.classification = response.data.data[0];
                            vm.classification_count = response.data.count;
                            console.log(vm.classification)
                        }
                    }, function (){ alert('Bad Request!!!') })

                    vm.is_loader_disabled = false;
                    vm.is_submit_disabled_classification = false;
                    vm.is_submit_disabled_bed_capacity = false;
                    vm.is_submit_disabled_quality_management = false;

                }, function (){ alert('Bad Request!!!') })
            }
            
            vm.sendDataBedCapacityDoh = function(){
                vm.is_loader_disabled = true;
                vm.is_submit_disabled_classification = true;
                vm.is_submit_disabled_bed_capacity = true;
                vm.is_submit_disabled_quality_management = true;

                BedCapacitiesSrvcs.send_data_doh().then (function (response) {
                    alert('Successfully submitted!')

                    BedCapacitiesSrvcs.list({id:'', reporting_year:$stateParams.reporting_year}).then (function (response) {
                        if(response.data.status == 200)
                        {
                            vm.general_info = response.data.data[0];
                            vm.general_info_count = response.data.count;
                            console.log(vm.general_info)
                        }
                    }, function (){ alert('Bad Request!!!') })

                    vm.is_loader_disabled = false;
                    vm.is_submit_disabled_classification = false;
                    vm.is_submit_disabled_bed_capacity = false;
                    vm.is_submit_disabled_quality_management = false;

                }, function (){ alert('Bad Request!!!') })
            }

            vm.sendDataQualityManagementDoh = function(){
                vm.is_loader_disabled = true;
                vm.is_submit_disabled_classification = true;
                vm.is_submit_disabled_bed_capacity = true;
                vm.is_submit_disabled_quality_management = true;

                QualityManagementSrvcs.send_data_doh().then (function (response) {
                    alert('Successfully submitted!')

                    QualityManagementSrvcs.list({id:'', reporting_year:$stateParams.reporting_year}).then (function (response) {
                        if(response.data.status == 200)
                        {
                            vm.quality_management = response.data.data;
                            vm.quality_management_count = response.data.count;
                            console.log(vm.quality_management)
                        }
                    }, function (){ alert('Bad Request!!!') })

                    vm.is_loader_disabled = false;
                    vm.is_submit_disabled_classification = false;
                    vm.is_submit_disabled_bed_capacity = false;
                    vm.is_submit_disabled_quality_management = false;
                }, function (){ alert('Bad Request!!!') })
            }

            vm.routeTo = function(route){
                $window.location.href = route;
            }; 
        }

})();