(function(){
    'use strict';
    angular
        .module('emrApp')
        .factory('OperationsDeathSrvcs', OperationsDeathSrvcs)
        OperationsDeathSrvcs.$inject = ['$http', '$rootScope'];

        function OperationsDeathSrvcs($http, $rootScope) {

            return {
                list: function(data) {
                    return $http({
                        method: 'GET',
                        data: data,
                        url: '/api/v1/death?id='+data.id+'&reportingyear='+data.reportingyear,
                        headers: {'Content-Type': 'application/json'}
                    })
                },
                store: function(data) {
                    return $http({
                        method: 'POST',
                        url: '/api/v1/death/store',
                        data: data,
                        headers: {'Content-Type': 'application/json'}
                    })
                },
                update: function(data) {
                    return $http({
                        method: 'POST',
                        url: '/api/v1/death/update',
                        data: data,
                        headers: {'Content-Type': 'application/json'}
                    })
                },
                remove: function(data) {
                    return $http({
                        method: 'POST',
                        url: '/api/v1/death/remove',
                        data: data,
                        headers: {'Content-Type': 'application/json'}
                    })
                },
                send_data_doh: function(data) {
                    return $http({
                        method: 'POST',
                        url: '/api/v1/death/send_data_doh',
                        data: data,
                        headers: {'Content-Type': 'application/json'}
                    })
                },

            };
        }
})();