(function(){
    'use strict';
    angular
        .module('emrApp')
        .factory('DashboardSrvcs', DashboardSrvcs)
        DashboardSrvcs.$inject = ['$http'];
        function DashboardSrvcs($http) {
            return {
                expenses_vs_revenues: function(data) {
                    return $http({
                        method: 'GET',
                        data: data,
                        url: '/api/v1/dashboard-expenses-vs-revenues',
                        headers: {'Content-Type': 'application/json'}
                    })
                },
                progress: function(data) {
                    return $http({
                        method: 'GET',
                        data: data,
                        url: '/api/v1/dashboard-progress?reportingyear='+data.reportingyear,
                        headers: {'Content-Type': 'application/json'}
                    })
                },

            };
        }
})();