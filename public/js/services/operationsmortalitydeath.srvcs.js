(function(){
    'use strict';
    angular
        .module('emrApp')
        .factory('OperationsMortalityDeathSrvcs', OperationsMortalityDeathSrvcs)
        OperationsMortalityDeathSrvcs.$inject = ['$http', '$rootScope'];

        function OperationsMortalityDeathSrvcs($http, $rootScope) {

            return {
                list: function(data) {
                    return $http({
                        method: 'GET',
                        data: data,
                        url: '/api/v1/mortality-death?id='+data.id+'&reportingyear='+data.reportingyear+'&icd10code='+data.icd10code,
                        headers: {'Content-Type': 'application/json'}
                    })
                },
                store: function(data) {
                    return $http({
                        method: 'POST',
                        url: '/api/v1/mortality-death/store',
                        data: data,
                        headers: {'Content-Type': 'application/json'}
                    })
                },
                update: function(data) {
                    return $http({
                        method: 'POST',
                        url: '/api/v1/mortality-death/update',
                        data: data,
                        headers: {'Content-Type': 'application/json'}
                    })
                },
                remove: function(data) {
                    return $http({
                        method: 'POST',
                        url: '/api/v1/mortality-death/remove',
                        data: data,
                        headers: {'Content-Type': 'application/json'}
                    })
                },
                send_data_doh: function(data) {
                    return $http({
                        method: 'POST',
                        url: '/api/v1/mortality-death/send_data_doh',
                        data: data,
                        headers: {'Content-Type': 'application/json'}
                    })
                },

            };
        }
})();