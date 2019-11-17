<?php

namespace Cdefoe\LaravelCoinbase\Tests;

use Orchestra\Testbench\TestCase as TestCase;
use Cdefoe\LaravelCoinbase\LaravelCoinbaseFacade;
use Cdefoe\LaravelCoinbase\LaravelCoinbaseServiceProvider;

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
        ];
    }
}
