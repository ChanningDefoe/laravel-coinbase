<?php

namespace Cdefoe\LaravelCoinbase;

use GuzzleHttp\Client;
use Illuminate\Support\ServiceProvider;

class LaravelCoinbaseServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../config/config.php' => config_path('laravel-coinbase.php'),
            ], 'config');
        }
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        // Automatically apply the package configuration
        $this->mergeConfigFrom(__DIR__.'/../config/config.php', 'laravel-coinbase');

        // Register the main class to use with the facade
        $this->app->singleton('laravel-coinbase', function () {
            $httpClient = new Client([
                'base_uri' => config('laravel-coinbase.url'),
            ]);
            $coinbaseClient = new CoinbaseClient($httpClient);

            return new LaravelCoinbase($coinbaseClient);
        });
    }
}
