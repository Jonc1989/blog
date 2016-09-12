<?php namespace App\Modules\Friends\Listeners;

use App\Http\Observers\BaseObserver;

class FriendObserver extends BaseObserver
{

	public function created( $model )
	{

	}

	public function updated( $user )
	{
		\Log::info( 'updated' );
	}

	public function saved( $user )
	{
		\Log::info( 'saved' );
	}
}