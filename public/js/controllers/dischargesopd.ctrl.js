(function(){
    'use strict';
    angular
        .module('emrApp')
        .controller('DischargesOPDCtrl', DischargesOPDCtrl)
        .controller('DischargesOPDActionModalInsatanceCtrl', DischargesOPDActionModalInsatanceCtrl)

        DischargesOPDCtrl.$inject = ['DischargesOPDSrvcs','RicbSrvcs', '$stateParams', '$uibModal', '$window', '$rootScope', '$scope'];
        function DischargesOPDCtrl(DischargesOPDSrvcs, RicbSrvcs, $stateParams, $uibModal, $window, $rootScope, $scope){
            var vm = this;
            var data = {};

            DischargesOPDSrvcs.list({id:'', reporting_year:$stateParams.reporting_year}).then (function (response) {
                if(response.data.status == 200)
                {
                    vm.discharges_opd = response.data.data;
                    vm.discharges_opd_count = response.data.count;
                    console.log(vm.discharges_opd)
                }
            }, function (){ alert('Bad Request!!!') })

            vm.selectIcdType =  function(){
        
                var uibModal = $uibModal.open({
                    templateUrl: 'add-discharges-er-modal',
                    controller: 'DischargesOPDActionModalInsatanceCtrl',
                    controllerAs: 'dischargesOPDCtrl',
                    backdrop: 'static',
                    keyboard  : false,
                    resolve :{
                        collection: function () {
                            return {
                                // data: vm.surgical_operation,
                                
                            };
                        }
                    },
                    size: 'lg'
                });

                uibModal.result.then(function(result) {
                    console.log(result);
                    vm.ricd10_details = result;
                })
            }

            vm.createDischargeOPDBtn = function(data){
                
                data['reportingyear'] = $stateParams.reporting_year;
                console.log(data);
                DischargesOPDSrvcs.store(data).then(function(response){
                    if (response.data.status == 200) {
                        alert(response.data.message);
                        DischargesOPDSrvcs.list({id:'', reporting_year:$stateParams.reporting_year}).then (function (response) {
                            if(response.data.status == 200)
                            {
                                vm.discharges_opd = response.data.data;
                            }
                        }, function (){ alert('Bad Request!!!') })
                    }
                    else {
                        alert(response.data.message);
                    }
                    console.log(response.data);
                });
            };

            vm.deleteDischargeOPDBtn = function(id){
                alert(id)
                data['id'] = id;
                data['reportingyear'] = $stateParams.reporting_year;
                console.log(data);
                DischargesOPDSrvcs.remove(data).then(function(response){
                    if (response.data.status == 200) {
                        alert(response.data.message);
                        DischargesOPDSrvcs.list({id:'', reporting_year:$stateParams.reporting_year}).then (function (response) {
                            if(response.data.status == 200)
                            {
                                vm.discharges_opd = response.data.data;
                                console.log(vm.discharges_opd)
                            }
                        }, function (){ alert('Bad Request!!!') })
                    }
                    else {
                        alert(response.data.message);
                    }
                    console.log(response.data);
                });
            };


            vm.sendDataDoh = function(){
                alert('asdf')
                DischargesOPDSrvcs.send_data_doh().then (function (response) {
                    alert('Success!')
                }, function (){ alert('Bad Request!!!') })
            }

            vm.routeTo = function(route){
                $window.location.href = route;
            };


        }

        DischargesOPDActionModalInsatanceCtrl.$inject = ['collection', 'DischargesOPDSrvcs', 'RicbSrvcs', 'mySharedService', '$state', '$stateParams', '$uibModalInstance', '$window', '$rootScope','$scope'];
        function DischargesOPDActionModalInsatanceCtrl (collection, DischargesOPDSrvcs, RicbSrvcs, mySharedService, $state, $stateParams, $uibModalInstance, $window, $rootScope, $scope) {

            var vm = this;
            vm.collection = collection.data;
            vm.collection_copy = collection.data;

            console.log(vm.collection)
           
            vm.ricd10 = [
                { 'icd10code': 'A01.1', 'icd10desc': 'Paratyphoid fever A', 'icd10cat': 'A00-A09'},
                { 'icd10code': 'A01.2', 'icd10desc': 'Paratyphoid fever B', 'icd10cat': 'A00-A09'},
                { 'icd10code': 'A01.3', 'icd10desc': 'Paratyphoid fever C', 'icd10cat': 'A00-A09'},
                { 'icd10code': 'A01.4', 'icd10desc': 'Paratyphoid fever, unspecified', 'icd10cat': 'A00-A09'},
                { 'icd10code': 'A02.1', 'icd10desc': 'Salmonella septicemia', 'icd10cat': 'A00-A09'},
                { 'icd10code': 'A02.2', 'icd10desc': 'Localized salmonella infections', 'icd10cat': 'A00-A09'},
                { 'icd10code': 'A02.8', 'icd10desc': 'Other specified salmonella infections', 'icd10cat': 'A00-A09'},
                { 'icd10code': 'A02.9', 'icd10desc': 'Salmonella infection, unspecified', 'icd10cat': 'A00-A09'},
                { 'icd10code': 'A03.0', 'icd10desc': 'Shigellosis due to Shigella dysenteriae', 'icd10cat': 'A00-A09'},
                { 'icd10code': 'A15.2', 'icd10desc': 'Tuberculosis of lung, confirmed histologically', 'icd10cat': 'A15-A19'}
            ];

            vm.chooseRicd10Code = function(icd10code){

                alert(icd10code)
 
                RicbSrvcs.list({id:'', icd10code:icd10code}).then (function (response) {
                    if(response.data.status == 200)icd10code
                    {
                        vm.ricd10  = response.data.data[0];
                        vm.ricd10_details = {icd10code:vm.ricd10.icd10code, icd10desc:vm.ricd10.icd10desc, icd10cat:vm.ricd10.icd10cat};
                        $uibModalInstance.close(vm.ricd10_details);
                    }
                }, function (){ alert('Bad Request!!!') })

            }

            vm.routeTo = function(route){
                $window.location.href = route;
            };

            vm.close = function() {
                $uibModalInstance.close();
            };
        }

})();