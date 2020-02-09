(function(){
    'use strict';
    angular
        .module('emrApp')
        .factory('SurgicalOperationsMinorSrvcs', SurgicalOperationsMinorSrvcs)
        SurgicalOperationsMinorSrvcs.$inject = ['$http', '$rootScope'];

        function SurgicalOperationsMinorSrvcs($http, $rootScope) {

            return {
                list: function(data) {
                    return $http({
                        method: 'GET',
                        data: data,
                        url: '/api/v1/surgical-operations-minor?id='+data.id+'&reportingyear='+data.reportingyear,
                        headers: {'Content-Type': 'application/json'}
                    })
                },
                store: function(data) {
                    return $http({
                        method: 'POST',
                        url: '/api/v1/surgical-operation-minor/store',
                        data: data,
                        headers: {'Content-Type': 'application/json'}
                    })
                },
                update: function(data) {
                    return $http({
                        method: 'POST',
                        url: '/api/v1/surgical-operation-minor/update',
                        data: data,
                        headers: {'Content-Type': 'application/json'}
                    })
                },
                remove: function(data) {
                    return $http({
                        method: 'POST',
                        url: '/api/v1/surgical-operation-minor/remove',
                        data: data,
                        headers: {'Content-Type': 'application/json'}
                    })
                },
                send_data_doh: function(data) {
                    return $http({
                        method: 'POST',
                        url: '/api/v1/surgical-operation-minor/send_data_doh',
                        data: data,
                        headers: {'Content-Type': 'application/json'}
                    })
                },

            };
        }
})();