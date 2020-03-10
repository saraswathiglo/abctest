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
    //return view('welcome');
    return redirect('/login');
});
Route::get('/leaflet', function () {
    return view('leaflet');
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
    Route::get('/WasteGenerators', 'AdminController@WasteGenerator');
    Route::get('/WasteDisposalFacilities', 'AdminController@WasteDisposalFacilities');
    Route::get('/VehicleTypes', 'AdminController@VehicleType');
    Route::get('/Employees', 'AdminController@Employees');
    Route::get('/Roles', 'AdminController@Roles');
    Route::get('/IndustryTypes', 'AdminController@IndustryTypes');
    Route::get('/addindustrytype', 'AdminController@addindustrytype');
    Route::get('/WasteColors', 'AdminController@WasteColors');
    Route::get('/addwastecolor', 'AdminController@addwastecolor');
    Route::get('/WasteTypes', 'AdminController@WasteTypes');
    Route::get('/addwastetype', 'AdminController@addwastetype');
    Route::get('/Country', 'AdminController@Country');
    Route::get('/State', 'AdminController@State');
    Route::get('/District', 'AdminController@District');
    Route::get('/Taluk', 'AdminController@Taluk');
    Route::get('/Panchayat', 'AdminController@Panchayat');
    Route::get('/Village', 'AdminController@Village');
    Route::get('/addindustry', 'AdminController@addindustry');
    Route::get('/Roles', 'AdminController@roles');
    Route::get('/addroles', 'AdminController@addroles');
    Route::get('/addrecycleplant', 'AdminController@addrecycleplant');
    Route::get('/addvehicletype', 'AdminController@addvehicletype');
    Route::get('/addemployee', 'AdminController@addroles');
    Route::get('/settings', 'AdminController@settings');
    Route::get('/RouteManagement', 'AdminController@routemanagement');
    Route::get('/addroute', 'AdminController@addroute');

});



Route::get('/addindustrybranch', 'Admin\AdminController@addindustrybranch');
Route::get('/addrecycleplantbranch', 'Admin\AdminController@addrecycleplantbranch');
Route::get('/adduser', 'Admin\AdminController@adduser');

Route::get('/industrybranches', 'Admin\AdminController@industrybranches');
Route::get('/recycleplantbranches', 'Admin\AdminController@recycleplantbranches');
Route::get('/userslist', 'Admin\AdminController@userslist');

Route::get('locale/{locale}', function ($locale){
    Session::put('locale', $locale);
    return redirect()->back();
});

Route::match(['get', 'post'], '/botman', 'BotManController@handle');