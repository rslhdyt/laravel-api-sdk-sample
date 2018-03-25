<?php

namespace KoperasiIo\KoperasiApi;

use KoperasiIo\KoperasiApi\App\User;

class Client 
{

    private $baseUrls = [];

    private $tokens = [];

    public function __construct($config)
    {
        $this->parseConfig($config);
    }

    public function user()
    {
        return new User($this->baseUrls['user'], $this->tokens['user']);
    }

    private function parseConfig(Array $config)
    {
        foreach ($config as $key => $value) {
            $this->baseUrls[$key] = $value['url'];
            $this->tokens[$key] = $value['token'];
        }
    }

}