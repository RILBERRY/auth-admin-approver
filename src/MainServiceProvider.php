<?php

namespace YourVendor\YourPackage;

use Illuminate\Support\ServiceProvider;
use Exception;

/**
 * Auth Admin Approver Service Provider
 */
class MainServiceProvider extends ServiceProvider
{
    /**
     * Package version
     *
     * @var string
     */
    const VERSION = "1.0.0";

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
        // Merge configuration
        $this->mergeConfigFrom(
            __DIR__ . "/../config/your-config.php",
            "auth-admin"
        );
    }

    /**
     * Bootstrap any package services.
     *
     * @return void
     */
    public function boot()
    {
        try {
            // Load routes
            $this->loadRoutesFrom(__DIR__ . "/../routes/web.php");

            // Load views
            $this->loadViewsFrom(__DIR__ . "/../resources/views", "auth-admin");

            // Load migrations
            $this->loadMigrationsFrom(__DIR__ . "/../database/migrations");

            // Register publishable resources
            if ($this->app->runningInConsole()) {
                $this->registerPublishables();
            }
        } catch (Exception $e) {
            logger()->error("Auth Admin Package Error: " . $e->getMessage());
        }
    }

    /**
     * Register publishable resources
     *
     * @return void
     */
    private function registerPublishables()
    {
        // Publish config
        $this->publishes(
            [
                __DIR__ . "/../config/your-config.php" => config_path(
                    "auth-admin.php"
                ),
            ],
            "auth-admin-config"
        );

        // Publish views
        $this->publishes(
            [
                __DIR__ . "/../resources/views" => resource_path(
                    "views/vendor/auth-admin"
                ),
            ],
            "auth-admin-views"
        );

        // Publish migrations
        $this->publishes(
            [
                __DIR__ . "/../database/migrations" => database_path(
                    "migrations"
                ),
            ],
            "auth-admin-migrations"
        );
    }
}
