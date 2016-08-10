<?php

Route::group( [ 'prefix' => 'api' ], function ()
{
    Route::resource( 'users', 'App\Modules\Users\Controllers\UserController' );

    Route::get( 'users/search/{key}', 'App\Modules\Users\Controllers\UserController@search' );
});
