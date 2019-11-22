<?php

namespace Cdefoe\LaravelCoinbase;

use Cdefoe\LaravelCoinbase\Resources\ProPaginationResponse;

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
     * https://docs.pro.coinbase.com/#get-products
     *
     * @return array
     */
    public function products()
    {
        return $this->coinbaseClient->get('products');
    }

    /**
     * Get product order book.
     *
     * https://docs.pro.coinbase.com/#get-product-order-book
     *
     * @param string $productId The product id.
     * @param int $level (optional) The level, default = 1.
     *
     * @return array
     */
    public function productOrderBook($productId, $level = 1)
    {
        return $this->coinbaseClient->get("products/{$productId}/book", [
            'query' => [
                'level' => $level,
            ],
        ]);
    }

    /**
     * Get product ticker.
     *
     * https://docs.pro.coinbase.com/#get-product-ticker
     *
     * @param string $productId The product id.
     *
     * @return array
     */
    public function productTicker($productId)
    {
        return $this->coinbaseClient->get("products/{$productId}/ticker");
    }

    /**
     * Get product trades, lists latest trades for product id.
     *
     * @param string $productId The product id.
     *
     * @return ProPaginationResponse
     */
    public function productTrades($productId)
    {
        return $this->coinbaseClient->getProPagination("products/{$productId}/trades");
    }
}
