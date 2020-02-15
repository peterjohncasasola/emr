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

            .state('nda', {
                url: '/nda',
                controller: 'UsersCtrl as UsersCtrl',
                templateUrl: 'nda.view'
            })

            .state('expenses', {
                url: '/expenses/:reportingyear',
                controller: 'ExpensesCtrl as expensesCtrl',
                templateUrl: 'expenses.view'
            })

            .state('expenses-details', {
                url: '/expenses/:reportingyear/details',
                controller: 'ExpensesCreateCtrl as expensesCtrl',
                templateUrl: 'expenses.view'
            })

            .state('revenues', {
                url: '/revenues/:reportingyear',
                controller: 'RevenuesCtrl as revenuesCtrl',
                templateUrl: 'revenues.view'
            })

            .state('revenues-details', {
                url: '/revenues/:reportingyear/details',
                controller: 'RevenuesCreateCtrl as revenuesCtrl',
                templateUrl: 'expenses.view'
            })

            // GENERAL INFO

            .state('general-info', {
                url: '/general-info/:reportingyear',
                controller: 'GeneralInfoCtrl as generalInfoCtrl',
                templateUrl: 'general_info.view'
            })

            .state('general-info-classification', {
                url: '/general-info/classifications/:reportingyear/details',
                controller: 'ClassificationsCreateCtrl as classificationsCtrl',
                templateUrl: 'general_info.view'
            })

            .state('general-info-bed-capacity', {
                url: '/general-info/bed-capacity/:reportingyear/details',
                controller: 'BedCapacitiesCreateCtrl as bedCapacityCtrl',
                templateUrl: 'general_info.view'
            })

            .state('general-info-quality-management', {
                url: '/general-info/quality-management/:reportingyear/details',
                controller: 'QualityManagementCreateCtrl as qualityManagementCtrl',
                templateUrl: 'general_info.view'
            })

            // HOSPITAL OPERATIONS -> SUMMARY
            .state('hospital-operations-summary-of-patients', {
                url: '/hospital-operations/summary-of-patients/:reportingyear',
                controller: 'SummaryOfPatientsCtrl as summaryOfPatientsCtrl',
                templateUrl: 'summary_of_patient.view'
            })

            .state('hospital-operations-summary-of-patients-details', {
                url: '/hospital-operations/summary-of-patients/:reportingyear/details',
                controller: 'SummaryOfPatientsCreateCtrl as summaryOfPatientsCtrl',
                templateUrl: 'summary_of_patient.view'
            })

            // HOSPITAL OPERATIONS -> HAI
            .state('hospital-operations-hai', {
                url: '/hospital-operations/hai/:reportingyear',
                controller: 'OperationsHAICtrl as operationsHAICtrl',
                templateUrl: 'operations_hai.view'
            })

            .state('hospital-operations-hai-details', {
                url: '/hospital-operations/hai/:reportingyear/details',
                controller: 'OperationsHAICreateCtrl as operationsHAICtrl',
                templateUrl: 'operations_hai.view'
            })

            // HOSPITAL OPERATIONS -> DISCHARGES -> OPV
            .state('hospital-operations-discharges-specialty', {
                url: '/hospital-operations/discharges-specialty/:reportingyear',
                controller: 'DischargesSpecialtyCtrl as dischargesSpecialtyCtrl',
                templateUrl: 'discharges_specialty.view'
            })

            .state('hospital-operations-discharges-specialty-new', {
                url: '/hospital-operations/discharges-specialty/:reportingyear/new',
                controller: 'DischargesSpecialtyCreateCtrl as dischargesSpecialtyCtrl',
                templateUrl: 'discharges_specialty.view'
            })

            .state('hospital-operations-discharges-specialty-edit', {
                url: '/hospital-operations/discharges-specialty/:reportingyear/:service_type/edit',
                controller: 'DischargesSpecialtyCreateCtrl as dischargesSpecialtyCtrl',
                templateUrl: 'discharges_specialty.view'
            })

            // HOSPITAL OPERATIONS -> DISCHARGES -> DELIVERIES
            .state('hospital-operations-discharges-number-deliveries', {
                url: '/hospital-operations/discharges-number-deliveries/:reportingyear',
                controller: 'DischargesNumberDeliveriesCtrl as dischargesNumberDeliveriesCtrl',
                templateUrl: 'discharges_number_deliveries.view'
            })

            .state('hospital-operations-discharges-number-deliveries-details', {
                url: '/hospital-operations/discharges-number-deliveries/:reportingyear/details',
                controller: 'DischargesNumberDeliveriesCreateCtrl as dischargesNumberDeliveriesCtrl',
                templateUrl: 'discharges_number_deliveries.view'
            })

            // HOSPITAL OPERATIONS -> DISCHARGES -> TESTING
            .state('hospital-operations-discharges-testing', {
                url: '/hospital-operations/discharges-testing/:reportingyear',
                controller: 'DischargesTestingCtrl as dischargesTestingCtrl',
                templateUrl: 'discharges_testing.view'
            })

            .state('hospital-operations-discharges-testing-details', {
                url: '/hospital-operations/discharges-testing/:reportingyear/details',
                controller: 'DischargesTestingCreateCtrl as dischargesTestingCtrl',
                templateUrl: 'discharges_testing.view'
            })

            // HOSPITAL OPERATIONS -> DISCHARGES -> OPV
            .state('hospital-operations-discharges-opv', {
                url: '/hospital-operations/discharges-opv/:reportingyear',
                controller: 'DischargesOPVCtrl as dischargesOPVCtrl',
                templateUrl: 'discharges_opv.view'
            })

            .state('hospital-operations-discharges-opv-details', {
                url: '/hospital-operations/discharges-opv/:reportingyear/details',
                controller: 'DischargesOPVCreateCtrl as dischargesOPVCtrl',
                templateUrl: 'discharges_opv.view'
            })

            // HOSPITAL OPERATIONS -> DISCHARGES -> EV
            .state('hospital-operations-discharges-ev', {
                url: '/hospital-operations/discharges-ev/:reportingyear',
                controller: 'DischargesEVCtrl as dischargesEVCtrl',
                templateUrl: 'discharges_ev.view'
            })

            .state('hospital-operations-discharges-ev-details', {
                url: '/hospital-operations/discharges-ev/:reportingyear/details',
                controller: 'DischargesEVCreateCtrl as dischargesEVCtrl',
                templateUrl: 'discharges_ev.view'
            })

            // HOSPITAL OPERATIONS -> DISCHARGES -> ER
            .state('hospital-operations-discharges-er', {
                url: '/hospital-operations/discharges-er/:reportingyear',
                controller: 'DischargesERCtrl as dischargesERCtrl',
                templateUrl: 'discharges_er.view'
            })

            .state('hospital-operations-discharges-er-details', {
                url: '/hospital-operations/discharges-er/:reportingyear/details',
                controller: 'DischargesERCreateCtrl as dischargesERCtrl',
                templateUrl: 'discharges_er.view'
            })

            // HOSPITAL OPERATIONS -> DISCHARGES -> OPD
            .state('hospital-operations-discharges-opd', {
                url: '/hospital-operations/discharges-opd/:reportingyear',
                controller: 'DischargesOPDCtrl as dischargesOPDCtrl',
                templateUrl: 'discharges_opd.view'
            })

            .state('hospital-operations-discharges-opd-details', {
                url: '/hospital-operations/discharges-opd/:reportingyear/details',
                controller: 'DischargesOPDCreateCtrl as dischargesOPDCtrl',
                templateUrl: 'discharges_opd.view'
            })

            // HOSPITAL OPERATIONS -> DISCHARGES -> MORBIDITY 
            .state('hospital-operations-discharges-morbidity', {
                url: '/hospital-operations/discharges-morbidity/:reportingyear',
                controller: 'DischargesMorbidityCtrl as dischargesMorbidityCtrl',
                templateUrl: 'discharges_morbidity.view'
            })

            .state('hospital-operations-discharges-morbidity-select', {
                url: '/hospital-operations/discharges-morbidity/:reportingyear/:icd10code',
                controller: 'DischargesMorbidityCtrl as dischargesMorbidityCtrl',
                templateUrl: 'discharges_morbidity.view'
            })

            .state('hospital-operations-discharges-morbidity-details', {
                url: '/hospital-operations/discharges-morbidity/:reportingyear/:icd10code/:action',
                controller: 'DischargesMorbidityCtrl as dischargesMorbidityCtrl',
                templateUrl: 'discharges_morbidity.view'
            })

            // HOSPITAL OPERATIONS -> DEATH -> OPERATIONS DEATH
            .state('hospital-operations-death', {
                url: '/hospital-operations/death/:reportingyear',
                controller: 'OperationsDeathCtrl as operationsDeathCtrl',
                templateUrl: 'operations_death.view'
            })

            .state('hospital-operations-death-details', {
                url: '/hospital-operations/death/:reportingyear/details',
                controller: 'OperationsDeathCreateCtrl as operationsDeathCtrl',
                templateUrl: 'operations_death.view'
            })
            
            // HOSPITAL OPERATIONS -> DEATH -> OPERATIONS MORTALITY DEATH
            .state('hospital-operations-mortality-death', {
                url: '/hospital-operations/mortality-death/:reportingyear',
                controller: 'OperationsMortalityDeathCtrl as operationsMortalityDeathCtrl',
                templateUrl: 'operations_mortality_death.view'
            })

            .state('hospital-operations-mortality-death-select', {
                url: '/hospital-operations/mortality-death/:reportingyear/:icd10code',
                controller: 'OperationsMortalityDeathCtrl as operationsMortalityDeathCtrl',
                templateUrl: 'operations_mortality_death.view'
            })

            .state('hospital-operations-mortality-death-details', {
                url: '/hospital-operations/mortality-death/:reportingyear/:icd10code/:action',
                controller: 'OperationsMortalityDeathCtrl as operationsMortalityDeathCtrl',
                templateUrl: 'operations_mortality_death.view'
            })

            // HOSPITAL OPERATIONS -> SURGICAL OPERATIONS -> SURGICAL MAJOR
            .state('hospital-operations-surgical-operations-major', {
                url: '/hospital-operations/surgical-operations-major/:reportingyear',
                controller: 'SurgicalOperationsMajorCtrl as surgicalOperationsMajorCtrl',
                templateUrl: 'surgical_major.view'
            })

            // HOSPITAL OPERATIONS -> SURGICAL OPERATIONS -> SURGICAL MINOR
            .state('hospital-operations-surgical-operations-minor', {
                url: '/hospital-operations/surgical-operations-minor/:reportingyear',
                controller: 'SurgicalOperationsMinorCtrl as surgicalOperationsMinorCtrl',
                templateUrl: 'surgical_minor.view'
            })

            // HOSPITAL OPERATIONS -> STAFFING PATTERN
            .state('staffing-pattern', {
                url: '/staffing-pattern/:reportingyear',
                controller: 'StaffingPatternCtrl as staffingPatternCtrl',
                templateUrl: 'staffing_pattern.view'
            })

            .state('staffing-pattern-medical-details', {
                url: '/staffing-pattern-medical/:reportingyear/details',
                controller: 'StaffingPatternMedicalCreateCtrl as staffingPatternCtrl',
                templateUrl: 'staffing_pattern.view'
            })

            .state('staffing-pattern-allied-medical-details', {
                url: '/staffing-pattern-allied-medical/:reportingyear/details',
                controller: 'StaffingPatternAlliedMedicalCreateCtrl as staffingPatternCtrl',
                templateUrl: 'staffing_pattern.view'
            })

            .state('staffing-pattern-non-medical-details', {
                url: '/staffing-pattern-non-medical/:reportingyear/details',
                controller: 'StaffingPatternNonMedicalCreateCtrl as staffingPatternCtrl',
                templateUrl: 'staffing_pattern.view'
            })

            .state('facility_profile', {
                url: '/facility-profile/:reportingyear',
                controller: 'ExpensesCtrl as expensesCtrl',
                templateUrl: 'facility_profile.view'
            })

            $urlRouterProvider.otherwise('/hospital-operations/discharges-number-deliveries/2019');
            // $urlRouterProvider.otherwise('/index');

        }

        MainCtrl.$inject = ['$window','$http', '$stateParams', '$state'];
        function MainCtrl($window, $http, $stateParams, $state) {
            var vm = this;

            vm.reportingyears = [2019, 2018, 2017, 2016, 2015, 2014, 2013, 2012, 2011, 2010];

            console.log(vm.reportingyears)
 
            vm.selectReportingYear = function(reportingyear){
                alert(reportingyear)

            }
             
            vm.routeTo = function(route){
                $window.location.href = route;
            };
        };
})();


 