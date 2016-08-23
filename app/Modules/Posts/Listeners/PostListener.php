<?php namespace App\Modules\Posts\Listeners;

class PostListener {

    /**
     * Handle user login events.
     */
    public function opPost($event) { }
    

    public function subscribe($events)
    {
        $events->listen(
            'App\Modules\Posts\Events\PostAdded',
            'App\Modules\Posts\Listeners\PostListener@opPost'
        );

    }
}