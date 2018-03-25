<?php

namespace KoperasiIo\KoperasiApi\App;

use GuzzleHttp\Client as Http;

/**
 * Dummy API implementation.
 *
 * @version 1.0.0
 * @author  Gustavo Straube
 */
class User extends BaseClient
{

    /**
     * Crate a new client instance.
     *
     * The API uses basic authentication. The username and password are passed 
     * to the `auth` option of Guzzle HTTP client. This way they don't have to 
     * be stored inside the class, neither be manually passed to all API 
     * requests.
     *
     * @param string $username The API user username.
     * @param string $password The API user password.
     */
    public function __construct($baseUrl, $token)
    {
        $this->http = new Http([
            'base_uri' => $baseUrl,
            'headers' => [
                'Accept' => 'application/json',
                'Authorization' => 'Bearer ' . $token,
            ]
        ]);
    }

    /**
     * Get list user.
     *
     * @return object The user.
     */
    public function getUsers()
    {
        return $this->call('GET', '/v1/users');
    }

    /**
     * Get current API user.
     *
     * @return object The user.
     */
    public function getUser($userId)
    {
        return $this->call('GET', '/v1/users/' . $userId);
    }

}