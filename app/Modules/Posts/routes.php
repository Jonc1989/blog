<?php

Route::group(['middleware' => ['web']], function () {

    Route::auth();

    Route::get('/galleries', 'App\Modules\Galleries\Controllers\GalleryController@index');

});