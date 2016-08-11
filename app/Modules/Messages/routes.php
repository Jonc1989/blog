<?php

Route::group(['middleware' => ['web']], function () {

    //Route::auth();

    Route::get('/messages', 'App\Modules\Messages\Controllers\MessagesController@index');

});