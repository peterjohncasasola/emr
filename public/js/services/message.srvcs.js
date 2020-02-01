(function(){
    'use strict';
    angular
        .module('emrApp')
        .factory('mySharedService', function($rootScope) {
            var sharedService = {};
            
            sharedService.message = '';
        
            sharedService.prepForBroadcast = function(msg) {
                this.message = msg;
                this.broadcastItem();
            };
        
            sharedService.broadcastItem = function() {
                $rootScope.$broadcast('handleBroadcast');
            };
        
            return sharedService;
        });
        
        // .factory('mySharedService', mySharedService)


        // mySharedService.$inject = ['$http', '$rootScope'];
        // function mySharedService($http, $rootScope) {
        
        //     var sharedService = {};
            
        //     sharedService.message = '';
        
        //     sharedService.prepForBroadcast = function(msg) {
        //         this.message = msg;
        //         this.broadcastItem();
        //     };
        
        //     sharedService.broadcastItem = function() {
        //         $rootScope.$broadcast('handleBroadcast');
        //     };
        
        //     return sharedService;
        // };
        
})();


