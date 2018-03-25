<?php

namespace KoperasiIo\KoperasiApi;

use KoperasiIo\KoperasiApi\App\User;
use KoperasiIo\KoperasiApi\App\Accounting;

class KoperasiApi 
{

    private $baseUrls = [];

    private $tokens = [];

    public function __construct($config)
    {
        $this->parseConfig($config);
    }

    /**
     * Instance user endpoint
     * 
     * @return object
     */
    public function user()
    {
        return new User($this->baseUrls['user'], $this->tokens['user']);
    } 

    /**
     * Instance accounting endpoint
     * 
     * @return object
     */
    public function user()
    {
        return new Accounting($this->baseUrls['accounting'], $this->tokens['accounting']);
    }

    private function parseConfig(Array $config)
    {
        foreach ($config as $key => $value) {
            $this->baseUrls[$key] = $value['url'];
            $this->tokens[$key] = $value['token'];
        }
    }

}