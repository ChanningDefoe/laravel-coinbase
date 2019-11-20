<?php

namespace Cdefoe\LaravelCoinbase\Resources;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\Psr7\Stream;

class ProPaginationResponse
{
    /**
     * @var Client The httpClient.
     */
    public $client;

    /**
     * @var string The path of the origin request.
     */
    public $path;

    /**
     * @var string The request method.
     */
    public $method;

    /**
     * @var Response The response returned from the request.
     */
    public $response;

    /**
     * @var array The response headers.
     */
    public $headers;

    /**
     * @var Stream The body.
     */
    public $body;

    /**
     * Construct the ProPaginationResponse class.
     * 
     * @param Client $client The httpClient.
     * @param string $path The path of the original request.
     * @param Response $response The response returned from the request.
     * 
     * @return void
     */
    public function __construct(Client $client, string $path, string $method, Response $response)
    {
        $this->client = $client;
        $this->path = $path;
        $this->method = $method;
        $this->response = $response;
        $this->headers = $response->getHeaders();
        $this->body = $response->getBody();

        dd($this->getAfter());
    }

    /**
     * Get body of request.
     * 
     * @return array
     */
    public function getBody()
    {
        return json_decode($this->body, true);
    }

    /**
     * 
     */
    public function getBefore()
    {
        $response = $this->client->request($this->method, $this->path, [
            'query' => [
                'before' => $this->headers['cb-before']
            ]
        ]);

        return new ProPaginationResponse($this->client, $this->path, $this->method, $response);
    }

    public function getAfter()
    {
        $response = $this->client->request($this->method, $this->path, [
            'query' => [
                'after' => $this->headers['cb-after']
            ]
        ]);

        $test = new ProPaginationResponse($this->client, $this->path, $this->method, $response);
    }
}