(function(){
    'use strict';
    angular
        .module('emrApp')
        .factory('SurgeriesSrvcs', SurgeriesSrvcs)
        SurgeriesSrvcs.$inject = ['$http'];
        function SurgeriesSrvcs($http) {
            return {
                list: function(data) {
                    return $http({
                        method: 'GET',
                        data: data,
                        url: '/api/v1/surgeries?id='+data.id+'&proccode='+data.proccode,
                        headers: {'Content-Type': 'application/json'}
                    })
                },
                store: function(data) {
                    return $http({
                        method: 'POST',
                        url: '/api/v1/surgery/store',
                        data: data,
                        headers: {'Content-Type': 'application/json'}
                    })
                }
            };
        }
})();