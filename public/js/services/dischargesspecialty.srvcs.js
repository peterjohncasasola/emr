(function(){
    'use strict';
    angular
        .module('emrApp')
        .factory('DischargesSpecialtySrvcs', DischargesSpecialtySrvcs)
        DischargesSpecialtySrvcs.$inject = ['$http'];
        function DischargesSpecialtySrvcs($http) {
            return {
                list: function(data) {
                    return $http({
                        method: 'GET',
                        data: data,
                        url: '/api/v1/discharges-specialty?id='+data.id+'&reportingyear='+data.reportingyear,
                        headers: {'Content-Type': 'application/json'}
                    })
                },
                store: function(data) {
                    return $http({
                        method: 'POST',
                        url: '/api/v1/discharges-specialty/store',
                        data: data,
                        headers: {'Content-Type': 'application/json'}
                    })
                },
                update: function(data) {
                    return $http({
                        method: 'POST',
                        url: '/api/v1/discharges-specialty/update',
                        data: data,
                        headers: {'Content-Type': 'application/json'}
                    })
                },
                remove: function(data) {
                    return $http({
                        method: 'POST',
                        url: '/api/v1/discharges-specialty/remove',
                        data: data,
                        headers: {'Content-Type': 'application/json'}
                    })
                },

                list_others: function(data) {
                    return $http({
                        method: 'GET',
                        data: data,
                        url: '/api/v1/discharges-specialty-others?id='+data.id+'&reportingyear='+data.reportingyear,
                        headers: {'Content-Type': 'application/json'}
                    })
                },
                send_data_doh: function(data) {
                    return $http({
                        method: 'POST',
                        url: '/api/v1/discharges-specialty/send_data_doh',
                        data: data,
                        headers: {'Content-Type': 'application/json'}
                    })
                },
                

            };
        }
})();