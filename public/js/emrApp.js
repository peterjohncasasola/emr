(function(){
    'use strict';
    angular
        // .module('pulsarApp',['ui.router', 'ngSanitize', 'ui.bootstrap', 'datatables', 'datatables.tabletools', 'datatables.buttons', 'datatables.bootstrap', 'dynamicNumber', 'ui.mask', 'ui.utils.masks', 'checklist-model'])
        .module('emrApp',[
          'ui.router',
          'ngSanitize',
          'dynamicNumber',
        //   'ui.mask',
          'ui.bootstrap'
        //   'datatables',
          // 'datatables.tabletools', 
          // 'datatables.buttons'
          // 'ui.utils.masks', 
          // 'checklist-model'
        ])
        .config(Config)
        .controller('MainCtrl', MainCtrl)

        Config.$inject = ['$stateProvider', '$urlRouterProvider', '$locationProvider', '$controllerProvider', '$compileProvider', '$filterProvider', '$provide', '$interpolateProvider', 'dynamicNumberStrategyProvider'];
        function Config($stateProvider, $urlRouterProvider, $locationProvider, $controllerProvider, $compileProvider, $filterProvider, $provide, $interpolateProvider, dynamicNumberStrategyProvider){
            console.log("App here!");
            $interpolateProvider.startSymbol('<%');
            $interpolateProvider.endSymbol('%>');
            $locationProvider.html5Mode(true);

            var main = {
                url: '/index',
                templateUrl: 'main.view'
            };

            // dynamicNumberStrategyProvider.addStrategy('price', {
            //     numInt: 12,
            //     numFract: 2,
            //     numSep: '.',
            //     numPos: true,
            //     numNeg: true,
            //     numRound: 'round',
            //     numThousand: true
            // });
            
            $stateProvider
            .state('main-view', main)

            //-- Employees --//

            // .state('expenses', {
            //     url: '/expenses',
            //     controller: 'ExpensesCtrl as expensesCtrl',
            //     templateUrl: 'expenses.view'
            // })

            .state('expenses', {
                url: '/expenses/:reporting_year',
                controller: 'ExpensesCtrl as expensesCtrl',
                templateUrl: 'expenses.view'
            })

            .state('expenses-details', {
                url: '/expenses/:reporting_year/details',
                controller: 'ExpensesCreateCtrl as expensesCtrl',
                templateUrl: 'expenses.view'
            })

            .state('revenues', {
                url: '/revenues/:reporting_year',
                controller: 'RevenuesCtrl as revenuesCtrl',
                templateUrl: 'revenues.view'
            })

            .state('revenues-details', {
                url: '/revenues/:reporting_year/details',
                controller: 'RevenuesCreateCtrl as revenuesCtrl',
                templateUrl: 'expenses.view'
            })

            .state('general-info', {
                url: '/general-info/:reporting_year',
                controller: 'ExpensesCtrl as expensesCtrl',
                templateUrl: 'general_info.view'
            })

            .state('general-info-classification', {
                url: '/general-info/classifications/:reporting_year/details',
                controller: 'ExpensesCtrl as expensesCtrl',
                templateUrl: 'general_info.view'
            })

            .state('general-info-bed-capacity', {
                url: '/general-info/bed-capacity/:reporting_year/details',
                controller: 'ExpensesCtrl as expensesCtrl',
                templateUrl: 'general_info.view'
            })

            .state('facility_profile', {
                url: '/facility-profile/:reporting_year',
                controller: 'ExpensesCtrl as expensesCtrl',
                templateUrl: 'facility_profile.view'
            })

            
            
            $urlRouterProvider.otherwise('/index');

        }

        MainCtrl.$inject = ['$window','$http'];
        function MainCtrl($window, $http) {
            var vm = this;
            vm.routeTo = function(route){
                $window.location.href = route;
            };
        };
})();


 