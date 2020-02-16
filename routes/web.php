<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*
|--------------------------------------------------------------------------
| Custom Login
|--------------------------------------------------------------------------
*/
 
Auth::routes();

Route::get('/logout','LoginController@logout');
Route::post('/auth', ['uses'=>'LoginController@login', 'as'=>'auth']);
Route::group(['middleware'=>'auth'], function(){

    Route::get('get_accept_status', function () {
        return Auth::user()->is_nda_accepted;
    });

    // -- NDA -- //
    Route::get('','UsersController@index');
    Route::get('/nda/{reportingyear}','UsersController@index');
    Route::get('/eula/{reportingyear}','UsersController@index');
    Route::post('/api/v1/user/update-accept-nda-status','UsersController@accept_nda');
    Route::get('/logout','LoginController@logout');

    Route::group(['middleware' => 'App\Http\Middleware\AllowIfNdaAccepted'], function () {
    
        // -- USERS -- //
        Route::get('/users','UsersController@index');

        Route::get('/api/v1/users','UsersController@show');
        Route::post('/api/v1/user/store','UsersController@store');
        Route::post('/api/v1/user/update','UsersController@update');
        
        // -- EXPENSES -- //
        Route::get('/expenses','ExpensesController@index');
        Route::get('/expenses/{reportingyear}','ExpensesController@index');
        Route::get('/expenses/{reportingyear}/details','ExpensesController@index');
        
        Route::get('/api/v1/expenses','ExpensesController@show');
        Route::get('/api/v2/expenses','ExpensesController@show2');
        Route::get('/api/v1/expenses/{id}','ExpensesController@show');
        Route::post('/api/v1/expense/store','ExpensesController@store');
        Route::post('/api/v1/expense/update','ExpensesController@update');
        Route::post('/api/v1/expense/send_data_doh','ExpensesController@send_data_doh');//SEND TO DOH

        // -- FACILITY PROFILE -- //
        Route::get('/facility-profile','ExpensesController@index');
        Route::get('/facility-profile/{reportingyear}','ExpensesController@index');
        // Route::get('/expenses/{reportingyear}/details','ExpensesController@index');
        
        // Route::get('/api/v1/expenses','ExpensesController@show');
        // Route::get('/api/v2/expenses','ExpensesController@show2');
        // Route::get('/api/v1/expenses/{id}','ExpensesController@show');
        // Route::post('/api/v1/expense/store','ExpensesController@store');
        // Route::post('/api/v1/expense/update','ExpensesController@update');
        // Route::post('/api/v1/expense/send_data_doh','ExpensesController@send_data_doh');//SEND TO DOH
        
        // -- REVENUES -- //
        Route::get('/revenues','RevenuesController@index');
        Route::get('/revenues/{reportingyear}','RevenuesController@index');
        Route::get('/revenues/{reportingyear}/details','RevenuesController@index');
        
        Route::get('/api/v1/revenues','RevenuesController@show');
        Route::get('/api/v1/revenues/{revenue_code}','RevenuesController@show');
        Route::post('/api/v1/revenue/store','RevenuesController@store');
        Route::post('/api/v1/revenue/update','RevenuesController@update');
        Route::post('/api/v1/revenue/send_data_doh','RevenuesController@send_data_doh');//SEND TO DOH
        
        // -- GENERAL INFO -- //
        Route::get('/general-info','ClassificationsController@index');
        Route::get('/general-info/{reportingyear}','ClassificationsController@index');
        
        // -- GENERAL INFO -- CLASSIFICATION //
        Route::get('/general-info/classifications','ClassificationsController@index');
        Route::get('/general-info/classifications/{reportingyear}','ClassificationsController@index');
        Route::get('/general-info/classifications/{reportingyear}/details','ClassificationsController@index');
        
        Route::get('/api/v1/classifications','ClassificationsController@show');
        Route::post('/api/v1/classification/store','ClassificationsController@store');
        Route::post('/api/v1/classification/update','ClassificationsController@update');
        Route::post('/api/v1/classification/send_data_doh','ClassificationsController@send_data_doh');//SEND TO DOH
        
        // -- GENERAL INFO -- BED CAPACITY //
        Route::get('/general-info/bed-capacity','BedCapacitiesController@index');
        Route::get('/general-info/bed-capacity/{reportingyear}','BedCapacitiesController@index');
        Route::get('/general-info/bed-capacity/{reportingyear}/details','BedCapacitiesController@index');
        
        Route::get('/api/v1/bed-capacities','BedCapacitiesController@show');
        Route::post('/api/v1/bed-capacity/store','BedCapacitiesController@store');
        Route::post('/api/v1/bed-capacity/update','BedCapacitiesController@update');
        Route::post('/api/v1/bed-capacity/send_data_doh','BedCapacitiesController@send_data_doh');//SEND TO DOH
        
        // -- GENERAL INFO --  QUALITY MANAGEMENT //
        Route::get('/general-info/quality-management','QualityManagementController@index');
        Route::get('/general-info/quality-management/{reportingyear}','QualityManagementController@index');
        Route::get('/general-info/quality-management/{reportingyear}/details','QualityManagementController@index');
        
        Route::get('/api/v1/quality-management','QualityManagementController@show');
        Route::post('/api/v1/quality-management/store','QualityManagementController@store');
        Route::post('/api/v1/quality-management/update','QualityManagementController@update');
        Route::post('/api/v1/quality-management/remove','QualityManagementController@remove');
        Route::post('/api/v1/quality-management/send_data_doh','QualityManagementController@send_data_doh');//SEND TO DOH
        
        // -- HOSPITAL OPERATIONS -> SUMMARY OF PATIENT //
        Route::get('/hospital-operations/hai','SummaryOfPatientsController@index');
        Route::get('/hospital-operations/summary-of-patients/{reportingyear}','SummaryOfPatientsController@index');
        Route::get('/hospital-operations/summary-of-patients/{reportingyear}/details','SummaryOfPatientsController@index');
        
        Route::get('/api/v1/summary-of-patients','SummaryOfPatientsController@show');
        Route::post('/api/v1/summary-of-patient/store','SummaryOfPatientsController@store');
        Route::post('/api/v1/summary-of-patient/update','SummaryOfPatientsController@update');
        Route::post('/api/v1/summary-of-patient/send_data_doh','SummaryOfPatientsController@send_data_doh');//SEND TO DOH
        
        // -- HOSPITAL OPERATIONS -> OPERATIONS HAI //
        Route::get('/hospital-operations/hai','OperationsHAIController@index');
        Route::get('/hospital-operations/hai/{reportingyear}','OperationsHAIController@index');
        Route::get('/hospital-operations/hai/{reportingyear}/details','OperationsHAIController@index');
        
        Route::get('/api/v1/operations-hai','OperationsHAIController@show');
        Route::post('/api/v1/operations-hai/store','OperationsHAIController@store');
        Route::post('/api/v1/operations-hai/update','OperationsHAIController@update');
        Route::post('/api/v1/operations-hai/send_data_doh','OperationsHAIController@send_data_doh');//SEND TO DOH
        
        // -- HOSPITAL OPERATIONS -> DISCHARGES -> SPECIALTY //
        Route::get('/hospital-operations/discharges-specialty','DischargesSpecialtiesController@index');
        Route::get('/hospital-operations/discharges-specialty/{reportingyear}','DischargesSpecialtiesController@index');
        Route::get('/hospital-operations/discharges-specialty/{reportingyear}/details','DischargesSpecialtiesController@index');
        Route::get('/hospital-operations/discharges-specialty/{reportingyear}/new','DischargesSpecialtiesController@index');
        
        Route::get('/api/v1/discharges-specialty','DischargesSpecialtiesController@show');
        Route::get('/api/v1/discharges-specialty-others','DischargesSpecialtiesController@show_others');
        Route::post('/api/v1/discharges-specialty/store','DischargesSpecialtiesController@store');
        Route::post('/api/v1/discharges-specialty/update','DischargesSpecialtiesController@update');
        Route::post('/api/v1/discharges-specialty/remove','DischargesSpecialtiesController@remove');
        Route::post('/api/v1/discharges-specialty/send_data_doh','DischargesSpecialtiesController@send_data_doh');//SEND TO DOH
        
        
        // -- HOSPITAL OPERATIONS -> DISCHARGES -> NUMBER OF DELIVERIES //
        Route::get('/hospital-operations/discharges-number-deliveries','DischargesNumberDeliveriesController@index');
        Route::get('/hospital-operations/discharges-number-deliveries/{reportingyear}','DischargesNumberDeliveriesController@index');
        Route::get('/hospital-operations/discharges-number-deliveries/{reportingyear}/details','DischargesNumberDeliveriesController@index');
        
        Route::get('/api/v1/discharges-number-deliveries','DischargesNumberDeliveriesController@show');
        Route::post('/api/v1/discharges-number-delivery/store','DischargesNumberDeliveriesController@store');
        Route::post('/api/v1/discharges-number-delivery/update','DischargesNumberDeliveriesController@update');
        Route::post('/api/v1/discharges-number-delivery/send_data_doh','DischargesNumberDeliveriesController@send_data_doh');//SEND TO DOH
        
        
        // -- HOSPITAL OPERATIONS -> DISCHARGES -> TESTING //
        Route::get('/hospital-operations/discharges-testing','DischargesTestingController@index');
        Route::get('/hospital-operations/discharges-testing/{reportingyear}','DischargesTestingController@index');
        Route::get('/hospital-operations/discharges-testing/{reportingyear}/details','DischargesTestingController@index');
        
        Route::get('/api/v1/discharges-testing','DischargesTestingController@show');
        Route::post('/api/v1/discharges-testing/store','DischargesTestingController@store');
        Route::post('/api/v1/discharges-testing/update','DischargesTestingController@update');
        Route::post('/api/v1/discharges-testing/send_data_doh','DischargesTestingController@send_data_doh');//SEND TO DOH
        
        // -- HOSPITAL OPERATIONS -> DISCHARGES -> OPV //
        Route::get('/hospital-operations/discharges-opv','DischargesOPVController@index');
        Route::get('/hospital-operations/discharges-opv/{reportingyear}','DischargesOPVController@index');
        Route::get('/hospital-operations/discharges-opv/{reportingyear}/details','DischargesOPVController@index');
        
        Route::get('/api/v1/discharges-opv','DischargesOPVController@show');
        Route::post('/api/v1/discharges-opv/store','DischargesOPVController@store');
        Route::post('/api/v1/discharges-opv/update','DischargesOPVController@update');
        Route::post('/api/v1/discharges-opv/send_data_doh','DischargesOPVController@send_data_doh');//SEND TO DOH
        
        // -- HOSPITAL OPERATIONS -> DISCHARGES -> EV //
        Route::get('/hospital-operations/discharges-ev','DischargesEVController@index');
        Route::get('/hospital-operations/discharges-ev/{reportingyear}','DischargesEVController@index');
        Route::get('/hospital-operations/discharges-ev/{reportingyear}/details','DischargesEVController@index');
        
        Route::get('/api/v1/discharges-ev','DischargesEVController@show');
        Route::post('/api/v1/discharges-ev/store','DischargesEVController@store');
        Route::post('/api/v1/discharges-ev/update','DischargesEVController@update');
        Route::post('/api/v1/discharges-ev/send_data_doh','DischargesEVController@send_data_doh');//SEND TO DOH
        
        // -- HOSPITAL OPERATIONS -> DISCHARGES -> ER //
        Route::get('/hospital-operations/discharges-er','DischargesERController@index');
        Route::get('/hospital-operations/discharges-er/{reportingyear}','DischargesERController@index');
        Route::get('/hospital-operations/discharges-er/{reportingyear}/details','DischargesERController@index');
        
        Route::get('/api/v1/discharges-er','DischargesERController@show');
        Route::post('/api/v1/discharges-er/store','DischargesERController@store');
        // Route::post('/api/v1/discharges-er/update','DischargesERController@update');
        Route::post('/api/v1/discharges-er/remove','DischargesERController@remove');
        Route::post('/api/v1/discharges-er/send_data_doh','DischargesERController@send_data_doh');//SEND TO DOH
        
        // -- HOSPITAL OPERATIONS -> DISCHARGES -> OPD //
        Route::get('/hospital-operations/discharges-opd','DischargesOPDController@index');
        Route::get('/hospital-operations/discharges-opd/{reportingyear}','DischargesOPDController@index');
        Route::get('/hospital-operations/discharges-opd/{reportingyear}/details','DischargesOPDController@index');
        
        Route::get('/api/v1/discharges-opd','DischargesOPDController@show');
        Route::post('/api/v1/discharges-opd/store','DischargesOPDController@store');
        // Route::post('/api/v1/discharges-opd/update','DischargesOPDController@update');
        Route::post('/api/v1/discharges-opd/remove','DischargesOPDController@remove');
        Route::post('/api/v1/discharges-opd/send_data_doh','DischargesOPDController@send_data_doh');//SEND TO DOH
        
        // -- HOSPITAL OPERATIONS -> DISCHARGES -> MORBIDITY //
        Route::get('/hospital-operations/discharges-morbidity','DischargesMorbidityController@index');
        Route::get('/hospital-operations/discharges-morbidity/{reportingyear}','DischargesMorbidityController@index');
        Route::get('/hospital-operations/discharges-morbidity/{reportingyear}/{icd_code}','DischargesMorbidityController@index');
        Route::get('/hospital-operations/discharges-morbidity/{reportingyear}/{icd_code}/{action}','DischargesMorbidityController@index');
        Route::get('/hospital-operations/discharges-morbidity/{reportingyear}/details','DischargesMorbidityController@index');
        
        Route::get('/api/v1/discharges-morbidity','DischargesMorbidityController@show');
        Route::post('/api/v1/discharges-morbidity/store','DischargesMorbidityController@store');
        Route::post('/api/v1/discharges-morbidity/update','DischargesMorbidityController@update');
        Route::post('/api/v1/discharges-morbidity/remove','DischargesMorbidityController@remove');
        Route::post('/api/v1/discharges-morbidity/send_data_doh','DischargesMorbidityController@send_data_doh');//SEND TO DOH
        
        // -- HOSPITAL OPERATIONS -> DEATH -> OPERATIONS DEATH //
        Route::get('/hospital-operations/death','OperationsDeathsController@index');
        Route::get('/hospital-operations/death/{reportingyear}','OperationsDeathsController@index');
        Route::get('/hospital-operations/death/{reportingyear}/details','OperationsDeathsController@index');
        
        Route::get('/api/v1/death','OperationsDeathsController@show');
        Route::post('/api/v1/death/store','OperationsDeathsController@store');
        Route::post('/api/v1/death/update','OperationsDeathsController@update');
        Route::post('/api/v1/death/remove','OperationsDeathsController@remove');
        Route::post('/api/v1/death/send_data_doh','OperationsDeathsController@send_data_doh');//SEND TO DOH
        
        // -- HOSPITAL OPERATIONS -> DEATH -> OPERATIONS MORTALITY DEATH //
        Route::get('/hospital-operations/mortality-death','OperationsMortalityDeathsController@index');
        Route::get('/hospital-operations/mortality-death/{reportingyear}','OperationsMortalityDeathsController@index');
        Route::get('/hospital-operations/mortality-death/{reportingyear}/{icd_code}','OperationsMortalityDeathsController@index');
        Route::get('/hospital-operations/mortality-death/{reportingyear}/{icd_code}/{action}','OperationsMortalityDeathsController@index');
        Route::get('/hospital-operations/mortality-death/{reportingyear}/details','OperationsMortalityDeathsController@index');
        
        Route::get('/api/v1/mortality-death','OperationsMortalityDeathsController@show');
        Route::post('/api/v1/mortality-death/store','OperationsMortalityDeathsController@store');
        Route::post('/api/v1/mortality-death/update','OperationsMortalityDeathsController@update');
        Route::post('/api/v1/mortality-death/remove','OperationsMortalityDeathsController@remove');
        Route::post('/api/v1/mortality-death/send_data_doh','OperationsMortalityDeathsController@send_data_doh');//SEND TO DOH
        
        // -- HOSPITAL OPERATIONS -> SURGICAL OPERATIONS -> MAJOR OPERATIONS //
        Route::get('/hospital-operations/surgical-operations-major','SurgicalOperationsMajorController@index');
        Route::get('/hospital-operations/surgical-operations-major/{reportingyear}','SurgicalOperationsMajorController@index');
        Route::get('/hospital-operations/surgical-operations-major/{reportingyear}/{index}','SurgicalOperationsMajorController@index');
        
        Route::get('/api/v1/surgical-operations-major','SurgicalOperationsMajorController@show');
        Route::post('/api/v1/surgical-operation-major/store','SurgicalOperationsMajorController@store');
        // Route::post('/api/v1/surgical-operation-major/update','SurgicalOperationsMajorController@update');
        Route::post('/api/v1/surgical-operation-major/remove','SurgicalOperationsMajorController@remove');
        Route::post('/api/v1/surgical-operation-major/send_data_doh','SurgicalOperationsMajorController@send_data_doh');//SEND TO DOH
        
        // -- HOSPITAL OPERATIONS -> SURGICAL OPERATIONS -> MINOR OPERATIONS //
        Route::get('/hospital-operations/surgical-operations-minor','SurgicalOperationsMinorController@index');
        Route::get('/hospital-operations/surgical-operations-minor/{reportingyear}','SurgicalOperationsMinorController@index');
        Route::get('/hospital-operations/surgical-operations-minor/{reportingyear}/{index}','SurgicalOperationsMinorController@index');
        
        Route::get('/api/v1/surgical-operations-minor','SurgicalOperationsMinorController@show');
        Route::post('/api/v1/surgical-operation-minor/store','SurgicalOperationsMinorController@store');
        // Route::post('/api/v1/surgical-operation-minor/update','SurgicalOperationsMinorController@update');
        Route::post('/api/v1/surgical-operation-minor/remove','SurgicalOperationsMinorController@remove');
        Route::post('/api/v1/surgical-operation-minor/send_data_doh','SurgicalOperationsMinorController@send_data_doh');//SEND TO DOH
        
        
        // --STAFFING PATTERN //
        Route::get('/staffing-pattern','StaffingPatternController@index');
        Route::get('/staffing-pattern/{reportingyear}','StaffingPatternController@index');
        Route::get('/staffing-pattern/{reportingyear}/{index}','StaffingPatternController@index');
        Route::get('/staffing-pattern-medical/{reportingyear}/{index}','StaffingPatternController@index');
        Route::get('/staffing-pattern-allied-medical/{reportingyear}/{index}','StaffingPatternController@index');
        Route::get('/staffing-pattern-non-medical/{reportingyear}/{index}','StaffingPatternController@index');
        
        Route::get('/api/v1/staffing-pattern','StaffingPatternController@show');
        Route::get('/api/v1/staffing-pattern-others','StaffingPatternController@show_others');
        Route::post('/api/v1/staffing-pattern/store','StaffingPatternController@store');
        Route::post('/api/v1/staffing-pattern/store-others','StaffingPatternController@store_others');
        Route::post('/api/v1/staffing-pattern/update','StaffingPatternController@update');
        Route::post('/api/v1/staffing-pattern/update-others','StaffingPatternController@update_others');
        Route::post('/api/v1/staffing-pattern/remove','StaffingPatternController@remove');
        Route::post('/api/v1/staffing-pattern/send_data_doh','StaffingPatternController@send_data_doh');//SEND TO DOH

        // -- SUBMITTED REPORTS -- //
        Route::get('/submitted-reports','SubmittedReportsController@index');
        Route::get('/submitted-report/{reportingyear}','SubmittedReportsController@index');
        Route::get('/submitted-report/{reportingyear}/details','SubmittedReportsController@index');
        
        Route::get('/api/v1/submitted-reports','SubmittedReportsController@show');
        Route::get('/api/v1/submitted-report/{id}','SubmittedReportsController@show');
        Route::post('/api/v1/submitted-report/store','SubmittedReportsController@store');
        Route::post('/api/v1/submitted-report/update','SubmittedReportsController@update');
        Route::post('/api/v1/submitted-report/send_data_doh','SubmittedReportsController@send_data_doh');//SEND TO DOH
        
        
        // LIBRARIES //
        Route::get('/api/v1/surgeries','SurgeriesController@show');
        Route::post('/api/v1/surgery/store','SurgeriesController@store');
        
        Route::get('/api/v1/ricd','RicdController@show');
        Route::get('/api/v1/ricd2','RicdController@show2');
        Route::get('/api/v1/ricd3','RicdController@show3');
        Route::post('/api/v1/ricd/store','RicdController@store');
        
        // -- SOAP -- //
        Route::get('/soap','SoapController@show');
        Route::get('/soap/gettable','SoapController@gettable');
        Route::get('/soap/gettable2','SoapController@gettable2');
        
        Route::get('/sample','ExpensesController@sample');
    
    });
});
