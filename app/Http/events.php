<?php
use Illuminate\Support\Facades\App;


App::error( function ( Illuminate\Session\TokenMismatchException $exception )
{
	if ( Request::ajax() )
	{
		\Log::info('Exepsens notika');
		//return \Response::json( array( 'error' => $exception->getMessage() ), 401 );
	}

	//return redirect( '/' );
} );