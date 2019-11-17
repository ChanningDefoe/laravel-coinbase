<?php

namespace Cdefoe\LaravelCoinbase\Providers;

use GuzzleHttp\Client;
use Illuminate\Support\ServiceProvider;
use Cdefoe\LaravelCoinbase\CoinbaseClient;
use Cdefoe\LaravelCoinbase\LaravelCoinbase;
use Cdefoe\LaravelCoinbase\LaravelCoinbasePro;

class LaravelCoinbaseServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../../config/config.php' => config_path('laravel-coinbase.php'),
            ], 'config');
        }
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        // Automatically apply the package configuration
        $this->mergeConfigFrom(__DIR__.'/../../config/config.php', 'laravel-coinbase');

        // Register the LaravelCoinbase Client
        $this->app->singleton('laravel-coinbase', function () {
            $httpClient = new Client([
                'base_uri' => config('laravel-coinbase.api.url'),
            ]);
            $coinbaseClient = new CoinbaseClient($httpClient);

            return new LaravelCoinbase($coinbaseClient);
        });

        // Register the LaravelCoinbasePro Client
        $this->app->singleton('laravel-coinbase-pro', function () {
            $httpClient = new Client([
                'base_uri' => config('laravel-coinbase.proapi.url'),
            ]);
            $coinbaseClient = new CoinbaseClient($httpClient);

            return new LaravelCoinbasePro($coinbaseClient);
        });
    }
}
