<?php namespace App\Modules\Friends\Listeners;

use App\Modules\Friends\Models\Friends;

use App\Http\Models\Revisions;
class FriendObserver
{
    public function __construct( Revisions $revisions )
    {
        $this->revision = $revisions;
    }

    /**
     * Listen to the User created event.
     *
     * @param  User  $user
     * @return void
     */
    public function created(Friends $model)
    {

        $class = new \ReflectionClass($model);

        \Log::info($class->getName());



        //\Log::info( 'created' );
        ///\Log::info( $user );
        $this->revision->create([
            'revisionable_type'     => $class->getName(),
            'revisionable_id'       => $model->id,
            'user_id'               => \Auth::id()
        ]);
    }

    /**
     * Listen to the User updating event.
     *
     * @param  User  $user
     * @return void
     */
    public function updated(Friends $user)
    {
        \Log::info( 'updated' );
        \Log::info( $user );
    }

    /**
     * Listen to the User updating event.
     *
     * @param  User  $user
     * @return void
     */
    public function saved(Friends $user)
    {
        //\Log::info( 'saved' );
        //\Log::info( $user );
    }

    /**
     * Listen to the User deleting event.
     *
     * @param  User  $user
     * @return void
     */
    public function deleted(Friends $user)
    {
        \Log::info( 'deleting' );
        \Log::info( $user );
    }


}