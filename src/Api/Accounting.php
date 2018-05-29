<?php

namespace KoperasiIo\KoperasiApi\App;

use GuzzleHttp\Client as Http;

class Accounting extends AbstractApi
{

    /**
     * Create journal.
     *
     * @return object new journal.
     */
    public function addJournal($data)
    {
        return $this->post('v1/journals', $data);
    }

    /**
     * Get all accounts.
     *
     * @return object new journal.
     */
    public function getAllAccounts()
    {
        return $this->get('v1/user/accounts/all');
    }
}
