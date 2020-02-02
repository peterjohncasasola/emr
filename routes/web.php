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

Route::get('/', function () {
    return view('welcome');
});


Route::get('/revenues','ExpensesController@index');

// -- EXPENSES -- //

Route::get('/expenses','ExpensesController@index');
Route::get('/expenses/{reporting_year}','ExpensesController@index');
Route::get('/expenses/{reporting_year}/details','ExpensesController@index');

Route::get('/api/v1/expenses','ExpensesController@show');
Route::get('/api/v1/expenses/{id}','ExpensesController@show');
Route::post('/api/v1/expense/store','ExpensesController@store');
Route::post('/api/v1/expense/update','ExpensesController@update');

//SEND TO DOH
Route::get('/api/v1/expense/send_data_doh','ExpensesController@send_data_doh');

// -- REVENUES -- //

Route::get('/revenues','RevenuesController@index');
Route::get('/revenues/{reporting_year}','RevenuesController@index');
Route::get('/revenues/{reporting_year}/details','RevenuesController@index');

Route::get('/api/v1/revenues','RevenuesController@show');
Route::get('/api/v1/revenues/{revenue_code}','RevenuesController@show');
Route::post('/api/v1/revenue/store','RevenuesController@store');
Route::post('/api/v1/revenue/update','RevenuesController@update');

//SEND TO DOH
Route::get('/api/v1/revenue/send_data_doh','RevenuesController@send_data_doh');


// -- BED CAPACITIES -- //

// Route::get('/bed-capacities','BedCapacitiesController@index');
// Route::get('/bed-capacities/{reporting_year}','BedCapacitiesController@index');
// Route::get('/bed-capacities/{reporting_year}/details','BedCapacitiesController@index');

// Route::get('/api/v1/bed-capacities','BedCapacitiesController@show');
// Route::get('/api/v1/bed-capacities/{bed_capacity_code}','BedCapacitiesController@show');
// Route::post('/api/v1/bed-capacity/store','BedCapacitiesController@store');
// Route::post('/api/v1/bed-capacity/update','BedCapacitiesController@update');


// -- GENERAL INFO -- //

Route::get('/general-info','ClassificationsController@index');
Route::get('/general-info/{reporting_year}','ClassificationsController@index');


// -- GENERAL INFO -- CLASSIFICATION //

Route::get('/general-info/classifications','ClassificationsController@index');
Route::get('/general-info/classifications/{reporting_year}','ClassificationsController@index');
Route::get('/general-info/classifications/{reporting_year}/details','ClassificationsController@index');

Route::get('/api/v1/classifications','ClassificationsController@show');
Route::post('/api/v1/classification/store','ClassificationsController@store');
Route::post('/api/v1/classification/update','ClassificationsController@update');
//SEND TO DOH
Route::get('/api/v1/classification/send_data_doh','ClassificationsController@send_data_doh');

// -- GENERAL INFO -- BED CAPACITY //

Route::get('/general-info/bed-capacity','BedCapacitiesController@index');
Route::get('/general-info/bed-capacity/{reporting_year}','BedCapacitiesController@index');
Route::get('/general-info/bed-capacity/{reporting_year}/details','BedCapacitiesController@index');

Route::get('/api/v1/bed-capacities','BedCapacitiesController@show');
Route::post('/api/v1/bed-capacity/store','BedCapacitiesController@store');
Route::post('/api/v1/bed-capacity/update','BedCapacitiesController@update');
//SEND TO DOH
Route::get('/api/v1/bed-capacity/send_data_doh','BedCapacitiesController@send_data_doh');

// -- GENERAL INFO --  QUALITY MANAGEMENT //

Route::get('/general-info/quality-management','QualityManagementController@index');
Route::get('/general-info/quality-management/{reporting_year}','QualityManagementController@index');
Route::get('/general-info/quality-management/{reporting_year}/details','QualityManagementController@index');

