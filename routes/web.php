<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes();

/*
    Jul: 05/19/2021
    Register this for the soule purpose of uri setup. to avoid calling /api in calling endpoints
*/
Route::get('/', 'CertificatesViewController@index')->middleware('auth');

Route::get('/certificate', 'CertificatesViewController@index')->name('certificate');
Route::get('/priest', 'PriestViewController@index')->name('priest');
Route::get('/template', 'TemplateController@index')->name('template');

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
