<?php

Route::group(['middleware' => ['web']], function () {
    
    Route::group( [ 'prefix' => 'api' ], function (){
        
        Route::resource('/posts', 'App\Modules\Posts\Controllers\api\PostController');
        
    });
    
});