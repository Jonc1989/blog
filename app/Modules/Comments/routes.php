<?php

Route::group( [ 'prefix' => 'api' ], function (){

	Route::resource( 'comments', 'App\Modules\Comments\Controllers\api\CommentController' );
	
});