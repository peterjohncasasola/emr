(function(){
    'use strict';
    angular
        .module('emrApp')
        .controller('SurgeriesCtrl', SurgeriesCtrl)
        // .controller('SurgeriesActionModalInsatanceCtrl', SurgeriesActionModalInsatanceCtrl)

        SurgeriesCtrl.$inject = ['SurgeriesSrvcs', '$stateParams', '$uibModal', '$window'];
        function SurgeriesCtrl(SurgeriesSrvcs, $stateParams, $uibModal, $window){
            var vm = this;
            var data = {}; 
        
            // if($stateParams.proccode){

            //     SurgeriesSrvcs.list({id:'', proccode:$stateParams.proccode}).then (function (response) {
            //         if(response.data.status == 200)
            //         {
            //             vm.data = response.data.data[0];
            //             vm.data_count = response.data.count;
            //             console.log(vm.data)

            //             $uibModal.open({
            //                 templateUrl: 'add-bed-capacity-modal',
            //                 controller: 'SurgeriesActionModalInsatanceCtrl',
            //                 controllerAs: 'bedCapacityCtrl',
            //                 backdrop: 'static',
            //                 keyboard  : false,
            //                 resolve :{
            //                     collection: function () {
            //                         return {
            //                             data: vm.data
            //                         };
            //                     }
            //                 },
            //                 size: 'lg'
            //             });
            //         }
            //     }, function (){ alert('Bad Request!!!') })
            // }

            // vm.routeTo = function(route){
            //     $window.location.href = route;
            // }; 
        }

        // SurgeriesActionModalInsatanceCtrl.$inject = ['collection', 'SurgeriesSrvcs', '$state', '$stateParams', '$uibModalInstance', '$window'];
        // function SurgeriesActionModalInsatanceCtrl (collection, SurgeriesSrvcs, $state, $stateParams, $uibModalInstance, $window) {

        //     var vm = this;
        //     vm.collection = collection.data;
        //     vm.collection_copy = collection.data;

        //     vm.createBedCapacityBtn = function(data){
                
        //         data['reportingyear'] = $stateParams.proccode;
        //         console.log(data);
        //         SurgeriesSrvcs.store(data).then(function(response){
        //             if (response.data.status == 200) {
        //                 alert(response.data.message);
        //                 $state.go('general-info', {proccode:$stateParams.proccode});
        //                 $uibModalInstance.close();
        //             }
        //             else {
        //                 alert(response.data.message);
        //             }
        //             console.log(response.data);
        //         });
        //     };

        //     vm.updateBedCapacityBtn = function(data){

        //         data['reportingyear'] = $stateParams.proccode;
        //         console.log(data);

        //         SurgeriesSrvcs.update(data).then(function(response){
        //             if (response.data.status == 200) {
        //                 alert(response.data.message);
        //                 $state.go('general-info', {proccode:$stateParams.proccode});
        //                 $uibModalInstance.close();
        //             }
        //             else {
        //                 alert(response.data.message);
        //             }
        //             console.log(response.data);
        //         });
        //     };

        //     vm.routeTo = function(route){
        //         $window.location.href = route;
        //     };

        //     vm.close = function() {
        //         $uibModalInstance.close();
        //     };
        // }

})();