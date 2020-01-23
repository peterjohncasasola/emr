(function(){
    'use strict';
    angular
        .module('emrApp')
        .controller('ExpensesCtrl', ExpensesCtrl)

        ExpensesCtrl.$inject = ['$stateParams', '$window'];
        function PartExpensesCtrlicularsCtrl($stateParams, $window){
            var vm = this;
            var data = {};

            alert('asdf')

            // ParticularsSrvcs.particulars({particularCode:''}).then (function (response) {
            //     if(response.data.status == 200)
            //     {
            //         vm.particulars = response.data.data;
            //         console.log(vm.particulars)
            //     }
            // }, function (){ alert('Bad Request!!!') })

            vm.routeTo = function(route){
                $window.location.href = route;
            }; 
        }

})();