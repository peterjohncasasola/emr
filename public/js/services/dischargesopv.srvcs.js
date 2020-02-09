(function(){
    'use strict';
    angular
        .module('emrApp')
        .factory('DischargesOPVSrvcs', DischargesOPVSrvcs)
        DischargesOPVSrvcs.$inject = ['$http'];
        function DischargesOPVSrvcs($http) {
            return {
                list: function(data) {
                    return $http({
                        method: 'GET',
                        data: data,
                        url: '/api/v1/discharges-opv?id='+data.id+'&reportingyear='+data.reportingyear,
                        headers: {'Content-Type': 'application/json'}
                    })
                },
                store: function(data) {
                    return $http({
                        method: 'POST',
                        url: '/api/v1/discharges-opv/store',
                        data: data,
                        headers: {'Content-Type': 'application/json'}
                    })
                },
                update: function(data) {
                    return $http({
                        method: 'POST',
                        url: '/api/v1/discharges-opv/update',
                        data: data,
                        headers: {'Content-Type': 'application/json'}
                    })
                },
                send_data_doh: function(data) {
                    return $http({
                        method: 'POST',
                        url: '/api/v1/discharges-opv/send_data_doh',
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