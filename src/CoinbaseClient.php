<?php

namespace Cdefoe\LaravelCoinbase;

use GuzzleHttp\Client;
use Psr\Http\Message\ResponseInterface;
use Cdefoe\LaravelCoinbase\Resources\ProPaginationResponse;

class CoinbaseClient
{
    /**
     * @var Client The GuzzleHttp Client.
     */
    public $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    /**
     * Send Request
     *
     * @param string $method The method.
     * @param string $path The path.
     * @param array $params The params.
     *
     * @return array
     */
    public function request(string $method, string $path, array $params = []) : array
    {
        $response = $this->client->request(strtoupper($method), $path, $params);

        return json_decode($response->getBody(), true);
    }

    /**
     * Send Get Request
     *
     * @param string $path The path.
     * @param array $param The params.
     *
     * @return ResponseInterface
     */
    public function get(string $path, array $params = []) : array
    {
        return $this->request('GET', $path, $params);
    }

    /**
     * Send request to coinbase pro API with pagination.
     *
     * @param string $method The method.
     * @param string $path The path.
     * @param array $params The params.
     *
     * @return ProPaginationResponse
     */
    public function requestProPagination(string $method, string $path, array $params = []) : ProPaginationResponse
    {
        $response = $this->client->request(strtoupper($method), $path, $params);

        new ProPaginationResponse($this->client, $path, $method, $response);
    }

    /**
     * Send get request to coinbase pro API with pagination
     *
     * @param string $path The path.
     * @param array $param The params.
     *
     * @return ProPaginationResponse
     */
    public function getProPagination(string $path, array $params = []) : ProPaginationResponse
    {
        return $this->requestProPagination('GET', $path, $params);
    }
}
