<?php

Route::group(['middleware' => ['web']], function () {

    //Route::auth();
    
    Route::resource( 'user', 'App\Modules\Users\Controllers\UserController' );

    Route::group( [ 'prefix' => 'api' ], function ()
    {
        Route::resource( 'users', 'App\Modules\Users\Controllers\api\UserController' );

        Route::get( 'online', 'App\Modules\Users\Controllers\api\UserController@online' );

        Route::get( 'user/status/{id}', 'App\Modules\Users\Controllers\api\UserController@status' );
        
        Route::get( 'users/add/{id}', 'App\Modules\Users\Controllers\api\UserController@add' );

        Route::get( 'users/search/{key}', 'App\Modules\Users\Controllers\api\UserController@search' );

    });

});