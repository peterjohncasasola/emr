(function(){
    'use strict';
    angular
        .module('emrApp')
        .factory('RicbSrvcs', RicbSrvcs)
        RicbSrvcs.$inject = ['$http'];
        function RicbSrvcs($http) {
            return {
                list: function(data) {
                    return $http({
                        method: 'GET',
                        data: data,
                        url: '/api/v1/ricd?id='+data.id+'&icd10code='+data.icd10code,
                        headers: {'Content-Type': 'application/json'}
                    })
                },
                store: function(data) {
                    return $http({
                        method: 'POST',
                        url: '/api/v1/ricd/store',
                        data: data,
                        headers: {'Content-Type': 'application/json'}
                    })
                }
            };
        }
})();