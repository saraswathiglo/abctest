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

Route::post('user', 'UserController@store'); //api through registration
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
Route::delete('organization/{id}', 'OrganizationController@delete');

/*Route::get('address', 'AddressController@index');
Route::get('address/{id}', 'AddressController@show');
Route::post('address', 'AddressController@store');
Route::post('address/{id}', 'AddressController@update');
Route::delete('address/{id}', 'AddressController@delete');*/

