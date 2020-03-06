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


/*Route::get('/testone/{id}', 'DistrictController@show', function ($data) {
    //print_r($data); dd();
    return view('welcome',array('list' => $data));
});*/


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::post('/userlogin', 'UserController@login');

Route::get('barcode', 'HomeController@barcode');

Route::get('/wastegenerator', 'WasteGeneratorController@index');

Route::get('/wastedisposalfacility', 'WasteDisposalFacilityController@index');

Route::get('/transporter', 'TransporterController@index');


Route::group(array('prefix'=>'admin','namespace' => 'Admin'), function() {

    Route::get('/admin', 'AdminController@index');
    Route::get('/dashboard', 'AdminController@dashboard');
    Route::get('/Waste_Generators', 'AdminController@WasteGenerator');
    Route::get('/Waste_Disposal_Facilities', 'AdminController@WasteDisposalFacilities');
    Route::get('/Vehicle_Types', 'AdminController@VehicleType');
    Route::get('/Employees', 'AdminController@Employees');
    Route::get('/Roles', 'AdminController@Roles');
    Route::get('/Industry_Types', 'AdminController@IndustryTypes');
    Route::get('/Waste_Colors', 'AdminController@WasteColors');
    Route::get('/Waste_Types', 'AdminController@WasteTypes');
    Route::get('/Country', 'AdminController@Country');
    Route::get('/State', 'AdminController@State');
    Route::get('/District', 'AdminController@District');
    Route::get('/Taluk', 'AdminController@Taluk');
    Route::get('/Panchayat', 'AdminController@Panchayat');
    Route::get('/Village', 'AdminController@Village');


});