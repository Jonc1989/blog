<?php namespace App\Modules\Common;

use App\Providers\ModuleServiceProvider;

/**
 * Class ClientsServiceProvider
 *
 * @package App\Modules\Admin\Clients
 */
class CommonServiceProvider extends ModuleServiceProvider
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

        $this->app->bind('App\Modules\Common\Repositories\LocationRepositoryInterface',
            'App\Modules\Common\Repositories\LocationRepository');
    }
}