(function(){
    'use strict';
    angular
        .module('emrApp')
        .factory('UsersSrvcs', UsersSrvcs)
        UsersSrvcs.$inject = ['$http'];
        function UsersSrvcs($http) {
            return {
                list: function(data) {
                    return $http({
                        method: 'GET',
                        data: data,
                        url: '/api/v1/users?id='+data.id+'&reportingyear='+data.reportingyear,
                        headers: {'Content-Type': 'application/json'}
                    })
                },
                store: function(data) {
                    return $http({
                        method: 'POST',
                        url: '/api/v1/user/store',
                        data: data,
                        headers: {'Content-Type': 'application/json'}
                    })
                },
                update: function(data) {
                    return $http({
                        method: 'POST',
                        url: '/api/v1/user/update',
                        data: data,
                        headers: {'Content-Type': 'application/json'}
                    })
                },
                update_accept_nda_status: function(data) {
                    return $http({
                        method: 'POST',
                        url: '/api/v1/user/update-accept-nda-status',
                        data: data,
                        headers: {'Content-Type': 'application/json'}
                    })
                }
            };
        }
})();