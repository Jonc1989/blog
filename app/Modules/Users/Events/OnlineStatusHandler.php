<?php
namespace App\Modules\Users\Events;

use App\Events\Test;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Events\Login as User;
use Illuminate\Auth\Events\Logout;
use App\Modules\Users\Repositories\UsersRepositoryInterface;
class OnlineStatusHandler
{

    /**
     * OnlineStatusHandler constructor.
     * @param UsersRepositoryInterface $user
     */
    public function __construct( UsersRepositoryInterface $user )
    {
        $this->user_repository = $user;
    }

    /**
     * @param Model $user
     */
    public function logout( Model $user )
    {
        $this->user_repository->updateOnlineStats( $user->id, 0 );
        \Auth::logout();
    }

    /**
     * @param User $user
     * @param bool $remember
     */
    public function login( User $user, $remember = false )
    {
        $this->user_repository->updateOnlineStats( $user->user[ 'attributes' ][ 'id' ], 1 );
    }

    /**
     * @param Logout $user
     */
    public function logoutManualy( Logout $user )
    {
        $this->user_repository->updateOnlineStats( $user->user[ 'attributes' ][ 'id' ], 0 );
    }

    public function test( Test $test )
    {
        \Log::info($test);
    }
}