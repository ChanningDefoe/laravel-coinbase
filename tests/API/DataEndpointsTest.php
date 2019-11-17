<?php

namespace Cdefoe\LaravelCoinbase\Tests\API;

use Mockery;
use Cdefoe\LaravelCoinbase\Tests\BaseTestCase;
use Cdefoe\LaravelCoinbase\CoinbaseClient;
use Cdefoe\LaravelCoinbase\LaravelCoinbase;

class DataEndpointsTest extends BaseTestCase
{
    public function test_can_get_currencies()
    {
        // Arrange
        $mockCoinbaseClient = Mockery::mock(CoinbaseClient::class);
        $mockCoinbaseClient->shouldReceive('get')->once()->andReturn([
            'data' => [
                "id" => "ZWL",
                "name" => "Zimbabwean Dollar",
                "min_size" => "0.01000000",
            ],
        ]);
        $this->app->instance(CoinbaseClient::class, $mockCoinbaseClient);
                
        // Act
        $response = app(LaravelCoinbase::class)->currencies();

        // Assert
        $this->assertEquals([
            "id" => "ZWL",
            "name" => "Zimbabwean Dollar",
            "min_size" => "0.01000000",
        ], $response);
    }

    public function test_can_get_exchange_rates()
    {
        // Arrange
        $mockCoinbaseClient = Mockery::mock(CoinbaseClient::class);
        $mockCoinbaseClient->shouldReceive('get')->once()->andReturn([
            'data' => [
                "currency" => "USD",
                "rates" => [
                    "ZRX" => "3.56952270",
                    "ZWL" => "322.00",
                ],
            ],
        ]);
        $this->app->instance(CoinbaseClient::class, $mockCoinbaseClient);
                
        // Act
        $response = app(LaravelCoinbase::class)->exchangeRates();

        // Assert
        $this->assertEquals([
            "currency" => "USD",
            "rates" => [
                "ZRX" => "3.56952270",
                "ZWL" => "322.00",
            ],
        ], $response);
    }
}
