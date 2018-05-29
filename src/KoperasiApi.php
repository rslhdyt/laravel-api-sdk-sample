<?php

namespace KoperasiIo\KoperasiApi;

use GuzzleHttp\Client;
use KoperasiIo\KoperasiApi\Api\User;
use KoperasiIo\KoperasiApi\Api\Accounting;

class KoperasiApi
{
    /**
     * @var Builder
     */
    private $http;

    private $baseUrl = 'http://user.koperasi.io/';

    private $apiPrefix = 'api';

    private $config;

    /**
     * Instantiate a new GitHub client.
     *
     * @param Client|null $http
     */
    public function __construct($config = [])
    {
        $this->config = $config;

        if (isset($config['user']['url'])) {
            $this->setBaseUrl($config['user']['url']);
        }

        if (isset($config['api_prefix'])) {
            $this->setApiPrefix($config['api_prefix']);
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

    protected function getApiPrefix()
    {
        return $this->apiPrefix;
    }

    protected function setApiPrefix($apiPrefix)
    {
        $this->apiPrefix = $apiPrefix;

        return $this;
    }

    protected function getBaseUrl()
    {
        $baseUrl = $this->baseUrl . '/' . $this->getApiPrefix() . '/';

        return preg_replace('~(?<!https:|http:)[/\\\\]+~', '/', trim($baseUrl));
    }

    protected function setBaseUrl($baseUrl)
    {
        $this->baseUrl = $baseUrl;

        return $this;
    }
}
