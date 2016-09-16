<?php namespace App\Modules\Friends\Listeners;

use App\Http\Observers\BaseObserver;
use App\Http\Models\Events;
class FriendObserver extends BaseObserver
{
	
	public function __construct( Events $events )
	{
		$this->event = $events;
	}
	
	public function created( $model )
	{

	}

	public function updated( $model )
	{
		$class = new \ReflectionClass($model);

		$this->event->create([
			'revisionable_model'    => $class->getName(),
			'type'                  => strtolower( $class->getShortName() ),
			'event_id'              => $model->id,
			'user_id'               => \Auth::id(),
			'action'                   => 'update'
		]);
	}
//
//	public function saved( $user )
//	{
//		\Log::info( 'savedFriendObserver' );
//	}
}