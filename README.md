# Laravel Coinbase
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/ChanningDefoe/laravel-coinbase/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/ChanningDefoe/laravel-coinbase/?branch=master)
[![Code Coverage](https://scrutinizer-ci.com/g/ChanningDefoe/laravel-coinbase/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/ChanningDefoe/laravel-coinbase/?branch=master)

Description coming soon

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

### Coinbase PRO API

#### Market Data

##### Get Products Data
``` php
LaravelCoinbasePro::products();
```

##### Get Products Order Book
``` php
LaravelCoinbasePro::productOrderBook('BTC-USD');
```

##### Get Products Order Book with Level
``` php
// Available levels are 1,2 and 3
LaravelCoinbasePro::productOrderBook('BTC-USD', 2);
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
