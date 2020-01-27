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




// -- GENERAL INFO -- CLASSIFICATION //

Route::get('/general-info','ClassificationsController@index');
Route::get('/general-info/{reporting_year}','ClassificationsController@index');

Route::get('/general-info/classifications','ClassificationsController@index');
Route::get('/general-info/classifications/{reporting_year}','ClassificationsController@index');
Route::get('/general-info/classifications/{reporting_year}/details','ClassificationsController@index');

Route::get('/api/v1/classifications','ClassificationsController@show');
Route::post('/api/v1/classification/store','ClassificationsController@store');
Route::post('/api/v1/classification/update','ClassificationsController@update');


// -- SOAP -- //

Route::get('/soap','SoapController@show');
Route::get('/soap/gettable','SoapController@gettable');