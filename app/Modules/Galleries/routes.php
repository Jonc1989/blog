<?php

Route::group(['middleware' => ['web']], function () {

    Route::resource( 'galleries', 'App\Modules\Galleries\Controllers\GalleryController' );

    Route::group( [ 'prefix' => 'api' ], function ()
    {
        Route::resource( 'galleries', 'App\Modules\Galleries\Controllers\api\GalleryController' );

    });

});