<?php

namespace KoperasiIo\KoperasiApi\App;

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
        return $this->postRaw(
            $path,
            $this->createJsonBody($parameters),
            $requestHeaders
        );
    }

    /**
     * Send a POST request with raw data.
     *
     * @param string $path           Request path.
     * @param string $body           Request body.
     * @param array  $requestHeaders Request headers.
     *
     * @return array|string
     */
    protected function postRaw($path, $body, array $requestHeaders = [])
    {
        $response = $this->client->getHttpClient()->request(
            'POST',
            $path,
            [
                'body' => $body,
                'headers' => $requestHeaders
            ]
        );

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
        $response = $this->client->getHttpClient()->request(
            'PUT',
            $path,
            [
                'body' => $this->createJsonBody($parameters),
                'headers' => $requestHeaders
            ]
        );

        return ResponseApi::getContent($response);
    }

    /**
     * Create a JSON encoded version of an array of parameters.
     *
     * @param array $parameters Request parameters
     *
     * @return null|string
     */
    protected function createJsonBody(array $parameters)
    {
        return (count($parameters) === 0) ? null : json_encode($parameters, empty($parameters) ? JSON_FORCE_OBJECT : 0);
    }
}
