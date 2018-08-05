<?php

namespace KoperasiIo\KoperasiApi;

use Illuminate\Pagination\LengthAwarePaginator;

class ResponseApi
{
    public static function getContent($response)
    {
        $body = $response->getBody()->__toString();
        
        if (strpos($response->getHeaderLine('Content-Type'), 'application/json') === 0) {
            $content = json_decode($body, true);

            if (JSON_ERROR_NONE === json_last_error()) {
                return $content;
            }
        }

        return $body;
    }

    public static function paginate($responseData)
    {
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $dataCollection = collect($responseData['data']);
        $perPage = !empty($responseData['per_page']) ? $responseData['per_page'] : $responseData['meta']['per_page'];

        $currentPageSearchResults = $dataCollection->all();
        $paginator = new LengthAwarePaginator($currentPageSearchResults, $responseData['total'], $perPage);
        $paginator->setPath($responseData['path']);

        return $paginator;
    }
}
