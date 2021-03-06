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


Route::middleware(['auth:api'])->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    Route::get('/backups', 'BackupControler@list');
    Route::get('/dashboard', 'DashboardController@all');


});

Route::get('/realm', 'BackupControler@realm');
Route::post('/realm', 'BackupControler@realm');


Route::post('/upload', 'UploadFileController@upload');
Route::post('/upload-zip', 'UploadFileController@uploadZip');


Route::post('/upload/zip', 'UploadFileController@uploadZip');
Route::get('/password/send', 'ResetPasswordController@reset');
