(function () {
    'use strict';
    angular
        // .module('pulsarApp',[])

        .module('pulsarApp', ['ui.router', 'ngSanitize', 'ui.bootstrap', 'datatables.bootstrap'])

        .controller('MainCtrl', MainCtrl)
        .config(Config)

    Config.$inject = ['$stateProvider', '$urlRouterProvider', '$locationProvider', '$controllerProvider', '$compileProvider', '$filterProvider', '$provide', '$interpolateProvider']

    function Config($stateProvider, $urlRouterProvider, $locationProvider, $controllerProvider, $compileProvider, $filterProvider, $provide, $interpolateProvider) {
        console.log("App here!");
        $interpolateProvider.startSymbol('<%');
        $interpolateProvider.endSymbol('%>');
        $locationProvider.html5Mode(true);

        var main = {
            url: '/index',
            templateUrl: 'main.view',
        };

        $stateProvider
            .state('main-view', main)

            .state('expenses', {
                url: '/exepenses',
                controller: 'ExpensesCtrl as expensesCtrl',
                templateUrl: 'expenses.view'
            })


        $urlRouterProvider.otherwise('/index');

    }

    MainCtrl.$inject = ['$window', '$http', 'UsersSrvcs', '$scope'];

    function MainCtrl($window, $http, UsersSrvcs, $scope) {
        var vm = this;
        vm.routeTo = function (route) {
            $window.location.href = route;
        };
        vm.getUsers = function () {
            return new Promise(resolve => {
                UsersSrvcs.list({
                    isSelfOnly: true
                }).then(function (response) {
                    if (response.data.status == 200) {
                        resolve(response.data.data);
                    }
                }, function () {
                    alert('Bad Request!!!')
                })
            });
        };

        vm.getUsers().then(e => $scope.$apply(() => {
            vm.users = e
        }));

        $scope.checkModuleAccess = function (navBarModules) {
            if (!vm.users) return;
            return (navBarModules) ? vm.users[0].modules.includes(navBarModules) : false;
        };
    };
})();