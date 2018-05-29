<?php

namespace KoperasiIo\KoperasiApi;

use GuzzleHttp\Client;
use KoperasiIo\KoperasiApi\App\User;
use KoperasiIo\KoperasiApi\App\Accounting;

class KoperasiApi
{
    /**
     * @var Builder
     */
    private $http;

    private $baseUrl = 'http://user.koperasi.io/';

    /**
     * Instantiate a new GitHub client.
     *
     * @param Client|null $http
     */
    public function __construct($config = [])
    {
        if (isset($config['user']['url'])) {
            $this->setBaseUrl($config['user']['url']);
        }

        $this->http = new Client([
            'base_url' => $this->getBaseUrl()
        ]);
    }

    /**
     * Instance user endpoint
     *
     * @return object
     */
    public function user()
    {
        return new User($this);
    }

    /**
     * Instance accounting endpoint
     *
     * @return object
     */
    public function accounting()
    {
        return new Accounting($this);
    }

    /**
     * @return HttpMethodsClient
     */
    public function getHttpClient()
    {
        return $this->http;
    }

    protected function getBaseUrl()
    {
        return $this->baseUrl;
    }

    protected function setBaseUrl($baseUrl)
    {
        $this->baseUrl = $baseUrl;

        return $this;
    }
}
