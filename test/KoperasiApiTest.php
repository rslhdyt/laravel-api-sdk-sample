<?php

namespace KoperasiIo\KoperasiApi;

use GuzzleHttp\Client;
use KoperasiIo\KoperasiApi\KoperasiApi;

class KoperasiApiTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @test
     */
    public function shouldReturnGuzzleInstance()
    {
        $koperasiApi = new KoperasiApi();

        $this->assertInstanceOf(Client::class, $koperasiApi->getHttpClient());
    }
}
