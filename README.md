# koperasi-api

repository ini adalah private package SDK API untuk semua aplikasi koperasi.io

## Install

Install via composer

Before install make sure you add repository config for change source package from private repository.


````
"repositories": [
{
    "type": "vcs",
        "url":  "git@bitbucket.org:koperasi-io/koperasi-api.git"
    }
],
````

Install package


````
composer require "koperasi-io/koperasi-api: 1.*"
````

Add service provider to **config/app.php**


````
KoperasiIo\KoperasiApi\ServiceProvider::class,
````


Add Facade


````
KoperasiApi => KoperasiIo\KoperasiApi\Facade::class,
````


## Configuration


publish config


````
php artisan publish:vendor --package='KoperasiIo\KoperasiApi\ServiceProvider'

````

**config/koperasi-api.php**

````
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
````


**Note**:
Change url of API endpoint if necesary


## Generate Personal Access Client


go to each koperasi.io application manage apis (/settings/apis/client) and create personal access token then put personal access token to config variable


## Usage Example


````
// get users data from user app
$users = KoperasiApi::user()->getUsers();

// get members data from user app
$members = KoperasiApi::user()->getMembers();

````


## Todo
1. setup exception
2. create testing
3. add more endpoints