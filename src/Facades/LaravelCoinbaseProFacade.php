<?php

namespace Cdefoe\LaravelCoinbase\Facades;

use Illuminate\Support\Facades\Facade;

class LaravelCoinbaseProFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'laravel-coinbase-pro';
    }
}
