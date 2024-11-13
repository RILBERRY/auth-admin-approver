<?php

namespace Riley\AdminApprover;

use Illuminate\Support\ServiceProvider;
use Riley\AdminApprover\Middleware\AdminAuthorizedCompleted;
use Riley\AdminApprover\Middleware\WaitingAdminAuthorization;

class AdminApproverServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__ . '/../config/admin-approver.php',
            'admin-approver'
        );
    }

    public function boot()
    {
        // Load Routes
        if (config('admin-approver.routes.enabled')) {
            $this->loadRoutesFrom(__DIR__ . '/../routes/web.php');
        }

        // Load Views
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'admin-approver');

        // Load Migrations
        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');

        // Register Middlewares
        $router = $this->app['router'];
        $router->aliasMiddleware('admin.approved', AdminAuthorizedCompleted::class);
        $router->aliasMiddleware('admin.waiting', WaitingAdminAuthorization::class);

        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../config/admin-approver.php' => config_path('admin-approver.php'),
            ], 'admin-approver-config');

            $this->publishes([
                __DIR__ . '/../resources/views' => resource_path('views/vendor/admin-approver'),
            ], 'admin-approver-views');

            $this->publishes([
                __DIR__ . '/../database/migrations' => database_path('migrations'),
            ], 'admin-approver-migrations');
        }
    }
}
