(function(){
    'use strict';
    angular
        .module('emrApp')
        .factory('SurgicalOperationsMajorSrvcs', SurgicalOperationsMajorSrvcs)
        SurgicalOperationsMajorSrvcs.$inject = ['$http', '$rootScope'];

        function SurgicalOperationsMajorSrvcs($http, $rootScope) {

            return {
                list: function(data) {
                    return $http({
                        method: 'GET',
                        data: data,
                        url: '/api/v1/surgical-operations-major?id='+data.id+'&reporting_year='+data.reporting_year,
                        headers: {'Content-Type': 'application/json'}
                    })
                },
                store: function(data) {
                    return $http({
                        method: 'POST',
                        url: '/api/v1/surgical-operation-major/store',
                        data: data,
                        headers: {'Content-Type': 'application/json'}
                    })
                },
                update: function(data) {
                    return $http({
                        method: 'POST',
                        url: '/api/v1/surgical-operation-major/update',
                        data: data,
                        headers: {'Content-Type': 'application/json'}
                    })
                },
                remove: function(data) {
                    return $http({
                        method: 'POST',
                        url: '/api/v1/surgical-operation-major/remove',
                        data: data,
                        headers: {'Content-Type': 'application/json'}
                    })
                },
                send_data_doh: function(data) {
                    return $http({
                        method: 'GET',
                        url: '/api/v1/surgical-operation-major/send_data_doh',
                        data: data,
                        headers: {'Content-Type': 'application/json'}
                    })
                },

            };
        }
})();