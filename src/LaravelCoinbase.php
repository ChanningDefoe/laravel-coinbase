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
     * @param string $currency (optional) The currency.
     *
     * @return array
     */
    public function exchangeRates($currency = 'USD')
    {
        return $this->coinbaseClient->get('exchange-rates', [
            'query' => [
                'currency' => $currency,
            ],
        ])['data'];
    }

    /**
     * Get buy price.
     * 
     * @param string $currencyPair (optional) The currency pair.
     * 
     * @return array
     */
    public function getBuyPrice($currencyPair = 'BTC-USD')
    {
        return $this->coinbaseClient->get("prices/{$currencyPair}/buy")['data'];
    }

    /**
     * Get sell price.
     * 
     * @param string $currencyPair (optional) The currency pair.
     * 
     * @return array
     */
    public function getSellPrice($currencyPair = 'BTC-USD')
    {
        return $this->coinbaseClient->get("prices/{$currencyPair}/sell")['data'];
    }

    /**
     * Get spot price.
     * 
     * @param string $currencyPair (optional) The currency pair.
     * @param string $date (optional) The date in YYYY-MM-DD format.
     * 
     * @return array
     */
    public function getSpotPrice($currencyPair = 'BTC-USD', $date = null)
    {
        return $this->coinbaseClient->get("prices/{$currencyPair}/spot", [
            'query' => [
                'date' => $date,
            ],
        ])['data'];
    }
}
