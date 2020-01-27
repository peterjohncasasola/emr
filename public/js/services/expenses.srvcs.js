(function(){
    'use strict';
    angular
        .module('emrApp')
        .factory('ExpensesSrvcs', ExpensesSrvcs)
        ExpensesSrvcs.$inject = ['$http'];
        function ExpensesSrvcs($http) {
            return {
                list: function(data) {
                    return $http({
                        method: 'GET',
                        data: data,
                        url: '/api/v1/expenses?id='+data.id+'&reporting_year='+data.reporting_year,
                        headers: {'Content-Type': 'application/json'}
                    })
                },
                store: function(data) {
                    return $http({
                        method: 'POST',
                        url: '/api/v1/expense/store',
                        data: data,
                        headers: {'Content-Type': 'application/json'}
                    })
                },
                update: function(data) {
                    return $http({
                        method: 'POST',
                        url: '/api/v1/expense/update',
                        data: data,
                        headers: {'Content-Type': 'application/json'}
                    })
                },
                // remove: function(data) {
                //     return $http({
                //         method: 'POST',
                //         url: '/api/v1/expense/remove',
                //         data: data,
                //         headers: {'Content-Type': 'application/json'}
                //     })
                // }

            };
        }
})();