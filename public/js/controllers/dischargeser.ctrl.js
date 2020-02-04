(function(){
    'use strict';
    angular
        .module('emrApp')
        .controller('DischargesERCtrl', DischargesERCtrl)
        .controller('DischargesERActionModalInsatanceCtrl', DischargesERActionModalInsatanceCtrl)

        DischargesERCtrl.$inject = ['DischargesERSrvcs','RicbSrvcs', '$stateParams', '$uibModal', '$window', '$rootScope', '$scope'];
        function DischargesERCtrl(DischargesERSrvcs, RicbSrvcs, $stateParams, $uibModal, $window, $rootScope, $scope){
            var vm = this;
            var data = {};

            DischargesERSrvcs.list({id:'', reporting_year:$stateParams.reporting_year}).then (function (response) {
                if(response.data.status == 200)
                {
                    vm.discharges_er = response.data.data;
                    vm.discharges_er_count = response.data.count;
                    console.log(vm.discharges_er)
                }
            }, function (){ alert('Bad Request!!!') })

            vm.selectIcdType =  function(){
        
                var uibModal = $uibModal.open({
                    templateUrl: 'add-discharges-er-modal',
                    controller: 'DischargesERActionModalInsatanceCtrl',
                    controllerAs: 'dischargesERCtrl',
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

            vm.createDischargeERBtn = function(data){
                
                data['reportingyear'] = $stateParams.reporting_year;
                console.log(data);
                DischargesERSrvcs.store(data).then(function(response){
                    if (response.data.status == 200) {
                        alert(response.data.message);
                        DischargesERSrvcs.list({id:'', reporting_year:$stateParams.reporting_year}).then (function (response) {
                            if(response.data.status == 200)
                            {
                                vm.discharges_er = response.data.data;
                            }
                        }, function (){ alert('Bad Request!!!') })
                    }
                    else {
                        alert(response.data.message);
                    }
                    console.log(response.data);
                });
            };

            vm.deleteDischargeERBtn = function(id){
                
                data['id'] = id;
                data['reportingyear'] = $stateParams.reporting_year;
                console.log(data);
                DischargesERSrvcs.remove(data).then(function(response){
                    if (response.data.status == 200) {
                        alert(response.data.message);
                        DischargesERSrvcs.list({id:'', reporting_year:$stateParams.reporting_year}).then (function (response) {
                            if(response.data.status == 200)
                            {
                                vm.discharges_er = response.data.data;
                                console.log(vm.discharges_er)
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
                DischargesERSrvcs.send_data_doh().then (function (response) {
                    alert('Success!')
                }, function (){ alert('Bad Request!!!') })
            }

            vm.routeTo = function(route){
                $window.location.href = route;
            };


        }

        DischargesERActionModalInsatanceCtrl.$inject = ['collection', 'DischargesERSrvcs', 'RicbSrvcs', 'mySharedService', '$state', '$stateParams', '$uibModalInstance', '$window', '$rootScope','$scope'];
        function DischargesERActionModalInsatanceCtrl (collection, DischargesERSrvcs, RicbSrvcs, mySharedService, $state, $stateParams, $uibModalInstance, $window, $rootScope, $scope) {

            var vm = this;
            vm.collection = collection.data;
            vm.collection_copy = collection.data;

            console.log(vm.collection)

            RicbSrvcs.list({id:'', icd10code:''}).then (function (response) {
                if(response.data.status == 200)
                {
                    vm.ricd10 = response.data.data;
                    vm.ricd10_count = response.data.count;
                    console.log(vm.ricd10)
                }
            }, function (){ alert('Bad Request!!!') })
           
            // vm.ricd10 = [
            //     { 'icd10code': 'A01.1', 'icd10desc': 'Paratyphoid fever A', 'icd10cat': 'A00-A09'},
            //     { 'icd10code': 'A01.2', 'icd10desc': 'Paratyphoid fever B', 'icd10cat': 'A00-A09'},
            //     { 'icd10code': 'A01.3', 'icd10desc': 'Paratyphoid fever C', 'icd10cat': 'A00-A09'},
            //     { 'icd10code': 'A01.4', 'icd10desc': 'Paratyphoid fever, unspecified', 'icd10cat': 'A00-A09'},
            //     { 'icd10code': 'A02.1', 'icd10desc': 'Salmonella septicemia', 'icd10cat': 'A00-A09'},
            //     { 'icd10code': 'A02.2', 'icd10desc': 'Localized salmonella infections', 'icd10cat': 'A00-A09'},
            //     { 'icd10code': 'A02.8', 'icd10desc': 'Other specified salmonella infections', 'icd10cat': 'A00-A09'},
            //     { 'icd10code': 'A02.9', 'icd10desc': 'Salmonella infection, unspecified', 'icd10cat': 'A00-A09'},
            //     { 'icd10code': 'A03.0', 'icd10desc': 'Shigellosis due to Shigella dysenteriae', 'icd10cat': 'A00-A09'},
            //     { 'icd10code': 'A15.2', 'icd10desc': 'Tuberculosis of lung, confirmed histologically', 'icd10cat': 'A15-A19'}
            // ];

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