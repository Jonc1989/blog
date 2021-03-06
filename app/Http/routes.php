<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

//Artisan::call( 'run:project' );



Route::group(['middleware' => ['web']], function () {

    Route::group( [ 'prefix' => '/api' ], function ()
    {
        Route::get( 'view/{url}', 'Http\Controllers\ApiViewController@render' );
    });

    Route::auth();

    Route::get('/', 'Modules\HomeController@index');
    
});