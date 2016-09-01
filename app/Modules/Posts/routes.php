<?php

Route::group(['middleware' => ['web']], function () {
    
    Route::group( [ 'prefix' => 'api/posts' ], function (){
        
        Route::resource('/', 'App\Modules\Posts\Controllers\api\PostController');

        Route::resource('/save-file', 'App\Modules\Posts\Controllers\api\PostController@save_file');

        Route::get('/likes', 'App\Modules\Common\Controllers\LikeController@getLikes');
        
        Route::post('/like', 'App\Modules\Common\Controllers\LikeController@like');
        
    });
    
});