Route::get('/api/v1/quality-management','QualityManagementController@show');
Route::post('/api/v1/quality-management/store','QualityManagementController@store');
Route::post('/api/v1/quality-management/update','QualityManagementController@update');
//SEND TO DOH
Route::get('/api/v1/quality-management/send_data_doh','QualityManagementController@send_data_doh');


// -- HOSPITAL OPERATIONS -> SUMMARY OF PATIENT //
Route::get('/hospital-operations/hai','SummaryOfPatientsController@index');
Route::get('/hospital-operations/summary-of-patients/{reporting_year}','SummaryOfPatientsController@index');
Route::get('/hospital-operations/summary-of-patients/{reporting_year}/details','SummaryOfPatientsController@index');

Route::get('/api/v1/summary-of-patients','SummaryOfPatientsController@show');
Route::post('/api/v1/summary-of-patient/store','SummaryOfPatientsController@store');
Route::post('/api/v1/summary-of-patient/update','SummaryOfPatientsController@update');
Route::get('/api/v1/summary-of-patient/send_data_doh','SummaryOfPatientsController@send_data_doh');//SEND TO DOH

// -- HOSPITAL OPERATIONS -> OPERATIONS HAI //
Route::get('/hospital-operations/hai','OperationsHAIController@index');
Route::get('/hospital-operations/hai/{reporting_year}','OperationsHAIController@index');
Route::get('/hospital-operations/hai/{reporting_year}/details','OperationsHAIController@index');

Route::get('/api/v1/operations-hai','OperationsHAIController@show');
Route::post('/api/v1/operations-hai/store','OperationsHAIController@store');
Route::post('/api/v1/operations-hai/update','OperationsHAIController@update');
Route::get('/api/v1/operations-hai/send_data_doh','OperationsHAIController@send_data_doh');//SEND TO DOH

// -- HOSPITAL OPERATIONS -> DISCHARGES -> NUMBER OF DELIVERIES //
Route::get('/hospital-operations/discharges-number-deliveries','DischargesNumberDeliveriesController@index');
Route::get('/hospital-operations/discharges-number-deliveries/{reporting_year}','DischargesNumberDeliveriesController@index');
Route::get('/hospital-operations/discharges-number-deliveries/{reporting_year}/details','DischargesNumberDeliveriesController@index');

Route::get('/api/v1/discharges-number-deliveries','DischargesNumberDeliveriesController@show');
Route::post('/api/v1/discharges-number-delivery/store','DischargesNumberDeliveriesController@store');
Route::post('/api/v1/discharges-number-delivery/update','DischargesNumberDeliveriesController@update');
Route::get('/api/v1/discharges-number-delivery/send_data_doh','DischargesNumberDeliveriesController@send_data_doh');//SEND TO DOH

// -- HOSPITAL OPERATIONS -> DISCHARGES -> OPV //
Route::get('/hospital-operations/discharges-opv','DischargesOPVController@index');
Route::get('/hospital-operations/discharges-opv/{reporting_year}','DischargesOPVController@index');
Route::get('/hospital-operations/discharges-opv/{reporting_year}/details','DischargesOPVController@index');

Route::get('/api/v1/discharges-opv','DischargesOPVController@show');
Route::post('/api/v1/discharges-opv/store','DischargesOPVController@store');
Route::post('/api/v1/discharges-opv/update','DischargesOPVController@update');
Route::get('/api/v1/discharges-opv/send_data_doh','DischargesOPVController@send_data_doh');//SEND TO DOH

// -- HOSPITAL OPERATIONS -> DISCHARGES -> EV //
Route::get('/hospital-operations/discharges-ev','DischargesEVController@index');
Route::get('/hospital-operations/discharges-ev/{reporting_year}','DischargesEVController@index');
Route::get('/hospital-operations/discharges-ev/{reporting_year}/details','DischargesEVController@index');

