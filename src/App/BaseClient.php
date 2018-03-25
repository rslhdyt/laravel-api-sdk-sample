<?php

namespace KoperasiIo\KoperasiApi\App;

use GuzzleHttp\Client as Http;

/**
 * Dummy API implementation.
 *
 * @version 1.0.0
 * @author  Gustavo Straube
 */
class BaseClient
{

    /**
     * The HTTP client instance.
     *
     * @var Http
     */
    protected $http;


    /**
     * Send a request to the API.
     *
     * @param  string $method The HTTP method.
     * @param  string $endpoint The endpoint.
     * @param  array $params The params to send with the request.
     * @return array|object The response as JSON.
     */
    protected function call($method, $endpoint, array $params = null)
    {
        $options = [];

        if (!empty($params)) {
            $options['json'] = $params;
        }

        $response = $this->http->request($method, $endpoint, $options);

        return json_decode($response->getBody());
    }
}