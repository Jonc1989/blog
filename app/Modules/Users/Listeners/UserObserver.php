<?php namespace App\Modules\Users\Listeners;

use App\Modules\Users\Models\User;

class UserObserver
{
    /**
     * Listen to the User created event.
     *
     * @param  User  $user
     * @return void
     */
    public function created(User $user)
    {
        //
    }

    /**
     * Listen to the User deleting event.
     *
     * @param  User  $user
     * @return void
     */
    public function deleting(User $user)
    {
        //
    }

    /**
     * Listen to the User updating event.
     *
     * @param  User  $user
     * @return void
     */
    public function updating(User $user)
    {
        \Log::info( $user );
    }
}