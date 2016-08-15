<?php

Route::group(['middleware' => ['web']], function () {
    
    Route::group( [ 'prefix' => 'api' ], function (){
        
        Route::resource('/posts', 'App\Modules\Posts\Controllers\api\PostController');

        Route::resource('/posts/save-file', 'App\Modules\Posts\Controllers\api\PostController@save_file');
        
    });
    
});