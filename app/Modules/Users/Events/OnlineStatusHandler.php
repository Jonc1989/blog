<?php
namespace App\Modules\Users\Events;

use Illuminate\Database\Eloquent\Model;
class OnlineStatusHandler
{
    public function logout( Model $user )
    {
        \Log::info('event fired');
        $user_repo = \App::make('App\Modules\Users\Repositories\UsersRepositoryInterface');
        
        $user_repo->updateOnlineStats( $user->id, 0 );
        \Auth::logout();
        return redirect(property_exists($this, 'redirectAfterLogout') ? $this->redirectAfterLogout : '/');
    }
}