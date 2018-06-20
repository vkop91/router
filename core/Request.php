<?php

namespace Core;

class Request
{
    /**
     * @var Request
     */
    private static $instance;

    /**
     * @var string текущий Url
     */
    private static $uri = '';

    private function __construct ()
    {

    }

    /**
     * @return Request
     */
    public static function getInstance (): Request
    {
        if ( self::$instance ) {
            return self::$instance;
        }

        self::$instance = new self();

        // Получаем данные из глобальных переменных
        self::$uri = $_SERVER[ 'REQUEST_URI' ];

        return self::$instance;
    }

    private function __clone ()
    {

    }

    private function __wakeup ()
    {

    }

    /**
     * Url
     *
     * @return string
     */
    public function getUri (): string
    {
        return self::$uri;
    }
}
