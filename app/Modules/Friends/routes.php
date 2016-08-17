<?php

Route::group(['middleware' => ['web']], function () {

    Route::group( [ 'prefix' => 'api' ], function ()
    {

        Route::get( 'friends/invitations', 'App\Modules\Friends\Controllers\api\FriendController@invitations' );
        
        Route::get( 'friend/status/{id}', 'App\Modules\Friends\Controllers\api\FriendController@status' );

        Route::get( 'friends/{id}', 'App\Modules\Friends\Controllers\api\FriendController@friends' );

        Route::resource( 'friends', 'App\Modules\Friends\Controllers\api\FriendController' );
    });

});