<?php

namespace App\Modules\Posts\Listeners;

use App\Modules\Posts\Events\PostAdded;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class PostAddedL
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  PostAdded  $event
     * @return void
     */
    public function handle(PostAdded $event)
    {
        
    }
}