Route::get('/api/v1/discharges-ev','DischargesEVController@show');
Route::post('/api/v1/discharges-ev/store','DischargesEVController@store');
Route::post('/api/v1/discharges-ev/update','DischargesEVController@update');
Route::get('/api/v1/discharges-ev/send_data_doh','DischargesEVController@send_data_doh');//SEND TO DOH

// -- HOSPITAL OPERATIONS -> DISCHARGES -> ER //
Route::get('/hospital-operations/discharges-er','DischargesERController@index');
Route::get('/hospital-operations/discharges-er/{reporting_year}','DischargesERController@index');
Route::get('/hospital-operations/discharges-er/{reporting_year}/details','DischargesERController@index');

Route::get('/api/v1/discharges-er','DischargesERController@show');
Route::post('/api/v1/discharges-er/store','DischargesERController@store');
Route::post('/api/v1/discharges-er/update','DischargesERController@update');
Route::get('/api/v1/discharges-er/send_data_doh','DischargesERController@send_data_doh');//SEND TO DOH

// -- HOSPITAL OPERATIONS -> DISCHARGES -> ER //
Route::get('/hospital-operations/discharges-opd','DischargesOPDController@index');
Route::get('/hospital-operations/discharges-opd/{reporting_year}','DischargesOPDController@index');
Route::get('/hospital-operations/discharges-opd/{reporting_year}/details','DischargesOPDController@index');

Route::get('/api/v1/discharges-opd','DischargesOPDController@show');
Route::post('/api/v1/discharges-opd/store','DischargesOPDController@store');
Route::post('/api/v1/discharges-opd/update','DischargesOPDController@update');
Route::get('/api/v1/discharges-opd/send_data_doh','DischargesOPDController@send_data_doh');//SEND TO DOH

// -- HOSPITAL OPERATIONS -> SURGICAL OPERATIONS -> MAJOR OPERATIONS //
Route::get('/hospital-operations/surgical-operations-major','SurgicalOperationsMajorController@index');
Route::get('/hospital-operations/surgical-operations-major/{reporting_year}','SurgicalOperationsMajorController@index');
Route::get('/hospital-operations/surgical-operations-major/{reporting_year}/{index}','SurgicalOperationsMajorController@index');

Route::get('/api/v1/surgical-operations-major','SurgicalOperationsMajorController@show');
Route::post('/api/v1/surgical-operation-major/store','SurgicalOperationsMajorController@store');
Route::post('/api/v1/surgical-operation-major/update','SurgicalOperationsMajorController@update');
Route::get('/api/v1/surgical-operation-major/send_data_doh','SurgicalOperationsMajorController@send_data_doh');//SEND TO DOH

// -- HOSPITAL OPERATIONS -> SURGICAL OPERATIONS -> MINOR OPERATIONS //
Route::get('/hospital-operations/surgical-operations-minor','SurgicalOperationsMinorController@index');
Route::get('/hospital-operations/surgical-operations-minor/{reporting_year}','SurgicalOperationsMinorController@index');
Route::get('/hospital-operations/surgical-operations-minor/{reporting_year}/{index}','SurgicalOperationsMinorController@index');

Route::get('/api/v1/surgical-operations-minor','SurgicalOperationsMinorController@show');
Route::post('/api/v1/surgical-operation-minor/store','SurgicalOperationsMinorController@store');
Route::post('/api/v1/surgical-operation-minor/update','SurgicalOperationsMinorController@update');
Route::get('/api/v1/surgical-operation-minor/send_data_doh','SurgicalOperationsMinorController@send_data_doh');//SEND TO DOH

// LIBRARIES //
Route::get('/api/v1/surgeries','SurgeriesController@show');
Route::post('/api/v1/surgery/store','SurgeriesController@store');

Route::get('/api/v1/ricd','RicdController@show');
Route::post('/api/v1/ricd/store','RicdController@store');



// -- SOAP -- //

Route::get('/soap','SoapController@show');
Route::get('/soap/gettable','SoapController@gettable');

Route::get('/icd','DischargesERController@geticd');


