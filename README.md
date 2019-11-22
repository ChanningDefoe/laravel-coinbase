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

##### Get Currencies
``` php
LaravelCoinbase::currencies();
```

##### Get Currencies
``` php
// Default: USD
LaravelCoinbase::exchangeRates();
// Get a different currency
LaravelCoinbase::exchangeRates('EUR');
```

### Coinbase PRO API

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
