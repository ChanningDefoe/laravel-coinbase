<?php

namespace Cdefoe\LaravelCoinbase\Tests;

use Cdefoe\LaravelCoinbase\Tests\BaseTestCase;
use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\HandlerStack;
use Cdefoe\LaravelCoinbase\CoinbaseClient;

class CoinbaseClientTest extends BaseTestCase
{
    public function test_can_send_get_request()
    {
        // Arrange
        $mockResponse = new MockHandler([
            new Response(
                200,
                ['X-Foo' => 'Bar'],
                json_encode(['foo' => 'bar'])
            ),
        ]);
        $handler = HandlerStack::create($mockResponse);
        $client = new Client(['handler' => $handler]);

        $coinbaseClient = new CoinbaseClient($client);

        // Act
        $response = $coinbaseClient->get('test');

        // Assert
        $this->assertEquals(['foo' => 'bar'], $response);
    }
}
