(function(){
    'use strict';
    angular
        .module('emrApp')
        .controller('DischargesMorbidityCtrl', DischargesMorbidityCtrl)
        .controller('DischargesMorbidityActionModalInsatanceCtrl', DischargesMorbidityActionModalInsatanceCtrl) 

        DischargesMorbidityCtrl.$inject = ['DischargesMorbiditySrvcs','RicbSrvcs', '$stateParams', '$state', '$uibModal', '$window', '$rootScope', '$scope'];
        function DischargesMorbidityCtrl(DischargesMorbiditySrvcs, RicbSrvcs, $stateParams, $state, $uibModal, $window, $rootScope, $scope){
            var vm = this;
            var data = {};

            DischargesMorbiditySrvcs.list({id:'', reporting_year:$stateParams.reporting_year, icd10code:''}).then (function (response) {
                if(response.data.status == 200)
                {
                    vm.discharges_morbidity = response.data.data;
                    vm.discharges_morbidity_count = response.data.count;
                    console.log(vm.discharges_morbidity)
                }
            }, function (){ alert('Bad Request!!!') })

            vm.sendDataDoh = function(){
                
                DischargesMorbiditySrvcs.send_data_doh().then (function (response) {
                    alert('Success!')
                }, function (){ alert('Bad Request!!!') })
            }

            vm.selectIcdType =  function(){
        
                var uibModal = $uibModal.open({
                    templateUrl: 'select-discharges-morbidity-modal',
                    controller: 'DischargesMorbidityActionModalInsatanceCtrl',
                    controllerAs: 'dischargesMorbidityCtrl',
                    backdrop: 'static',
                    keyboard  : false,
                    resolve :{
                        collection: function () {
                            return {
                                data: null,
                            };
                        }
                    },
                    size: 'lg'
                });

                uibModal.result.then(function(result) {
                    console.log(result);
                    vm.ricd10_details = result;
                    $state.go('hospital-operations-discharges-morbidity-select', {reporting_year:$stateParams.reporting_year, icd10code:result.icd10code});
                })
            }

            vm.deleteDischargesMorbidityBtn = function(id){

                data['id'] = id;
                data['reportingyear'] = $stateParams.reporting_year;

                DischargesMorbiditySrvcs.remove(data).then (function (response) {
                    if(response.data.status == 200)
                    {
                        DischargesMorbiditySrvcs.list({id:'', reporting_year:$stateParams.reporting_year, icd10code:''}).then (function (response) {
                            if(response.data.status == 200)
                            {
                                vm.discharges_morbidity = response.data.data;
                                vm.discharges_morbidity_count = response.data.count;
                                console.log(vm.discharges_morbidity)
                            }
                        }, function (){ alert('Bad Request!!!') })
                    }
                }, function (){ alert('Bad Request!!!') })
            }

            if($stateParams.icd10code!=null && $stateParams.action==null){

                RicbSrvcs.list({id:'', icd10code:$stateParams.icd10code}).then (function (response) {
                    if(response.data.status == 200)
                    {
                        vm.ricb = response.data.data[0]; 
                        console.log(vm.ricb)
            
                        $uibModal.open({
                            templateUrl: 'add-discharges-morbidity-modal',
                            controller: 'DischargesMorbidityActionModalInsatanceCtrl',
                            controllerAs: 'dischargesMorbidityCtrl',
                            backdrop: 'static',
                            keyboard  : false,
                            resolve :{
                                collection: function () {
                                    return {
                                        data: vm.ricb,
                                    };
                                }
                            },
                            size: 'lg'
                        });
                    }
                }, function (){ alert('Bad Request!!!') })

            }

            if($stateParams.icd10code!=null && $stateParams.action=='edit'){

                DischargesMorbiditySrvcs.list({id:'', reporting_year:$stateParams.reporting_year, icd10code:$stateParams.icd10code}).then (function (response) {
 
                    if(response.data.status == 200)
                    {
                        vm.ricb = response.data.data[0]; 
                        console.log(vm.ricb)
            
                        $uibModal.open({
                            templateUrl: 'edit-discharges-morbidity-modal',
                            controller: 'DischargesMorbidityActionModalInsatanceCtrl',
                            controllerAs: 'dischargesMorbidityCtrl',
                            backdrop: 'static',
                            keyboard  : false,
                            resolve :{
                                collection: function () {
                                    return {
                                        data: vm.ricb,
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

        DischargesMorbidityActionModalInsatanceCtrl.$inject = ['collection', 'DischargesMorbiditySrvcs', 'RicbSrvcs', 'mySharedService', '$state', '$stateParams', '$uibModalInstance', '$window', '$rootScope','$scope'];
        function DischargesMorbidityActionModalInsatanceCtrl (collection, DischargesMorbiditySrvcs, RicbSrvcs, mySharedService, $state, $stateParams, $uibModalInstance, $window, $rootScope, $scope) {

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

            vm.chooseRicd10Code = function(icd10code){
 
                RicbSrvcs.list({id:'', icd10code:icd10code}).then (function (response) {
                    if(response.data.status == 200)icd10code
                    {
                        vm.ricd10  = response.data.data[0];
                        vm.ricd10_details = {icd10code:vm.ricd10.icd10code, icd10desc:vm.ricd10.icd10desc, icd10cat:vm.ricd10.icd10cat};
                        $uibModalInstance.close(vm.ricd10_details);
                    }
                }, function (){ alert('Bad Request!!!') })

            }

            vm.createDischargesMorbidityBtn = function(data){
 
                data['reportingyear']   = $stateParams.reporting_year;
                data['icd10desc']       = vm.collection.icd10desc;
                data['icd10code']       = vm.collection.icd10code;
                data['icd10cat']        = vm.collection.icd10cat;

                console.log(data);

                DischargesMorbiditySrvcs.store(data).then(function(response){
                    if (response.data.status == 200) {
                        alert(response.data.message);
                        DischargesMorbiditySrvcs.list({id:'', reporting_year:$stateParams.reporting_year, icd10code:''}).then (function (response) {
                            if(response.data.status == 200)
                            {
                                vm.discharges_morbidity = response.data.data;
                                $state.go('hospital-operations-discharges-morbidity', {reporting_year:$stateParams.reporting_year});
                                vm.close();
                            }
                        }, function (){ alert('Bad Request!!!') })
                    }
                    else {
                        alert(response.data.message);
                    }
                    console.log(response.data);
                });

            }

            vm.updateDischargesMorbidityBtn = function(data){
 
                data['reportingyear']   = $stateParams.reporting_year;
                data['icd10desc']       = vm.collection.icd10desc;
                data['icd10code']       = vm.collection.icd10code;
                data['icd10cat']        = vm.collection.icd10cat;

                console.log(data);

                DischargesMorbiditySrvcs.update(data).then(function(response){
                    if (response.data.status == 200) {
                        alert(response.data.message);
                        DischargesMorbiditySrvcs.list({id:'', reporting_year:$stateParams.reporting_year, icd10code:''}).then (function (response) {
                            if(response.data.status == 200)
                            {
                                vm.discharges_morbidity = response.data.data;
                                $state.go('hospital-operations-discharges-morbidity', {reporting_year:$stateParams.reporting_year});
                                vm.close();
                            }
                        }, function (){ alert('Bad Request!!!') })
                    }
                    else {
                        alert(response.data.message);
                    }
                    console.log(response.data);
                });

            }

            vm.routeTo = function(route){
                $window.location.href = route;
            };

            vm.close = function() {
                $uibModalInstance.close();
            };
        }


})();