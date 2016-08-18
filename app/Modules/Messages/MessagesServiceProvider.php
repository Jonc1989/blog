<?php namespace App\Modules\Messages;

use App\Providers\ModuleServiceProvider;

/**
 * Class ClientsServiceProvider
 *
 * @package App\Modules\Admin\Clients
 */
class MessagesServiceProvider extends ModuleServiceProvider
{
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->bootModule(__DIR__, 'messages');

        $this->app->bind('App\Modules\Messages\Repositories\MessagesRepositoryInterface',
            'App\Modules\Messages\Repositories\MessagesRepository');
    }
}