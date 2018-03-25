<?php

namespace KoperasiIo\KoperasiApi;

use Illuminate\Support\ServiceProvider;
use KoperasiIo\KoperasiApi\Client;

/**
 * Service provider to integrate the SDK with Laravel.
 *
 * @version 1.0.0
 * @author  Gustavo Straube
 */
class KoperasiApiServiceProvider extends ServiceProvider
{

    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../../config/koperasi-api.php' => config_path('koperasi-api.php'),
        ]);
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../../config/koperasi-api.php', 'koperasi-api');

        $this->app->singleton('koperasi-api.config', function ($app) {
            return $this->app['config']['koperasi-api'];
        });

        $this->app->singleton(Client::class, function ($app) {
            $config = $app['koperasi-api.config'];
            
            return new Client($config);
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [
            Client::class,
        ];
    }
}