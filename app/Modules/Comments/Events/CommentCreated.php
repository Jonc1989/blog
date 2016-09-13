<?php

namespace App\Modules\Comments\Events;

use App\Events\Event;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class CommentCreated extends Event implements ShouldBroadcast
{
	use SerializesModels;

	public $params;
	/**
	 * Create a new event instance.
	 *
	 * @return void
	 */
	public function __construct( $params )
	{
		$this->params = $params;
	}

	/**
	 * Get the channels the event should be broadcast on.
	 *
	 * @return array
	 */
	public function broadcastOn()
	{
		return ['comment-created'];
	}
}
