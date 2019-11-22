<?php

namespace Cdefoe\LaravelCoinbase\Tests;

use Cdefoe\LaravelCoinbase\Facades\LaravelCoinbaseFacade;
use Cdefoe\LaravelCoinbase\Facades\LaravelCoinbaseProFacade;

class MarketDataTest extends BaseTestCase
{
    public function test_can_use_laravel_coinbase_facade()
    {
        // Arrange
        LaravelCoinbaseFacade::shouldReceive('currencies')->andReturn('test');

        // Act
        $response = \LaravelCoinbase::currencies();
        
        // Assert
        $this->assertEquals('test', $response);
    }

    public function test_can_use_laravel_coinbase_pro_facade()
    {
        // Arrange
        LaravelCoinbaseProFacade::shouldReceive('products')->andReturn('test');

        // Act
        $response = \LaravelCoinbasePro::products();
        
        // Assert
        $this->assertEquals('test', $response);
    }
}
