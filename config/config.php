<?php

/*
 * You can place your custom package configuration in here.
 */
return [
    // Coinbase API Settings
    'api' => [
        'url' => 'https://api.coinbase.com/v2/',
    ],

    // Coinbase PRO API Settings
    'proapi' => [
        'url' => env('COINBASE_PRO_URL'),
    ],
];
