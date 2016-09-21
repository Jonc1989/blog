<?php

Route::group( [ 'prefix' => 'api' ], function ()
{
	Route::group( [ 'prefix' => 'common' ], function ()
	{
		Route::post('/rate', 'App\Modules\Common\Controllers\api\RatingController@rate');
	});
	
});