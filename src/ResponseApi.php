<?php

namespace KoperasiIo\KoperasiApi;

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
}
