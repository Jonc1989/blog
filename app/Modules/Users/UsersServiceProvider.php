<?php namespace App\Modules\Users;

use App\Providers\ModuleServiceProvider;

/**
 * Class ClientsServiceProvider
 *
 * @package App\Modules\Admin\Clients
 */
class UsersServiceProvider extends ModuleServiceProvider
{
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        // Reģistrējam moduļa vārdvietas, maršrutētāju, notikumu klausītāju un izšaujam moduļa palaisšanas notikumu
        $this->bootModule(__DIR__, 'users');

        $this->app->bind('App\Modules\Users\Repositories\UsersRepositoryInterface',
            'App\Modules\Users\Repositories\UsersRepository');
    }
}