<?php

namespace KoperasiIo\KoperasiApi;

use KoperasiIo\KoperasiApi\KoperasiApi;
use Illuminate\Support\Facades\Facade;

class Facade extends Facade
{
    protected static function getFacadeAccessor() 
    { 
        return KoperasiApi::class; 
    }
}