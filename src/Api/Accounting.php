<?php

namespace KoperasiIo\KoperasiApi\Api;

class Accounting extends AbstractApi
{

    /**
     * Create journal.
     *
     * @return object new journal.
     */
    public function addJournal($data)
    {
        return $this->post('v1/accounting/journals', $data);
    }

    /**
     * Get all accounts.
     *
     * @return object new journal.
     */
    public function getAllAccounts()
    {
        return $this->get('v1/accounting/accounts/all');
    }

    /**
     * Get all accounts.
     *
     * @return object new journal.
     */
    public function getAccounts()
    {
        return $this->getPaginate('v1/accounting/accounts');
    }
}
