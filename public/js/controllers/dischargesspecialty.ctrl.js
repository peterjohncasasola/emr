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

            vm.reportingyear = $stateParams.reportingyear; 
 
            var counter = 1;
            vm.reportingyears = [];
            for(var year=2010; year<=2019; year++){
                vm.reportingyears.push({id:counter, year:year})
                counter++;
            }

            console.log(vm.reportingyears)

            vm.selectReportingYear = function(reportingyear){
           
                $state.go('hospital-operations-discharges-specialty', {reportingyear:reportingyear});
            }

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

            DischargesSpecialtySrvcs.list({id:'', reportingyear:$stateParams.reportingyear}).then (function (response) {
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

            DischargesSpecialtySrvcs.list_others({id:'', reportingyear:$stateParams.reportingyear}).then (function (response) {
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
                data['reportingyear'] = $stateParams.reportingyear;
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
            
                        DischargesSpecialtySrvcs.list({id:'', reportingyear:$stateParams.reportingyear}).then (function (response) {
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
            
                        DischargesSpecialtySrvcs.list_others({id:'', reportingyear:$stateParams.reportingyear}).then (function (response) {
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

                data['reportingyear'] = $stateParams.reportingyear;
                DischargesSpecialtySrvcs.send_data_doh(data).then (function (response) {
                    alert('Successfully submitted!')
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

            if($stateParams.reportingyear){
                 
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
            vm.reportingyear = $stateParams.reportingyear; 

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
                
                data['reportingyear'] = $stateParams.reportingyear;
                console.log(data);
                DischargesSpecialtySrvcs.store(data).then(function(response){
                    if (response.data.status == 200) {
                        alert(response.data.message);
                        $state.go('hospital-operations-discharges-specialty', {reportingyear:$stateParams.reportingyear});
                        $uibModalInstance.close();
                    }
                    else {
                        alert(response.data.message);
                    }
                    console.log(response.data);
                });
            };

            vm.updateDischargeSpecialtyBtn = function(data){

                data['reportingyear'] = $stateParams.reportingyear;
                console.log(data);

                DischargesSpecialtySrvcs.update(data).then(function(response){
                    if (response.data.status == 200) {
                        alert(response.data.message);
                        $state.go('hospital-operations-discharges-specialty', {reportingyear:$stateParams.reportingyear});
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