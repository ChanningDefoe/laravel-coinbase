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

    public function test_can_get_product_order_book()
    {
        // Arrange
        $returnedData = [
            "sequence" => 84509014,
            "bids" => ["8492", "10.5854", 6],
            "asks" => ["8492.01", "122.1641", 14],
        ];
        $mockCoinbaseClient = Mockery::mock(CoinbaseClient::class);
        $mockCoinbaseClient->shouldReceive('get')->once()->andReturn($returnedData);
        $this->app->instance(CoinbaseClient::class, $mockCoinbaseClient);

        // Act
        $response = app(LaravelCoinbasePro::class)->productOrderBook('BTC-USD');

        // Assert
        $this->assertEquals($returnedData, $response);
    }

    public function test_can_get_product_order_book_with_level()
    {
        // Arrange
        $returnedData = [
            "sequence" => 84513056,
            "bids" => [
                ["8476.14", "20.1786", 5],
                ["8476.14", "20.1786", 5],
            ],
            "asks" => [
                ["8476.15", "0.4553", 3],
                ["9543.55", "0.0046", 2],
            ]
        ];
        $mockCoinbaseClient = Mockery::mock(CoinbaseClient::class);
        $mockCoinbaseClient->shouldReceive('get')->once()->andReturn($returnedData);
        $this->app->instance(CoinbaseClient::class, $mockCoinbaseClient);

        // Act
        $response = app(LaravelCoinbasePro::class)->productOrderBook('BTC-USD', 2);

        // Assert
        $this->assertEquals($returnedData, $response);
    }

    public function test_can_get_product_ticker()
    {
        // Arrange
        $returnedData = [
            "trade_id" => 7183819,
            "price" => "8462.82",
            "size" => "2",
            "time" => "2019-11-18T02:48:08.270095Z",
            "bid" => "8462.82",
            "ask" => "8464.67",
            "volume" => "70993.71142680",
        ];
        $mockCoinbaseClient = Mockery::mock(CoinbaseClient::class);
        $mockCoinbaseClient->shouldReceive('get')->once()->andReturn($returnedData);
        $this->app->instance(CoinbaseClient::class, $mockCoinbaseClient);

       // Act
       $response = app(LaravelCoinbasePro::class)->productTicker('BTC-USD');

       // Assert
       $this->assertEquals($returnedData, $response);
    }

    public function test_abc()
    {
        dd(\LaravelCoinbasePro::productTrades('BTC-USD'));
    }
}
