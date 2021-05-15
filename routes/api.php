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
// 500	: ISE -> internal server error, query error

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('priest', 'PriestController');
