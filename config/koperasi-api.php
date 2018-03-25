<?php

return [

    'user' => [
        'url' => env('KOPERASI_API_USER_URL', 'http://user.koperasi.localhost/api/'),
        'token' => env('KOPERASI_API_USER_TOKEN'),
    ],

    'accounting' => [
        'url' => env('KOPERASI_API_ACCOUNTING_URL', 'http://accounting.koperasi.localhost/api/'),
        'token' => env('KOPERASI_API_ACCOUNTING_TOKEN'),
    ],

    'inventory' => [
        'url' => env('KOPERASI_API_INVENTORY_URL', 'http://inventory.koperasi.localhost/api/'),
        'token' => env('KOPERASI_API_INVENTORY_TOKEN'),
    ],

    'finance' => [
        'url' => env('KOPERASI_API_FINANCE_URL', 'http://finance.koperasi.localhost/api/'),
        'token' => env('KOPERASI_API_FINANCE_TOKEN'),
    ],

];