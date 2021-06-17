<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

// HTTP Status Code:

// 200 : OK -> successful transaction | updated
// 201 : Created -> post (data inserted)
// 202 : Accepted -> soft delete
// 400 : Bad request -> syntax error from client, size too large
// 401 : Unauthorized -> if access token mismatched
// 500 : ISE -> internal server error, query error

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// controller for Priest Model
Route::resource('priest', 'PriestController');
Route::get('allPriest', 'PriestController@getAllPriest')->name('allPriest.getAllPriest');

// controller for Certificate Model
Route::resource('certificate', 'CertificateController');

// controller for Template Model
Route::resource('template', 'TemplateController');

// controller for General Controller
Route::get('general', 'GeneralController@connectivity')->name('general.connectivity');

// customized the controller for AccessToken Model
Route::get('accesstoken', 'AccessTokenController@index')->name('accesstoken.index');
Route::get('accesstoken/{token}', 'AccessTokenController@show')->name('accesstoken.show');
Route::put('accesstoken/{token}', 'AccessTokenController@logout')->name('accesstoken.logout');
Route::post('accesstoken/', function() {
    //returning json response
    return response()->json([ "data" => [], "status" => 401, "message" => "Unauthorized"]);
});
