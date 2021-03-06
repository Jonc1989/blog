<?php
/**
 * Created by PhpStorm.
 * User: Igors
 * Date: 01.09.2014
 * Time: 14:25
 */

namespace App\Modules;

use Illuminate\Support\ServiceProvider;

class AdminServiceProvider extends ServiceProvider
{

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $modules = [
            'Comments',
            'Common',
            'Friends', 
            'Galleries',
            'Messages',
            'Posts',
            'Users',
        ];

        foreach ( $modules as $module )
        {
            $this->app->register( "App\\Modules\\{$module}\\{$module}ServiceProvider" );
        }

    }

}