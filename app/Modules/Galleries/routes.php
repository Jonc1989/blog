<?php

Route::group(['middleware' => ['web']], function () {

    Route::resource( 'galleries', 'App\Modules\Galleries\Controllers\GalleryController' );

    Route::group( [ 'prefix' => 'api' ], function ()
    {
        Route::resource( 'galleries', 'App\Modules\Galleries\Controllers\api\GalleryController' );

    });

    Route::get( 'image/{user}/{gallery_id}/{id}', 'App\Modules\Galleries\Controllers\api\GalleryController@read' );
});