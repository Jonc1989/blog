<?php namespace App\Modules\Galleries;

use App\Modules\Galleries\Listeners\GalleryObserver;
use App\Modules\Galleries\Models\Gallery;
use App\Providers\ModuleServiceProvider;

/**
 * Class ClientsServiceProvider
 *
 * @package App\Modules\Admin\Clients
 */
class GalleriesServiceProvider extends ModuleServiceProvider
{
  
    public function boot()
    {
        Gallery::observe(GalleryObserver::class);
    }
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->bootModule(__DIR__, 'galleries');

        $this->app->bind('App\Modules\Galleries\Repositories\ImageRepositoryInterface',
            'App\Modules\Galleries\Repositories\ImageRepository');

        $this->app->bind('App\Modules\Galleries\Repositories\GalleryRepositoryInterface',
            'App\Modules\Galleries\Repositories\GalleryRepository');
    }
}