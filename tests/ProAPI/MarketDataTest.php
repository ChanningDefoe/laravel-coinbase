<?php

namespace Cdefoe\LaravelCoinbase\Tests\ProAPI;

use Mockery;
use Cdefoe\LaravelCoinbase\CoinbaseClient;
use Cdefoe\LaravelCoinbase\Tests\BaseTestCase;
use Cdefoe\LaravelCoinbase\LaravelCoinbasePro;

class MarketDataTest extends BaseTestCase
{
    public function test_can_get_products_market_data()
    {
        // Arrange
        $returnedData = [
            [
                "id" => "BTC-EUR",
                "base_currency" => "BTC",
                "quote_currency" => "EUR",
                "base_min_size" => "0.00100000",
                "base_max_size" => "10000.00000000",
                "quote_increment" => "0.01000000",
                "base_increment" => "0.00000001",
                "display_name" => "BTC/EUR",
                "min_market_funds" => "10",
                "max_market_funds" => "600000",
                "margin_enabled" => false,
                "post_only" => false,
                "limit_only" => false,
                "cancel_only" => false,
                "status" => "online",
                "status_message" => "",
            ],
            [
                "id" => "BTC-USD",
                "base_currency" => "BTC",
                "quote_currency" => "USD",
                "base_min_size" => "0.00100000",
                "base_max_size" => "10000.00000000",
                "quote_increment" => "0.01000000",
                "base_increment" => "0.00000001",
                "display_name" => "BTC/USD",
                "min_market_funds" => "10",
                "max_market_funds" => "1000000",
                "margin_enabled" => true,
                "post_only" => false,
                "limit_only" => false,
                "cancel_only" => false,
                "status" => "online",
                "status_message" => "",
            ]
        ];
        $mockCoinbaseClient = Mockery::mock(CoinbaseClient::class);
        $mockCoinbaseClient->shouldReceive('get')->once()->andReturn($returnedData);
        $this->app->instance(CoinbaseClient::class, $mockCoinbaseClient);

        // Act
        $response = app(LaravelCoinbasePro::class)->products();

        // Assert
        $this->assertEquals($returnedData, $response);
    }
}
