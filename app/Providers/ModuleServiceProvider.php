<?php
/**
 * Created by PhpStorm.
 * User: Igors
 * Date: 10.09.2014
 * Time: 14:32
 */

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

/**
 * Class ModuleServiceProvider
 *
 * @package App\Providers
 */
abstract class ModuleServiceProvider extends ServiceProvider
{

    /**
     * @param string $namespace
     */
    protected function fireEvent( $namespace )
    {
        $this->app[ 'events' ]->fire( 'modules.boot', [ $namespace ] );
    }

    /**
     * @param string $dir
     * @param string $namespace
     */
    protected function addNamespaces( $dir, $namespace )
    {
        //$this->app[ 'view' ]->addNamespace( $namespace, $dir . DIRECTORY_SEPARATOR . 'Views' );
        $this->app[ 'translator' ]->addNamespace( $namespace, $dir . DIRECTORY_SEPARATOR . 'Lang' );
        $this->app[ 'config' ]->addNamespace( $namespace, $dir . DIRECTORY_SEPARATOR . 'Config' );
    }

    /**
     * @param $dir
     * @param $namespace
     */
    public function bootModule( $dir, $namespace )
    {
        // Pievienojam modļa routus un eventus
        $this->app->booted( function () use ( $dir, $namespace )
        {
            require $dir . DIRECTORY_SEPARATOR . 'events.php';
            require $dir . DIRECTORY_SEPARATOR . 'routes.php';

            // Pievienojam moduļa vārdvietas
            //$this->addNamespaces( $dir, $namespace );

            // Moduļa event izšaušana
            $this->fireEvent( $namespace );
        } );

    }

}