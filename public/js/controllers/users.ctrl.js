(function(){
    'use strict';
    angular
        .module('emrApp')
        .controller('UsersCtrl', UsersCtrl)

        UsersCtrl.$inject = ['UsersSrvcs', '$scope', '$stateParams', '$state', '$uibModal', '$window'];
        function UsersCtrl(UsersSrvcs, $scope, $stateParams, $state, $uibModal, $window){
            var vm = this;
            var data = {};

            vm.reportingyear = $stateParams.reportingyear; 
 
            var counter = 1;
            vm.reportingyears = [];
            for(var year=2010; year<=2019; year++){
                vm.reportingyears.push({id:counter, year:year})
                counter++;
            }
 
            vm.is_loader_disabled = false;
            vm.is_submit_disabled = false;


            

            vm.acceptNdaBtn = function(){
 

                UsersSrvcs.update_accept_nda_status(data).then(function(response){
                    if (response.data.status == 200) {
                        alert(response.data.message);
                        $state.go('general-info', {reportingyear:2019});
                    }
                    else {
                        alert(response.data.message);
                    }
                    console.log(response.data);
                });
            };

            vm.rejectNdaBtn = function(){

                vm.routeTo('logout');
               
            };

            vm.routeTo = function(route){
                $window.location.href = route;
            };

            
        }

 

})();