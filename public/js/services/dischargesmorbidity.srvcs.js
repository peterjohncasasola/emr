(function(){
    'use strict';
    angular
        .module('emrApp')
        .factory('DischargesMorbiditySrvcs', DischargesMorbiditySrvcs)
        DischargesMorbiditySrvcs.$inject = ['$http', '$rootScope'];

        function DischargesMorbiditySrvcs($http, $rootScope) {

            return {
                list: function(data) {
                    return $http({
                        method: 'GET',
                        data: data,
                        url: '/api/v1/discharges-morbidity?id='+data.id+'&reportingyear='+data.reporting_year+'&icd10code='+data.icd10code,
                        headers: {'Content-Type': 'application/json'}
                    })
                },
                store: function(data) {
                    return $http({
                        method: 'POST',
                        url: '/api/v1/discharges-morbidity/store',
                        data: data,
                        headers: {'Content-Type': 'application/json'}
                    })
                },
                update: function(data) {
                    return $http({
                        method: 'POST',
                        url: '/api/v1/discharges-morbidity/update',
                        data: data,
                        headers: {'Content-Type': 'application/json'}
                    })
                },
                remove: function(data) {
                    return $http({
                        method: 'POST',
                        url: '/api/v1/discharges-morbidity/remove',
                        data: data,
                        headers: {'Content-Type': 'application/json'}
                    })
                },
                send_data_doh: function(data) {
                    return $http({
                        method: 'GET',
                        url: '/api/v1/discharges-morbidity/send_data_doh',
                        data: data,
                        headers: {'Content-Type': 'application/json'}
                    })
                },

            };
        }
})();