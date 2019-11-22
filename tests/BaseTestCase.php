<?php

namespace Cdefoe\LaravelCoinbase\Tests;

use Orchestra\Testbench\TestCase as TestCase;
use Cdefoe\LaravelCoinbase\Facades\LaravelCoinbaseFacade;
use Cdefoe\LaravelCoinbase\Facades\LaravelCoinbaseProFacade;
use Cdefoe\LaravelCoinbase\Providers\LaravelCoinbaseServiceProvider;

class BaseTestCase extends TestCase
{
    protected function getPackageProviders($app)
    {
        return [
            LaravelCoinbaseServiceProvider::class,
        ];
    }

    protected function getPackageAliases($app)
    {
        return [
            'LaravelCoinbase' => LaravelCoinbaseFacade::class,
            'LaravelCoinbasePro' => LaravelCoinbaseProFacade::class,
        ];
    }
}
