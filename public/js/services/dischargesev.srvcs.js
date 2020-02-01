(function(){
    'use strict';
    angular
        .module('emrApp')
        .factory('DischargesEVSrvcs', DischargesEVSrvcs)
        DischargesEVSrvcs.$inject = ['$http'];
        function DischargesEVSrvcs($http) {
            return {
                list: function(data) {
                    return $http({
                        method: 'GET',
                        data: data,
                        url: '/api/v1/discharges-ev?id='+data.id+'&reporting_year='+data.reporting_year,
                        headers: {'Content-Type': 'application/json'}
                    })
                },
                store: function(data) {
                    return $http({
                        method: 'POST',
                        url: '/api/v1/discharges-ev/store',
                        data: data,
                        headers: {'Content-Type': 'application/json'}
                    })
                },
                update: function(data) {
                    return $http({
                        method: 'POST',
                        url: '/api/v1/discharges-ev/update',
                        data: data,
                        headers: {'Content-Type': 'application/json'}
                    })
                },
                send_data_doh: function(data) {
                    return $http({
                        method: 'GET',
                        url: '/api/v1/discharges-ev/send_data_doh',
                        data: data,
                        headers: {'Content-Type': 'application/json'}
                    })
                },
                // remove: function(data) {
                //     return $http({
                //         method: 'POST',
                //         url: '/api/v1/classification/remove',
                //         data: data,
                //         headers: {'Content-Type': 'application/json'}
                //     })
                // }

            };
        }
})();
