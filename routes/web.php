<?php

Route::get('/', function () {
    return redirect('/login');
});

Route::get('login', 'LoginController@index');

Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function () {
    CRUD::resource('upload', 'Admin\UploadCrudController');

    Route::group(['prefix' => 'upload/{parent_id}'], function () {
        CRUD::resource('images', 'Admin\ImageCrudController');
    });
});

Route::group(['prefix' => 'admin'], function () {
    Route::get('download/{upload}', 'Admin\UploadCrudController@download');
});


