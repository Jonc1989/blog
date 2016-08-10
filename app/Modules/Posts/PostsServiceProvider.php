<?php namespace App\Modules\Posts;

use App\Providers\ModuleServiceProvider;

/**
 * Class PostsServiceProvider
 * @package App\Modules\Posts
 */
class PostsServiceProvider extends ModuleServiceProvider
{
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->bootModule(__DIR__, 'posts');
    }
}