(function(){
    'use strict';
    angular
        .module('emrApp')
        .factory('DischargesOPDSrvcs', DischargesOPDSrvcs)
        DischargesOPDSrvcs.$inject = ['$http', '$rootScope'];

        function DischargesOPDSrvcs($http, $rootScope) {

            return {
                list: function(data) {
                    return $http({
                        method: 'GET',
                        data: data,
                        url: '/api/v1/discharges-opd?id='+data.id+'&reporting_year='+data.reporting_year,
                        headers: {'Content-Type': 'application/json'}
                    })
                },
                store: function(data) {
                    return $http({
                        method: 'POST',
                        url: '/api/v1/discharges-opd/store',
                        data: data,
                        headers: {'Content-Type': 'application/json'}
                    })
                },
                update: function(data) {
                    return $http({
                        method: 'POST',
                        url: '/api/v1/discharges-opd/update',
                        data: data,
                        headers: {'Content-Type': 'application/json'}
                    })
                },
                send_data_doh: function(data) {
                    return $http({
                        method: 'GET',
                        url: '/api/v1/discharges-opd/send_data_doh',
                        data: data,
                        headers: {'Content-Type': 'application/json'}
                    })
                },

            };
        }
})();