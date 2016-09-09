<?php

namespace FlyingLuscas\Laker;

use Illuminate\Support\ServiceProvider;

class LakerServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        $this->mergeConfigFrom(__DIR__.'/config.php', 'laker');

        $this->publishes([
            __DIR__.'/config.php' => config_path('laker.php'),
        ]);
    }

    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
