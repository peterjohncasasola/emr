(function(){
    'use strict';
    angular
        .module('emrApp')
        .controller('QualityManagementCreateCtrl', QualityManagementCreateCtrl)
        .controller('QualityManagementActionModalInsatanceCtrl', QualityManagementActionModalInsatanceCtrl)

        QualityManagementCreateCtrl.$inject = ['QualityManagementSrvcs', '$stateParams', '$uibModal', '$window'];
        function QualityManagementCreateCtrl(QualityManagementSrvcs, $stateParams, $uibModal, $window){
            var vm = this;
            var data = {};
        
            if($stateParams.reporting_year){

                QualityManagementSrvcs.list({id:'', reporting_year:$stateParams.reporting_year}).then (function (response) {
                    if(response.data.status == 200)
                    {
                        vm.data = response.data.data[0];
                        vm.data_count = response.data.count;
                        console.log(vm.data)

                        $uibModal.open({
                            templateUrl: 'add-quality-management-modal',
                            controller: 'QualityManagementActionModalInsatanceCtrl',
                            controllerAs: 'qualityManagementCtrl',
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

        QualityManagementActionModalInsatanceCtrl.$inject = ['collection', 'QualityManagementSrvcs', '$state', '$stateParams', '$uibModalInstance', '$window'];
        function QualityManagementActionModalInsatanceCtrl (collection, QualityManagementSrvcs, $state, $stateParams, $uibModalInstance, $window) {

            var vm = this;
            
            vm.qualitymgmttypes = [
                {id:1, name:'ISO Certified'},
                {id:2, name:'International Accreditation'},
                {id:3, name:'PhilHealth Accreditation'},
                {id:4, name:'PCAHO'}
            ];

            vm.philhealthaccreditation = [
                {id:1, name:'Basic Participation'},
                {id:2, name:'Advanced Participation'}
            ];

            vm.collection = collection.data;
            vm.collection_copy = collection.data;

            vm.createQualityManagementBtn = function(data){
                data['reportingyear'] = $stateParams.reporting_year;
                console.log(data);
                QualityManagementSrvcs.store(data).then(function(response){
                    if (response.data.status == 200) {
                        alert(response.data.message);
                        $state.go('general-info', {reporting_year:$stateParams.reporting_year});
                        $uibModalInstance.close();
                    }
                    else {
                        alert(response.data.message);
                    }
                    console.log(response.data);
                });
            };

            vm.updateQualityManagementBtn = function(data){

                data['reportingyear'] = $stateParams.reporting_year;
                console.log(data);

                QualityManagementSrvcs.update(data).then(function(response){
                    if (response.data.status == 200) {
                        alert(response.data.message);
                        $state.go('general-info', {reporting_year:$stateParams.reporting_year});
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