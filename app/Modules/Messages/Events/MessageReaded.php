<?php

namespace App\Modules\Messages\Events;

use App\Events\Event;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class MessageReaded extends Event implements ShouldBroadcast
{
    use SerializesModels;

    public $receiver;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct( $receiver )
    {
        $this->receiver = $receiver;
    }

    /**
     * Get the channels the event should be broadcast on.
     *
     * @return array
     */
    public function broadcastOn()
    {
        return ['message-readed'];
    }
}
