<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

/*Route::post('user', 'UserController@store'); //api through registration
Route::post('signin', 'UserController@signin');

Route::middleware('auth:api')->get('user', 'UserController@index');
Route::middleware('auth:api')->post('user', 'UserController@update');
//Route::get('user/{id}', 'UserController@show');
Route::delete('user/{id}', 'UserController@delete');

Route::get('state', 'StateController@index');
Route::get('state/{id}', 'StateController@show');
Route::post('state', 'StateController@store');
Route::post('state/{id}', 'StateController@update');
Route::delete('state/{id}', 'StateController@delete');

Route::get('district', 'DistrictController@index');
Route::get('district/{id}', 'DistrictController@show');
Route::post('district', 'DistrictController@store');
Route::post('district/{id}', 'DistrictController@update');
Route::delete('district/{id}', 'DistrictController@delete');

Route::get('taluka', 'TalukaController@index');
Route::get('taluka/{id}', 'TalukaController@show');
Route::post('taluka', 'TalukaController@store');
Route::post('taluka/{id}', 'TalukaController@update');
Route::delete('taluka/{id}', 'TalukaController@delete');

Route::get('panchaytee', 'PanchayteeController@index');
Route::get('panchaytee/{id}', 'PanchayteeController@show');
Route::post('panchaytee', 'PanchayteeController@store');
Route::post('panchaytee/{id}', 'PanchayteeController@update');
Route::delete('panchaytee/{id}', 'PanchayteeController@delete');

Route::get('village', 'VillageController@index');
Route::get('village/{id}', 'VillageController@show');
Route::post('village', 'VillageController@store');
Route::post('village/{id}', 'VillageController@update');
Route::delete('village/{id}', 'VillageController@delete');

Route::get('roles', 'RoleController@index');
Route::get('role/{id}', 'RoleController@show');
Route::post('role', 'RoleController@store');
Route::post('role/{id}', 'RoleController@update');
Route::delete('role/{id}', 'RoleController@delete');

Route::get('organizations', 'OrganizationController@index');
Route::get('organization/{id}', 'OrganizationController@show');
Route::post('organization', 'OrganizationController@store');
Route::post('organization/{id}', 'OrganizationController@update');
Route::delete('organization/{id}', 'OrganizationController@delete');*/

/*Route::get('address', 'AddressController@index');
Route::get('address/{id}', 'AddressController@show');
Route::post('address', 'AddressController@store');
Route::post('address/{id}', 'AddressController@update');
Route::delete('address/{id}', 'AddressController@delete');*/





Route::get('role', 'RoleController@index');
Route::get('role/{id}', 'RoleController@show');
Route::post('role', 'RoleController@store');
Route::put('role/{id}', 'RoleController@update');
Route::delete('role/{id}', 'RoleController@delete');

Route::get('operations', 'OperationsController@index');
Route::get('operations/{id}', 'OperationsController@show');
Route::post('operations', 'OperationsController@store');
Route::put('operations/{id}', 'OperationsController@update');
Route::delete('operations/{id}', 'OperationsController@delete');

Route::get('features', 'FeaturesController@index');
Route::get('features/{id}', 'FeaturesController@show');
Route::post('features', 'FeaturesController@store');
Route::put('features/{id}', 'FeaturesController@update');
Route::delete('features/{id}', 'FeaturesController@delete');

Route::get('featureoperations', 'FeatureoperationsController@index');
//Route::get('featureoperations/{id}', 'FeatureoperationsController@show');
Route::post('featureoperations', 'FeatureoperationsController@store');
Route::put('featureoperations/{fid}/{oid}', 'FeatureoperationsController@update');
Route::delete('featureoperations/{fid}/{oid}', 'FeatureoperationsController@delete');

Route::get('rolefeature', 'RolefeaturesController@index');
//Route::get('rolefeature/{id}', 'RolefeaturesController@show');
Route::post('rolefeature', 'RolefeaturesController@store');
Route::put('rolefeature/{rid}/{fid}/{oid}', 'RolefeaturesController@update'); //nt
Route::delete('rolefeature/{rid}/{fid}/{oid}', 'RolefeaturesController@delete'); //nt

/* USERS TBL */
Route::post('user', 'UserController@store'); //api through registration
Route::post('signin', 'UserController@signin');
Route::middleware('auth:api')->post('transporterroute', 'TransporterController@transporterroute');
Route::middleware('auth:api')->post('wastepickups', 'TransporterController@wastepickups');

//Route::get('driverassignment', 'TransporterController@driverassignment');
//Route::post('loginaccess', 'UserController@loginaccess');