<?php

namespace YourVendor\YourPackage;

use Illuminate\Support\ServiceProvider;

class main extends ServiceProvider
{
    public function register()
    {
        // Register your package's services here
    }

    public function boot()
    {
        // Bootstrap your package here

        // If you have config files
        $this->publishes([
            __DIR__.'/../config/your-config.php' => config_path('your-config.php'),
        ], 'config');

        // If you have views
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'your-package');

        // If you have migrations
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');

        // If you have routes
        $this->loadRoutesFrom(__DIR__.'/../routes/web.php');
    }
}
