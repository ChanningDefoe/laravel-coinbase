<?php

namespace Cdefoe\LaravelCoinbase;

class LaravelCoinbase
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
     * Get currencies.
     *
     * @return array
     */
    public function currencies()
    {
        return $this->coinbaseClient->get('currencies')['data'];
    }

    /**
     * Get exchange rates.
     *
     * @param string $currency The currency
     *
     * @return array
     */
    public function exchangeRates($currency = 'USD')
    {
        return $this->coinbaseClient->get('exchange-rates', ['currency' => $currency])['data'];
    }
}
