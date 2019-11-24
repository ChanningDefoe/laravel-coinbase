<?php

namespace Cdefoe\LaravelCoinbase\Tests\API;

use Mockery;
use Cdefoe\LaravelCoinbase\CoinbaseClient;
use Cdefoe\LaravelCoinbase\LaravelCoinbase;
use Cdefoe\LaravelCoinbase\Tests\BaseTestCase;

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

    public function test_exchange_rates_with_currency_type()
    {
        $responseData = [
            "currency" => "USD",
            "rates" => [
                "AED" => "4.06",
                "AFN" => "86.42",
            ],
        ];
        $mockCoinbaseClient = Mockery::mock(CoinbaseClient::class);
        $mockCoinbaseClient->shouldReceive('get')->once()->andReturn([
            'data' => $responseData,
        ]);
        $this->app->instance(CoinbaseClient::class, $mockCoinbaseClient);
                
        // Act
        $response = app(LaravelCoinbase::class)->exchangeRates("EUR");

        // Assert
        $this->assertEquals($responseData, $response);
    }

    public function test_can_get_btc_to_usd_buy_price()
    {
        $responseData = [
            "base" => "BTC",
            "currency" => "USD",
            "amount" => "7079.70",
        ];
        $mockCoinbaseClient = Mockery::mock(CoinbaseClient::class);
        $mockCoinbaseClient->shouldReceive('get')->once()->andReturn([
            'data' => $responseData,
        ]);
        $this->app->instance(CoinbaseClient::class, $mockCoinbaseClient);

        // Act
        $response = app(LaravelCoinbase::class)->getBuyPrice();

        // Assert
        $this->assertEquals($responseData, $response);
    }

    public function test_can_get_btc_to_eur_buy_price()
    {
        $responseData = [
            "base" => "BTC",
            "currency" => "EUR",
            "amount" => "6430.84",
        ];
        $mockCoinbaseClient = Mockery::mock(CoinbaseClient::class);
        $mockCoinbaseClient->shouldReceive('get')->once()->andReturn([
            'data' => $responseData,
        ]);
        $this->app->instance(CoinbaseClient::class, $mockCoinbaseClient);

        // Act
        $response = app(LaravelCoinbase::class)->getBuyPrice('BTC-EUR');

        // Assert
        $this->assertEquals($responseData, $response);
    }

    public function test_can_get_btc_to_usd_sell_price()
    {
        $responseData = [
            "base" => "BTC",
            "currency" => "USD",
            "amount" => "6998.97",
        ];
        $mockCoinbaseClient = Mockery::mock(CoinbaseClient::class);
        $mockCoinbaseClient->shouldReceive('get')->once()->andReturn([
            'data' => $responseData,
        ]);
        $this->app->instance(CoinbaseClient::class, $mockCoinbaseClient);

        // Act
        $response = app(LaravelCoinbase::class)->getSellPrice();

        // Assert
        $this->assertEquals($responseData, $response);
    }

    public function test_can_get_btc_to_eur_sell_price()
    {
        $responseData = [
            "base" => "BTC",
            "currency" => "EUR",
            "amount" => "6374.25",
        ];
        $mockCoinbaseClient = Mockery::mock(CoinbaseClient::class);
        $mockCoinbaseClient->shouldReceive('get')->once()->andReturn([
            'data' => $responseData,
        ]);
        $this->app->instance(CoinbaseClient::class, $mockCoinbaseClient);

        // Act
        $response = app(LaravelCoinbase::class)->getSellPrice('BTC-EUR');

        // Assert
        $this->assertEquals($responseData, $response);
    }

    public function test_can_get_btc_to_usd_spot_price()
    {
        $responseData = [
            "base" => "BTC",
            "currency" => "USD",
            "amount" => "7016.62",
        ];
        $mockCoinbaseClient = Mockery::mock(CoinbaseClient::class);
        $mockCoinbaseClient->shouldReceive('get')->once()->andReturn([
            'data' => $responseData,
        ]);
        $this->app->instance(CoinbaseClient::class, $mockCoinbaseClient);

        // Act
        $response = app(LaravelCoinbase::class)->getSpotPrice();

        // Assert
        $this->assertEquals($responseData, $response);
    }

    public function test_can_get_btc_to_usd_spot_price_for_previous_date()
    {
        $responseData = [
            "base" => "BTC",
            "currency" => "USD",
            "amount" => "979.56",
        ];
        $mockCoinbaseClient = Mockery::mock(CoinbaseClient::class);
        $mockCoinbaseClient->shouldReceive('get')->once()->andReturn([
            'data' => $responseData,
        ]);
        $this->app->instance(CoinbaseClient::class, $mockCoinbaseClient);

        // Act
        $response = app(LaravelCoinbase::class)->getSpotPrice('BTC-USD', '2017-01-01');

        // Assert
        $this->assertEquals($responseData, $response);
    }
}
