<?php

namespace KoperasiIo\KoperasiApi\App;

use GuzzleHttp\Client as Http;

class Accounting extends BaseClient
{

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
     * Create journal.
     *
     * @return object new journal.
     */
    public function addJournal($data)
    {
        return $this->call('POST', 'v1/journals', $data);
    }

    /**
     * Get all accounts.
     *
     * @return object new journal.
     */
    public function getAllAccounts()
    {
        return $this->call('GET', 'v1/accounts/all');
    }

}