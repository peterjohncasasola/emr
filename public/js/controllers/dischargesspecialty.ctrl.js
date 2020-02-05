(function(){
    'use strict';
    angular
        .module('emrApp')
        .controller('DischargesSpecialtyCtrl', DischargesSpecialtyCtrl)
        .controller('DischargesSpecialtyCreateCtrl', DischargesSpecialtyCCreateCtrl)
        .controller('DischargesSpecialtyActionModalInsatanceCtrl', DischargesSpecialtyActionModalInsatanceCtrl)

        DischargesSpecialtyCtrl.$inject = ['DischargesSpecialtySrvcs', '$stateParams', '$state', '$uibModal', '$window'];
        function DischargesSpecialtyCtrl(DischargesSpecialtySrvcs, $stateParams, $state, $uibModal, $window){
            var vm = this;
            var data = {};

            vm.type_of_service_list = [
                {id:1, desc:"Medicine", value:{}},
                {id:2, desc:"Obstetrics", value:{}},
                {id:3, desc:"Gynecology", value:{}},
                {id:4, desc:"Pediatrics", value:{}},
                {id:5, desc:"Pedia", value:{}},
                {id:6, desc:"Adult", value:{}},
                {id:7, desc:"Others", value:[]},
                {id:8, desc:"Pathologic", value:{}},
                {id:9, desc:"Non-Pathologic / Well-baby", value:{}}
            ];

            DischargesSpecialtySrvcs.list({id:'', reporting_year:$stateParams.reporting_year}).then (function (response) {
                if(response.data.status == 200)
                {
                    vm.type_of_services = response.data.data;
                    vm.type_of_services_count = response.data.count;

                    angular.forEach(vm.type_of_services, function(v, k){
                    
                        angular.forEach(vm.type_of_service_list, function(v2, k2){
                            if(v.typeofservice==v2.id)
                            {
                                v2.value = v;
                            }
                        });
                    });
                    console.log(vm.type_of_service_list)
                }
            }, function (){ alert('Bad Request!!!') })

            DischargesSpecialtySrvcs.list_others({id:'', reporting_year:$stateParams.reporting_year}).then (function (response) {
                if(response.data.status == 200)
                {
                    vm.type_of_services = response.data.data;
                    vm.type_of_services_count = response.data.count;

                    vm.type_of_service_list[6].value = vm.type_of_services;
                        
                    
                    console.log(vm.type_of_service_list)
                }
            }, function (){ alert('Bad Request!!!') })

            vm.deleteDischargeSpecialtyBtn = function(id, typeofservice){
               
                data['id'] = id;
                data['reportingyear'] = $stateParams.reporting_year;
                data['typeofservice'] = typeofservice;
                console.log(data);

                DischargesSpecialtySrvcs.remove(data).then(function(response){
                    if (response.data.status == 200) {
                        alert(response.data.message);
                        vm.type_of_service_list = [
                            {id:1, desc:"Medicine", value:{}},
                            {id:2, desc:"Obstetrics", value:{}},
                            {id:3, desc:"Gynecology", value:{}},
                            {id:4, desc:"Pediatrics", value:{}},
                            {id:5, desc:"Pedia", value:{}},
                            {id:6, desc:"Adult", value:{}},
                            {id:7, desc:"Others", value:[]},
                            {id:8, desc:"Pathologic", value:{}},
                            {id:9, desc:"Non-Pathologic / Well-baby", value:{}}
                        ];
            
                        DischargesSpecialtySrvcs.list({id:'', reporting_year:$stateParams.reporting_year}).then (function (response) {
                            if(response.data.status == 200)
                            {
                                vm.type_of_services = response.data.data;
                                vm.type_of_services_count = response.data.count;
            
                                angular.forEach(vm.type_of_services, function(v, k){
                                
                                    angular.forEach(vm.type_of_service_list, function(v2, k2){
                                        if(v.typeofservice==v2.id)
                                        {
                                            v2.value = v;
                                        }
                                    });
                                });
                                console.log(vm.type_of_service_list)
                            }
                        }, function (){ alert('Bad Request!!!') })
            
                        DischargesSpecialtySrvcs.list_others({id:'', reporting_year:$stateParams.reporting_year}).then (function (response) {
                            if(response.data.status == 200)
                            {
                                vm.type_of_services = response.data.data;
                                vm.type_of_services_count = response.data.count;
            
                                vm.type_of_service_list[6].value = vm.type_of_services;
                                    
                                
                                console.log(vm.type_of_service_list)
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
                DischargesSpecialtySrvcs.send_data_doh().then (function (response) {
                    alert('Success!')
                }, function (){ alert('Bad Request!!!') })
            }

            vm.routeTo = function(route){
                $window.location.href = route;
            }; 
        }

        DischargesSpecialtyCCreateCtrl.$inject = ['DischargesSpecialtySrvcs', '$stateParams', '$uibModal', '$window'];
        function DischargesSpecialtyCCreateCtrl(DischargesSpecialtySrvcs, $stateParams, $uibModal, $window){
            var vm = this;
            var data = {}; 

            if($stateParams.reporting_year){
                 
                $uibModal.open({
                    templateUrl: 'add-discharges-specialty-modal',
                    controller: 'DischargesSpecialtyActionModalInsatanceCtrl',
                    controllerAs: 'dischargesSpecialtyCtrl',
                    backdrop: 'static',
                    keyboard  : false,
                    resolve :{
                        collection: function () {
                            return {
                                data: null
                            };
                        }
                    },
                    size: 'xlg'
                }); 
            }

            vm.routeTo = function(route){
                $window.location.href = route;
            }; 
        }

        DischargesSpecialtyActionModalInsatanceCtrl.$inject = ['collection', 'DischargesSpecialtySrvcs', '$state', '$stateParams', '$uibModalInstance', '$window'];
        function DischargesSpecialtyActionModalInsatanceCtrl (collection, DischargesSpecialtySrvcs, $state, $stateParams, $uibModalInstance, $window) {

            var vm = this;
            vm.collection = collection.data;
            vm.collection_copy = collection.data;

            vm.type_of_services = [
                {id:1, desc:"Medicine", value:{}},
                {id:2, desc:"Obstetrics", value:{}},
                {id:3, desc:"Gynecology", value:{}},
                {id:4, desc:"Pediatrics", value:{}},
                {id:5, desc:"Pedia", value:{}},
                {id:6, desc:"Adult", value:{}},
                {id:7, desc:"Others", value:{}},
                {id:8, desc:"Pathologic", value:{}},
                {id:9, desc:"Non-Pathologic / Well-baby", value:{}}
            ];

            vm.createDischargeSpecialtyBtn = function(data){
                
                data['reportingyear'] = $stateParams.reporting_year;
                console.log(data);
                DischargesSpecialtySrvcs.store(data).then(function(response){
                    if (response.data.status == 200) {
                        alert(response.data.message);
                        $state.go('hospital-operations-discharges-specialty', {reporting_year:$stateParams.reporting_year});
                        $uibModalInstance.close();
                    }
                    else {
                        alert(response.data.message);
                    }
                    console.log(response.data);
                });
            };

            vm.updateDischargeSpecialtyBtn = function(data){

                data['reportingyear'] = $stateParams.reporting_year;
                console.log(data);

                DischargesSpecialtySrvcs.update(data).then(function(response){
                    if (response.data.status == 200) {
                        alert(response.data.message);
                        $state.go('hospital-operations-discharges-specialty', {reporting_year:$stateParams.reporting_year});
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