<?php namespace App\Modules\Friends\Listeners;

use App\Modules\Friends\Models\Friends;

class FriendObserver
{
    /**
     * Listen to the User created event.
     *
     * @param  User  $user
     * @return void
     */
    public function created(Friends $user)
    {
        \Log::info( $user );
    }

    /**
     * Listen to the User deleting event.
     *
     * @param  User  $user
     * @return void
     */
    public function deleting(Friends $user)
    {
        \Log::info( $user );
    }

    /**
     * Listen to the User updating event.
     *
     * @param  User  $user
     * @return void
     */
    public function updating(Friends $user)
    {
        \Log::info( $user );
    }
}