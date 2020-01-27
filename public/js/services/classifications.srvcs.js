(function(){
    'use strict';
    angular
        .module('emrApp')
        .factory('ClassificationsSrvcs', ClassificationsSrvcs)
        ClassificationsSrvcs.$inject = ['$http'];
        function ClassificationsSrvcs($http) {
            return {
                list: function(data) {
                    return $http({
                        method: 'GET',
                        data: data,
                        url: '/api/v1/classifications?id='+data.id+'&reporting_year='+data.reporting_year,
                        headers: {'Content-Type': 'application/json'}
                    })
                },
                store: function(data) {
                    return $http({
                        method: 'POST',
                        url: '/api/v1/classification/store',
                        data: data,
                        headers: {'Content-Type': 'application/json'}
                    })
                },
                update: function(data) {
                    return $http({
                        method: 'POST',
                        url: '/api/v1/classification/update',
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