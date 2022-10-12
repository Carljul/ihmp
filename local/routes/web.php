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

/**
 * Backups database
 */
Route::get('backup_db', function () {
    /*
    Needed in SQL File:

    SET GLOBAL sql_mode = '';
    SET SESSION sql_mode = '';
    */
    $get_all_table_query = "SHOW TABLES";
    $result = collect(\DB::select(\DB::raw($get_all_table_query)));

    $tables = $result->pluck('Tables_in_ihmp')->toArray();

    $structure = '';
    $data = '';
    foreach ($tables as $table) {
        $show_table_query = "SHOW CREATE TABLE " . $table . "";

        $show_table_result = \DB::select(\DB::raw($show_table_query));

        foreach ($show_table_result as $show_table_row) {
            $show_table_row = (array)$show_table_row;
            $structure .= "\n\n" . $show_table_row["Create Table"] . ";\n\n";
        }
        $select_query = "SELECT * FROM " . $table;
        $records = \DB::select(\DB::raw($select_query));

        foreach ($records as $record) {
            $record = (array)$record;
            $table_column_array = array_keys($record);
            foreach ($table_column_array as $key => $name) {
                $table_column_array[$key] = '`' . $table_column_array[$key] . '`';
            }

            $table_value_array = array_values($record);
            $data .= "\nINSERT INTO $table (";

            $data .= "" . implode(", ", $table_column_array) . ") VALUES \n";

            foreach($table_value_array as $key => $record_column)
                $table_value_array[$key] = addslashes($record_column);

            $data .= "('" . implode("','", $table_value_array) . "');\n";
        }
    }
    $file_name = __DIR__ . '/../../db/database_backup_on_' . date('Y_m_d_H_i_s') . '.sql';
    $file_handle = fopen($file_name, 'w + ');

    $output = $structure . $data;
    fwrite($file_handle, $output);
    fclose($file_handle);
    echo "DB backup ready ".$file_name;
});

// Test Route
Route::get('/test', function(){
    return view('welcome');
});

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
