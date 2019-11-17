<?php

namespace Cdefoe\LaravelCoinbase;

use Illuminate\Support\Facades\Facade;

class LaravelCoinbaseFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'laravel-coinbase';
    }
}
