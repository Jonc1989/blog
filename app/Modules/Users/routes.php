<?php

Route::group(['middleware' => ['web']], function () {

    //Route::auth();
    
    Route::resource( 'user', 'App\Modules\Users\Controllers\UserController' );

    Route::group( [ 'prefix' => 'api' ], function ()
    {
        Route::resource( 'users', 'App\Modules\Users\Controllers\api\UserController' );

        Route::get( 'online', 'App\Modules\Users\Controllers\api\UserController@online' );

        Route::get( 'users/search/{key}', 'App\Modules\Users\Controllers\api\UserController@search' );

        Route::get( 'users/{id}/guests', 'App\Modules\Users\Controllers\api\UserController@guests' );

    });

});