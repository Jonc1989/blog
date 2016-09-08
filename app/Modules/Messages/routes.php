<?php

Route::group(['middleware' => ['web']], function () {

    Route::resource('/messages', 'App\Modules\Messages\Controllers\MessagesController');
    //Route::auth();
    Route::group( [ 'prefix' => 'api' ], function ()
    {

        Route::get('/messengers', 'App\Modules\Messages\Controllers\api\MessagesController@messengers');


        Route::get('/new-messages/{id}', 'App\Modules\Messages\Controllers\api\MessagesController@getNewMessageCount');

        Route::resource('/messages', 'App\Modules\Messages\Controllers\api\MessagesController');
        
    });
    

});