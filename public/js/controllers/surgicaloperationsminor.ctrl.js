(function(){
    'use strict';
    angular
        .module('emrApp')
        .controller('SurgicalOperationsMinorCtrl', SurgicalOperationsMinorCtrl)
        .controller('SurgicalOperationsMinorActionModalInsatanceCtrl', SurgicalOperationsMinorActionModalInsatanceCtrl)

        SurgicalOperationsMinorCtrl.$inject = ['SurgicalOperationsMinorSrvcs','SurgeriesSrvcs', '$stateParams', '$uibModal', '$window', '$rootScope', '$scope'];
        function SurgicalOperationsMinorCtrl(SurgicalOperationsMinorSrvcs, SurgeriesSrvcs, $stateParams, $uibModal, $window, $rootScope, $scope){
            var vm = this;
            var data = {};

            SurgicalOperationsMinorSrvcs.list({id:'', reporting_year:$stateParams.reporting_year}).then (function (response) {
                if(response.data.status == 200)
                {
                    vm.surgical_operations = response.data.data;
                    vm.surgical_operations_count = response.data.count;
                    console.log(vm.surgical_operations)
                }
            }, function (){ alert('Bad Request!!!') })

            vm.selectSurgeryType =  function(){
        
                var uibModal = $uibModal.open({
                    templateUrl: 'add-surgical-operation-minor-modal',
                    controller: 'SurgicalOperationsMinorActionModalInsatanceCtrl',
                    controllerAs: 'surgicalOperationsMinorCtrl',
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
                    vm.surgical_operation = result;
                })
            }

            vm.createSurgicalOperationtBtn = function(data){
                
                data['reportingyear'] = $stateParams.reporting_year;
                console.log(data);
                SurgicalOperationsMinorSrvcs.store(data).then(function(response){
                    if (response.data.status == 200) {
                        alert(response.data.message);
                        SurgicalOperationsMinorSrvcs.list({id:'', reporting_year:$stateParams.reporting_year}).then (function (response) {
                            if(response.data.status == 200)
                            {
                                vm.surgical_operations = response.data.data;
                                console.log(vm.surgical_operations)
                            }
                        }, function (){ alert('Bad Request!!!') })
                    }
                    else {
                        alert(response.data.message);
                    }
                    console.log(response.data);
                });
            };

            vm.deleteSurgicalOperationtBtn = function(id){
                
                data['id'] = id;
                data['reportingyear'] = $stateParams.reporting_year;
                console.log(data);
                SurgicalOperationsMinorSrvcs.remove(data).then(function(response){
                    if (response.data.status == 200) {
                        alert(response.data.message);
                        SurgicalOperationsMinorSrvcs.list({id:'', reporting_year:$stateParams.reporting_year}).then (function (response) {
                            if(response.data.status == 200)
                            {
                                vm.surgical_operations = response.data.data;
                                console.log(vm.surgical_operations)
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
                SurgicalOperationsMinorSrvcs.send_data_doh().then (function (response) {
                    alert('Success!')
                }, function (){ alert('Bad Request!!!') })
            }

            vm.routeTo = function(route){
                $window.location.href = route;
            };


        }

        SurgicalOperationsMinorActionModalInsatanceCtrl.$inject = ['collection', 'SurgicalOperationsMinorSrvcs', 'SurgeriesSrvcs', 'mySharedService', '$state', '$stateParams', '$uibModalInstance', '$window', '$rootScope','$scope'];
        function SurgicalOperationsMinorActionModalInsatanceCtrl (collection, SurgicalOperationsMinorSrvcs, SurgeriesSrvcs, mySharedService, $state, $stateParams, $uibModalInstance, $window, $rootScope, $scope) {

            var vm = this;
            vm.collection = collection.data;
            vm.collection_copy = collection.data;

            console.log(vm.collection)
           
            vm.serguries = [
                { 'proccode': 'OPERA10060', 'procdesc': 'Incision and drainage of abscess'},
                { 'proccode': 'OPERA10080', 'procdesc': 'Incision and drainage of pilonidal cyst'},
                { 'proccode': 'OPERA10120', 'procdesc': 'Incision and removal of foreign body, subcutaneous tissues'},
                { 'proccode': 'OPERA10140', 'procdesc': 'Incision and drainage of hematoma, seroma, or fluid collection'},
                { 'proccode': 'OPERA10160', 'procdesc': 'Puncture aspiration of abscess, hematoma, bulla, or cyst'},
                { 'proccode': 'OPERA10180', 'procdesc': 'Incision and drainage, complex, postoperative wound infection'},
                { 'proccode': 'OPERA11000', 'procdesc': 'Debridement of extensive eczematous or infected skin'},
                { 'proccode': 'OPERA11010', 'procdesc': 'Debridement including removal of foreign material associated w/ open fracture(s) and/or dislocation(s); skin and subcutaneous tissues'},
                { 'proccode': 'OPERA11011', 'procdesc': 'Debridement including removal of foreign material associated w/ open fracture(s) and/or dislocation(s); skin, subcutaneous tissue, muscle fascia, and muscle'},
                { 'proccode': 'OPERA11040', 'procdesc': 'Debridement; skin, partial thickness'}
            ];

            vm.chooseOperaCode = function(proccode){
 
                SurgeriesSrvcs.list({id:'', proccode:proccode}).then (function (response) {
                    if(response.data.status == 200)
                    {
                        vm.surgery  = response.data.data[0];
                        vm.surgical_operation = {operationcode:vm.surgery.proccode, surgicaloperation:vm.surgery.procdesc};
                        $uibModalInstance.close(vm.surgical_operation);
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