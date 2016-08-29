<?php namespace App\Modules\Galleries;

use App\Providers\ModuleServiceProvider;

/**
 * Class ClientsServiceProvider
 *
 * @package App\Modules\Admin\Clients
 */
class GalleriesServiceProvider extends ModuleServiceProvider
{
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->bootModule(__DIR__, 'galleries');

        $this->app->bind('App\Modules\Galleries\Repositories\GalleryRepositoryInterface',
            'App\Modules\Galleries\Repositories\GalleryRepository');
    }
}