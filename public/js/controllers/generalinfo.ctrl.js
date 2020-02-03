(function(){
    'use strict';
    angular
        .module('emrApp')
        .controller('GeneralInfoCtrl', GeneralInfoCtrl)

        GeneralInfoCtrl.$inject = ['BedCapacitiesSrvcs', 'ClassificationsSrvcs', 'QualityManagementSrvcs', '$stateParams', '$uibModal', '$window'];
        function GeneralInfoCtrl(BedCapacitiesSrvcs, ClassificationsSrvcs, QualityManagementSrvcs, $stateParams, $uibModal, $window){
            var vm = this;
            var data = {};

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
                alert('send classification')
                ClassificationsSrvcs.send_data_doh().then (function (response) {
                    alert('Success!')
                }, function (){ alert('Bad Request!!!') })
            }
            
            vm.sendDataBedCapacityDoh = function(){
                
                BedCapacitiesSrvcs.send_data_doh().then (function (response) {
                    alert('Success!')
                }, function (){ alert('Bad Request!!!') })
            }

            vm.sendDataQualityManagementDoh = function(){
                alert('send quality management')
                QualityManagementSrvcs.send_data_doh().then (function (response) {
                    alert('Success!')
                }, function (){ alert('Bad Request!!!') })
            }

            vm.routeTo = function(route){
                $window.location.href = route;
            }; 
        }

})();