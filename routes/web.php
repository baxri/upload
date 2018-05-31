<?php

Route::get('/', function () {
    return redirect('/admin');
});

Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function () {
    CRUD::resource('upload', 'Admin\UploadCrudController');
    Route::get('download/{upload}', 'Admin\UploadCrudController@download');

    Route::group(['prefix' => 'upload/{parent_id}'], function () {
        CRUD::resource('images', 'Admin\ImageCrudController');
    });

});


