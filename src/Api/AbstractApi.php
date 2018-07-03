<?php

namespace KoperasiIo\KoperasiApi\Api;

use KoperasiIo\KoperasiApi\KoperasiApi;
use KoperasiIo\KoperasiApi\ResponseApi;

abstract class AbstractApi
{

    protected $client;

    /**
     * The requested page (GitHub pagination).
     *
     * @var null|int
     */
    private $page;

    /**
     * @param KoperasiApi $client
     */
    public function __construct(KoperasiApi $client)
    {
        $this->client = $client;
    }

    /**
     * Send a GET request with query parameters.
     *
     * @param string $path           Request path.
     * @param array  $parameters     GET parameters.
     * @param array  $requestHeaders Request Headers.
     *
     * @return array|string
     */
    protected function get($path, array $parameters = [], array $requestHeaders = [])
    {
        $options = [];

        if (null !== $this->page && !isset($parameters['page'])) {
            $parameters['page'] = $this->page;
        }

        if (count($parameters) > 0) {
            $path .= '?'.http_build_query($parameters);
        }

        if (!empty($requestHeaders)) {
            $options['headers'] = $requestHeaders;
        }

        $response = $this->client->getHttpClient()->request('GET', $path, $options);

        return ResponseApi::getContent($response);
    }

    protected function getPaginate($path, array $parameters = [], array $requestHeaders = [])
    {
        $response = $this->get($path, $parameters, $requestHeaders);

        return ResponseApi::paginate($response);
    }

    /**
     * Send a POST request with JSON-encoded parameters.
     *
     * @param string $path           Request path.
     * @param array  $parameters     POST parameters to be JSON encoded.
     * @param array  $requestHeaders Request headers.
     *
     * @return array|string
     */
    protected function post($path, array $parameters = [], array $requestHeaders = [])
    {
        try {
            $response = $this->client->getHttpClient()->request(
                'POST',
                $path,
                [
                    'json' => $parameters,
                    'headers' => $requestHeaders
                ]
            );
        } catch (\GuzzleHttp\Exception\ClientException $exception) {
            $response = $exception->getResponse();
        }

        return ResponseApi::getContent($response);
    }

    /**
     * Send a PUT request with JSON-encoded parameters.
     *
     * @param string $path           Request path.
     * @param array  $parameters     POST parameters to be JSON encoded.
     * @param array  $requestHeaders Request headers.
     *
     * @return array|string
     */
    protected function put($path, array $parameters = [], array $requestHeaders = [])
    {
        try {
            $response = $this->client->getHttpClient()->request(
                'PUT',
                $path,
                [
                    'json' => $parameters,
                    'headers' => $requestHeaders
                ]
            );
        } catch (\GuzzleHttp\Exception\ClientException $exception) {
            $response = $exception->getResponse();
        }

        return ResponseApi::getContent($response);
    }
}
