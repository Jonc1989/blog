<?php

Route::resource( 'user', 'App\Modules\Users\Controllers\UserController' );

Route::group( [ 'prefix' => 'api' ], function ()
{
    Route::resource( 'users', 'App\Modules\Users\Controllers\api\UserController' );

    Route::get( 'users/search/{key}', 'App\Modules\Users\Controllers\api\UserController@search' );
});