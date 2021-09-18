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

Route::get('/certificate', 'CertificatesViewController@index')->name('certificate')->middleware('auth');
Route::get('/priest', 'PriestViewController@index')->name('priest')->middleware('auth');
Route::get('/template', 'TemplateViewController@index')->name('template')->middleware('auth');
Route::get('/user', 'UserViewController@index')->name('user')->middleware('auth');
Route::get('/profile', 'ProfileViewController@index')->name('profile')->middleware('auth');
Route::get('/maintenance', 'MaintenanceController@index')->name('maintenance')->middleware('auth');
Route::get('/maintenance/{id}', 'MaintenanceController@delete_records')->name("maintenance.delete_records");
Route::get('/print/{certType}/{content}/{meta?}', 'PrintController@index')->where('meta', '(.*)')->middleware('auth');
// Download Route
Route::get('download/{filename}', function($filename)
{
    // Check if file exists in app/storage/file folder
    $file_path = storage_path() .'/csv_templates/'. $filename;
    // dd($file_path);
    if (file_exists($file_path))
    {
        // Send Download
        return Response::download($file_path, $filename, [
            'Content-Length: '. filesize($file_path)
        ]);
    }
    else
    {
        // Error
        exit('Requested file does not exist on our server!');
    }
})
->where('filename', '[A-Za-z0-9\-\_\.]+');

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
