<?php

namespace Core;

class Logs
{
    /**
     * Вывод ошибки. Прерывание программы.
     *
     * @param  string $message
     */
    static public function alert ( $message, $responseCode = 200 )
    {
        http_response_code( $responseCode );
        die( $message );
    }
}