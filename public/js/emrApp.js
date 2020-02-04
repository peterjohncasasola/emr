(function(){
    'use strict';
    angular
        // .module('pulsarApp',['ui.router', 'ngSanitize', 'ui.bootstrap', 'datatables', 'datatables.tabletools', 'datatables.buttons', 'datatables.bootstrap', 'dynamicNumber', 'ui.mask', 'ui.utils.masks', 'checklist-model'])
        .module('emrApp',[
          'ui.router',
          'ngSanitize',
          'dynamicNumber',
        //   'ui.mask',
          'ui.bootstrap',
          'datatables',
          // 'datatables.tabletools', 
          // 'datatables.buttons'
          // 'ui.utils.masks', 
          // 'checklist-model'
        ])
        .config(Config)
        .controller('MainCtrl', MainCtrl)

        Config.$inject = ['$stateProvider', '$urlRouterProvider', '$locationProvider', '$controllerProvider', '$compileProvider', '$filterProvider', '$provide', '$interpolateProvider', 'dynamicNumberStrategyProvider'];
        function Config($stateProvider, $urlRouterProvider, $locationProvider, $controllerProvider, $compileProvider, $filterProvider, $provide, $interpolateProvider, dynamicNumberStrategyProvider){
            console.log("App here!");
            $interpolateProvider.startSymbol('<%');
            $interpolateProvider.endSymbol('%>');
            $locationProvider.html5Mode(true);

            var main = {
                url: '/index',
                templateUrl: 'main.view'
            };

            // dynamicNumberStrategyProvider.addStrategy('price', {
            //     numInt: 12,
            //     numFract: 2,
            //     numSep: '.',
            //     numPos: true,
            //     numNeg: true,
            //     numRound: 'round',
            //     numThousand: true
            // });
            
            $stateProvider
            .state('main-view', main)

            //-- Employees --//

            // .state('expenses', {
            //     url: '/expenses',
            //     controller: 'ExpensesCtrl as expensesCtrl',
            //     templateUrl: 'expenses.view'
            // })

            .state('expenses', {
                url: '/expenses/:reporting_year',
                controller: 'ExpensesCtrl as expensesCtrl',
                templateUrl: 'expenses.view'
            })

            .state('expenses-details', {
                url: '/expenses/:reporting_year/details',
                controller: 'ExpensesCreateCtrl as expensesCtrl',
                templateUrl: 'expenses.view'
            })

            .state('revenues', {
                url: '/revenues/:reporting_year',
                controller: 'RevenuesCtrl as revenuesCtrl',
                templateUrl: 'revenues.view'
            })

            .state('revenues-details', {
                url: '/revenues/:reporting_year/details',
                controller: 'RevenuesCreateCtrl as revenuesCtrl',
                templateUrl: 'expenses.view'
            })

            // GENERAL INFO

            .state('general-info', {
                url: '/general-info/:reporting_year',
                controller: 'GeneralInfoCtrl as generalInfoCtrl',
                templateUrl: 'general_info.view'
            })

            .state('general-info-classification', {
                url: '/general-info/classifications/:reporting_year/details',
                controller: 'ClassificationsCreateCtrl as classificationsCtrl',
                templateUrl: 'general_info.view'
            })

            .state('general-info-bed-capacity', {
                url: '/general-info/bed-capacity/:reporting_year/details',
                controller: 'BedCapacitiesCreateCtrl as bedCapacityCtrl',
                templateUrl: 'general_info.view'
            })

            .state('general-info-quality-management', {
                url: '/general-info/quality-management/:reporting_year/details',
                controller: 'QualityManagementCreateCtrl as qualityManagementCtrl',
                templateUrl: 'general_info.view'
            })

            // HOSPITAL OPERATIONS -> SUMMARY
            .state('hospital-operations-summary-of-patients', {
                url: '/hospital-operations/summary-of-patients/:reporting_year',
                controller: 'SummaryOfPatientsCtrl as summaryOfPatientsCtrl',
                templateUrl: 'summary_of_patient.view'
            })

            .state('hospital-operations-summary-of-patients-details', {
                url: '/hospital-operations/summary-of-patients/:reporting_year/details',
                controller: 'SummaryOfPatientsCreateCtrl as SummaryOfPatientsCtrl',
                templateUrl: 'summary_of_patient.view'
            })

            // HOSPITAL OPERATIONS -> HAI
            .state('hospital-operations-hai', {
                url: '/hospital-operations/hai/:reporting_year',
                controller: 'OperationsHAICtrl as operationsHAICtrl',
                templateUrl: 'operations_hai.view'
            })

            .state('hospital-operations-hai-details', {
                url: '/hospital-operations/hai/:reporting_year/details',
                controller: 'OperationsHAICreateCtrl as operationsHAICtrl',
                templateUrl: 'operations_hai.view'
            })

            // HOSPITAL OPERATIONS -> DISCHARGES -> Deliveries
            .state('hospital-operations-discharges-number-deliveries', {
                url: '/hospital-operations/discharges-number-deliveries/:reporting_year',
                controller: 'DischargesNumberDeliveriesCtrl as dischargesNumberDeliveriesCtrl',
                templateUrl: 'discharges_number_deliveries.view'
            })

            .state('hospital-operations-discharges-number-deliveries-details', {
                url: '/hospital-operations/discharges-number-deliveries/:reporting_year/details',
                controller: 'DischargesNumberDeliveriesCreateCtrl as dischargesNumberDeliveriesCtrl',
                templateUrl: 'discharges_number_deliveries.view'
            })

            // HOSPITAL OPERATIONS -> DISCHARGES -> OPV
            .state('hospital-operations-discharges-opv', {
                url: '/hospital-operations/discharges-opv/:reporting_year',
                controller: 'DischargesOPVCtrl as dischargesOPVCtrl',
                templateUrl: 'discharges_opv.view'
            })

            .state('hospital-operations-discharges-opv-details', {
                url: '/hospital-operations/discharges-opv/:reporting_year/details',
                controller: 'DischargesOPVCreateCtrl as dischargesOPVCtrl',
                templateUrl: 'discharges_opv.view'
            })

            // HOSPITAL OPERATIONS -> DISCHARGES -> EV
            .state('hospital-operations-discharges-ev', {
                url: '/hospital-operations/discharges-ev/:reporting_year',
                controller: 'DischargesEVCtrl as dischargesEVCtrl',
                templateUrl: 'discharges_ev.view'
            })

            .state('hospital-operations-discharges-ev-details', {
                url: '/hospital-operations/discharges-ev/:reporting_year/details',
                controller: 'DischargesEVCreateCtrl as dischargesEVCtrl',
                templateUrl: 'discharges_ev.view'
            })

            // HOSPITAL OPERATIONS -> DISCHARGES -> ER
            .state('hospital-operations-discharges-er', {
                url: '/hospital-operations/discharges-er/:reporting_year',
                controller: 'DischargesERCtrl as dischargesERCtrl',
                templateUrl: 'discharges_er.view'
            })

            .state('hospital-operations-discharges-er-details', {
                url: '/hospital-operations/discharges-er/:reporting_year/details',
                controller: 'DischargesERCreateCtrl as dischargesERCtrl',
                templateUrl: 'discharges_er.view'
            })

            // HOSPITAL OPERATIONS -> DISCHARGES -> OPD
            .state('hospital-operations-discharges-opd', {
                url: '/hospital-operations/discharges-opd/:reporting_year',
                controller: 'DischargesOPDCtrl as dischargesOPDCtrl',
                templateUrl: 'discharges_opd.view'
            })

            .state('hospital-operations-discharges-opd-details', {
                url: '/hospital-operations/discharges-opd/:reporting_year/details',
                controller: 'DischargesOPDCreateCtrl as dischargesOPDCtrl',
                templateUrl: 'discharges_opd.view'
            })

            // HOSPITAL OPERATIONS -> DISCHARGES -> MORBIDITY 
            .state('hospital-operations-discharges-morbidity', {
                url: '/hospital-operations/discharges-morbidity/:reporting_year',
                controller: 'DischargesMorbidityCtrl as dischargesMorbidityCtrl',
                templateUrl: 'discharges_morbidity.view'
            })

            .state('hospital-operations-discharges-morbidity-select', {
                url: '/hospital-operations/discharges-morbidity/:reporting_year/:icd10code',
                controller: 'DischargesMorbidityCtrl as dischargesMorbidityCtrl',
                templateUrl: 'discharges_morbidity.view'
            })

            .state('hospital-operations-discharges-morbidity-details', {
                url: '/hospital-operations/discharges-morbidity/:reporting_year/:icd10code/:action',
                controller: 'DischargesMorbidityCtrl as dischargesMorbidityCtrl',
                templateUrl: 'discharges_morbidity.view'
            })

            // HOSPITAL OPERATIONS -> DEATH -> OPERATIONS DEATH
            .state('hospital-operations-death', {
                url: '/hospital-operations/death/:reporting_year',
                controller: 'OperationsDeathCtrl as operationsDeathCtrl',
                templateUrl: 'operations_death.view'
            })

            .state('hospital-operations-death-details', {
                url: '/hospital-operations/death/:reporting_year/details',
                controller: 'OperationsDeathCreateCtrl as operationsDeathCtrl',
                templateUrl: 'operations_death.view'
            })
            
            // HOSPITAL OPERATIONS -> DEATH -> OPERATIONS MORTALITY DEATH
            .state('hospital-operations-mortality-death', {
                url: '/hospital-operations/mortality-death/:reporting_year',
                controller: 'OperationsMortalityDeathCtrl as operationsMortalityDeathCtrl',
                templateUrl: 'operations_mortality_death.view'
            })

            .state('hospital-operations-mortality-death-select', {
                url: '/hospital-operations/mortality-death/:reporting_year/:icd10code',
                controller: 'OperationsMortalityDeathCtrl as operationsMortalityDeathCtrl',
                templateUrl: 'operations_mortality_death.view'
            })

            .state('hospital-operations-mortality-death-details', {
                url: '/hospital-operations/mortality-death/:reporting_year/:icd10code/:action',
                controller: 'OperationsMortalityDeathCtrl as operationsMortalityDeathCtrl',
                templateUrl: 'operations_mortality_death.view'
            })

            // HOSPITAL OPERATIONS -> SURGICAL OPERATIONS -> SURGICAL MAJOR
            .state('hospital-operations-surgical-operations-major', {
                url: '/hospital-operations/surgical-operations-major/:reporting_year',
                controller: 'SurgicalOperationsMajorCtrl as surgicalOperationsMajorCtrl',
                templateUrl: 'surgical_major.view'
            })

            // HOSPITAL OPERATIONS -> SURGICAL OPERATIONS -> SURGICAL MINOR
            .state('hospital-operations-surgical-operations-minor', {
                url: '/hospital-operations/surgical-operations-minor/:reporting_year',
                controller: 'SurgicalOperationsMinorCtrl as surgicalOperationsMinorCtrl',
                templateUrl: 'surgical_minor.view'
            })

            .state('facility_profile', {
                url: '/facility-profile/:reporting_year',
                controller: 'ExpensesCtrl as expensesCtrl',
                templateUrl: 'facility_profile.view'
            })

            $urlRouterProvider.otherwise('/hospital-operations/discharges-number-deliveries/2019');
            // $urlRouterProvider.otherwise('/index');

        }

        MainCtrl.$inject = ['$window','$http'];
        function MainCtrl($window, $http) {
            var vm = this;
            vm.routeTo = function(route){
                $window.location.href = route;
            };
        };
})();


 