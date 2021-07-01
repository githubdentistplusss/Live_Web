<?php

namespace App\Providers;

use App\Services\UnifonicClient;
use Illuminate\Support\ServiceProvider;

class UnifonicServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../config/package.php' => config_path('unifonic.php')
        ], 'config');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(UnifonicClient::class, function ($app) {
            return new UnifonicClient(
                config('unifonic.base_uri'),
                config('unifonic.apps_id')
            );
        });
    }
}
