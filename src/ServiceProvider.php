<?php

namespace KoperasiIo\KoperasiApi;

use Illuminate\Support\ServiceProvider as IlluminateServiceProvider;
use KoperasiIo\KoperasiApi\KoperasiApi;

/**
 * Service provider to integrate the SDK with Laravel.
 *
 * @version 1.0.0
 * @author  Gustavo Straube
 */
class ServiceProvider extends IlluminateServiceProvider
{

    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot() {}

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('koperasi-io.config', function ($app) {
            return $this->app['config']['koperasi-io'];
        });

        $this->app->singleton(KoperasiApi::class, function ($app) {
            $config = $app['koperasi-io.config'];
            
            return new KoperasiApi($config);
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
            KoperasiApi::class,
        ];
    }
}