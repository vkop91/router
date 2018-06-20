<?php

namespace Core\Router;

use Core\Logs;

trait UrlHandler
{
    /**
     * Возвращает идентификатор экшена
     *
     * @param string $originUrl
     * @param array  $routes
     * @param array  $params
     *
     * @return mixed
     */
    private function getRouteHandle ( string $originUrl, array $routes, array &$params ): string
    {
        $url    = trim( $originUrl, '/' );
        $handle = FALSE;

        foreach ( $routes as $route => $route_handle ) {
            preg_match_all( '/:(\w+):/', $route, $route_matches );

            $pattern = str_replace( $route_matches[ 0 ], '(\w+)', trim( $route, '/' ) );

            $pattern = str_replace( '?', "\?", $pattern );

            if ( !preg_match( "@^$pattern@", $url, $url_matches ) ) {
                continue;
            }

            $handle = $route_handle;

            // собираем параметры
            array_shift( $url_matches );

            foreach ( $route_matches[ 1 ] as $key => $field ) {
                $params[ $field ] = $url_matches[ $key ];
            }

            break;
        }

        return $handle;
    }
}
