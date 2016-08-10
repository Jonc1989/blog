<?php namespace App\Modules\Friends;

use App\Providers\ModuleServiceProvider;

/**
 * Class FriendsServiceProvider
 *
 * @package App\Modules\Admin\Clients
 */
class FriendsServiceProvider extends ModuleServiceProvider
{
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->bootModule(__DIR__, 'friends');
    }
}