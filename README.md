# Laravel Coinbase
[![Laravel](https://img.shields.io/badge/Laravel-6.0-orange.svg?style=flat-square)](http://laravel.com)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/ChanningDefoe/laravel-coinbase/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/ChanningDefoe/laravel-coinbase/?branch=master)
[![Code Coverage](https://scrutinizer-ci.com/g/ChanningDefoe/laravel-coinbase/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/ChanningDefoe/laravel-coinbase/?branch=master)
[![License](https://poser.pugx.org/cdefoe/laravel-coinbase/license)](https://packagist.org/packages/cdefoe/laravel-coinbase)
[![CircleCI](https://circleci.com/gh/ChanningDefoe/laravel-coinbase.svg?style=svg)](https://circleci.com/gh/ChanningDefoe/laravel-coinbase)

A package for using the Coinbase Developer APIs and Coinbase PRO APIs. This package is still a work in progress. Feel free to make PRs.

## Installation

You can install the package via composer:

```bash
composer require cdefoe/laravel-coinbase
```

### Laravel Installation

Add the service provider and alias to your `config/app.php` file:

```php
// Coinbase APIS
Cdefoe\LaravelCoinbase\Providers\LaravelCoinbaseServiceProvider::class
'LaravelCoinbase' => Cdefoe\LaravelCoinbase\Facades\LaravelCoinbaseFacade::class

// Coinbase Pro APIS
Cdefoe\LaravelCoinbase\Providers\LaravelCoinbaseServiceProvider::class
'LaravelCoinbasePro' => Cdefoe\LaravelCoinbase\Facades\LaravelCoinbaseProFacade::class
```

### Configuration
Publish a config file using the `artisan` command:
```bash
php artisan vendor:publish
```
This will publish a `laravel-coinbase.php` file where you can update your settings

## Usage

This package inclues usage for both of Coinbase's public APIs.

### Coinbase API
The coinbase REST API to integrate bitcoin, bitcoin cash, litecoin and ethereum payments. [View Introduction Docs](https://developers.coinbase.com/api/v2#introduction).

#### Market Data
View [Market Data Endpoints](https://developers.coinbase.com/api/v2#data-endpoints).

##### Get Currencies
[https://developers.coinbase.com/api/v2#get-currencies](https://developers.coinbase.com/api/v2#get-currencies).

``` php
LaravelCoinbase::currencies();
```

##### Get Exchange Rates
[https://developers.coinbase.com/api/v2#get-exchange-rates](https://developers.coinbase.com/api/v2#get-exchange-rates).

``` php
// Default: USD
LaravelCoinbase::exchangeRates();
// Get a different currency
LaravelCoinbase::exchangeRates('EUR');
```

##### Get Buy Price
Get the buy price for a currency pair. [https://developers.coinbase.com/api/v2#get-buy-price](https://developers.coinbase.com/api/v2#get-buy-price).

``` php
// Default: BTC-USD
LaravelCoinbase::getBuyPrice();
// Get a different currency
LaravelCoinbase::getBuyPrice('BTC-EUR');
```

##### Get Sell Price
Get the sell price for a currency pair. [https://developers.coinbase.com/api/v2#get-sell-price](https://developers.coinbase.com/api/v2#get-sell-price).

``` php
// Default: BTC-USD
LaravelCoinbase::getSellPrice();
// Get a different currency
LaravelCoinbase::getSellPrice('BTC-EUR');
```

##### Get Spot Price
Get the spot price for a currency pair. [https://developers.coinbase.com/api/v2#get-spot-price](https://developers.coinbase.com/api/v2#get-spot-price).

``` php
// Default: BTC-USD
LaravelCoinbase::getSpotPrice();
// Get a different currency
LaravelCoinbase::getSpotPrice('BTC-EUR');
// Get spot price for a previous data in YYYY-MM-DD format
LaravelCoinbase::getSpotPrice('BTC-USD', '2017-01-01');
```

### Coinbase PRO API

#### Market Data

The [Market Data endpoints](https://docs.pro.coinbase.com/?php#market-data) from the Coinbase Pro API.

##### Get Products Data
Get a list of available currency pairs for trading. [https://docs.pro.coinbase.com/?php#get-products](https://docs.pro.coinbase.com/?php#get-products).
``` php
LaravelCoinbasePro::products();
```

##### Get Products Order Book
Get a list of open orders for a product. The amount of detail shown can be customized with the level parameter. [https://docs.pro.coinbase.com/?php#get-product-order-book](https://docs.pro.coinbase.com/?php#get-product-order-book).
``` php
LaravelCoinbasePro::productOrderBook('BTC-USD');
// Get products order book with level. Levels are 1, 2, and 3.
LaravelCoinbasePro::productOrderBook('BTC-USD', 2);
```

##### Get Products Ticker
Snapshot information about the last trade (tick), best bid/ask and 24h volume. [https://docs.pro.coinbase.com/?php#get-product-ticker](https://docs.pro.coinbase.com/?php#get-product-ticker).
``` php
// Available levels are 1,2 and 3
LaravelCoinbasePro::productOrderBook('BTC-USD', 2);
```

##### Get Product Trades
List the latest trades for a product on coinbase. [https://docs.pro.coinbase.com/?php#get-trades](https://docs.pro.coinbase.com/?php#get-trades).

This request is paginated so you will have to append the `getBody()` function after the initial request to get the body. You can also use the `getAfter()` and `getBefore()` functions followed by `getBody()` to make requests after the initial request. You can stack the `getAfter` and `getBefore` requests as many times as you need.

``` php
$getProductTrades = LaravelCoinbasePro::productTrades('BTC-USD');
// Get body of request
$response = $getProductTrades->getBody();
// Get response after or before
$response = $getProductTrades->getAfter()->getBody();
$response = $getProductTrades->getBefore()->getBody();
```

### Testing and Styling

Running PHPUnit Tests:

``` bash
composer test
```

Creating code coverage reports:

``` bash
composer test-coverage
```

Automatic code styles fixer

``` bash
composer php-cs-fixer
```

### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

### Security

If you discover any security related issues, please email channingdefoe@gmail.com instead of using the issue tracker.

## Credits

- [Channing Defoe](https://github.com/cdefoe)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
