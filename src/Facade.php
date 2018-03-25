<?php

namespace KoperasiIo\KoperasiApi;

use KoperasiIo\KoperasiApi\KoperasiApi;
use Illuminate\Support\Facades\Facade as IlluminateFacade;

class Facade extends IlluminateFacade
{
    protected static function getFacadeAccessor() 
    { 
        return KoperasiApi::class; 
    }
}