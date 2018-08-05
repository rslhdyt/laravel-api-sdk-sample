<?php

namespace KoperasiIo\KoperasiApi\Api;

class Finance extends AbstractApi
{
    /**
     * Initial deposit members.
     *
     * @return array response init deposit.
     */
    public function initDeposit($memberId)
    {
        return $this->post('v1/finance/deposits/' . $memberId . '/initial');
    }
}
