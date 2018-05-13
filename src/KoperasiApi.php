<?php

namespace KoperasiIo\KoperasiApi;

use KoperasiIo\KoperasiApi\App\User;
use KoperasiIo\KoperasiApi\App\Accounting;

class KoperasiApi 
{

    private $config;

    public function __construct($config)
    {
        $this->config = $config;
    }

    /**
     * Instance user endpoint
     * 
     * @return object
     */
    public function user()
    {
        $userConfig = array_get($this->config, 'user');

        return new User($this->getBaseUrl($userConfig['url']), $userConfig['personal_token']);
    } 

    /**
     * Instance accounting endpoint
     * 
     * @return object
     */
    public function accounting()
    {
        $accountingConfig = array_get($this->config, 'accounting');

        return new Accounting($this->getBaseUrl($accountingConfig['url']), $accountingConfig['personal_token']);
    }

    private function getBaseUrl($url)
    {
        $baseUrl = $url . '/' . $this->config['api_prefix'] . '/';

        return preg_replace('#/+#','/', $baseUrl);
    }

}