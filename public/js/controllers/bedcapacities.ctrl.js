(function(){
    'use strict';
    angular
        .module('emrApp')
        .controller('BedCapacitiesCreateCtrl', BedCapacitiesCreateCtrl)
        .controller('BedCapacityActionModalInsatanceCtrl', BedCapacityActionModalInsatanceCtrl)

        BedCapacitiesCreateCtrl.$inject = ['BedCapacitiesSrvcs', '$stateParams', '$uibModal', '$window'];
        function BedCapacitiesCreateCtrl(BedCapacitiesSrvcs, $stateParams, $uibModal, $window){
            var vm = this;
            var data = {}; 
        
            if($stateParams.reporting_year){

                BedCapacitiesSrvcs.list({id:'', reporting_year:$stateParams.reporting_year}).then (function (response) {
                    if(response.data.status == 200)
                    {
                        vm.data = response.data.data[0];
                        vm.data_count = response.data.count;
                        console.log(vm.data)

                        $uibModal.open({
                            templateUrl: 'add-bed-capacity-modal',
                            controller: 'BedCapacityActionModalInsatanceCtrl',
                            controllerAs: 'bedCapacityCtrl',
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

        BedCapacityActionModalInsatanceCtrl.$inject = ['collection', 'BedCapacitiesSrvcs', '$state', '$stateParams', '$uibModalInstance', '$window'];
        function BedCapacityActionModalInsatanceCtrl (collection, BedCapacitiesSrvcs, $state, $stateParams, $uibModalInstance, $window) {

            var vm = this;
            vm.collection = collection.data;
            vm.collection_copy = collection.data;

            vm.createBedCapacityBtn = function(data){
                
                data['reportingyear'] = $stateParams.reporting_year;
                console.log(data);
                BedCapacitiesSrvcs.store(data).then(function(response){
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

            vm.updateBedCapacityBtn = function(data){

                data['reportingyear'] = $stateParams.reporting_year;
                console.log(data);

                BedCapacitiesSrvcs.update(data).then(function(response){
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