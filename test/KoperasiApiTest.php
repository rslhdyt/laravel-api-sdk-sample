<?php

namespace KoperasiIo\KoperasiApi;

use GuzzleHttp\Client;
use KoperasiIo\KoperasiApi\KoperasiApi;
use Illuminate\Pagination\LengthAwarePaginator;

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

    /**
     * @test
     */
    public function shouldReturnPaginator()
    {
        $responsePaginator = ResponseApi::paginate([
            'per_page' =>  15,
            'data' => []
        ]);

        $this->assertInstanceOf(LengthAwarePaginator::class, $responsePaginator);
    }
}
