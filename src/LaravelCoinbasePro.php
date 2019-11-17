<?php

namespace Cdefoe\LaravelCoinbase;

class LaravelCoinbasePro
{
    /**
     * @var CoinbaseClient The Coinbase HttpClient.
     */
    public $coinbaseClient;

    public function __construct(CoinbaseClient $coinbaseClient)
    {
        $this->coinbaseClient = $coinbaseClient;
    }

    /**
     * Get products.
     *
     * @return array
     */
    public function products()
    {
        return $this->coinbaseClient->get('products');
    }
}
