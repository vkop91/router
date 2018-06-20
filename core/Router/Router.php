<?php

namespace Core\Router;

use Core\Request;
use Core\Controller;
use Core\Router\ErrorsHandler;
use Core\Router\UrlHandler;

class Router
{
    use ErrorsHandler, UrlHandler;

    /**
     * Список роутов
     *
     * @var array
     */
    private $routes = [];

    /**
     * Router constructor.
     *
     * @param array $routes
     */
    public function __construct ( array $routes )
    {
        $this->routes = $routes;
    }

    /**
     * Выполнение запроса
     *
     * @param \Core\Request $request
     *
     * @return string
     */
    public function handle ( Request $request )
    {
        $parameters   = [];
        $route_handle = $this->getRouteHandle( $request->getUri(), $this->routes, $parameters );

        if ( !$route_handle ) {
            $this->notFoundRouteError();
        }

        $route_handle = explode( "@", $route_handle );
        $controllerName = $route_handle[ 0 ];
        $method = $route_handle[ 1 ];

        $controller   = $this->getController( $route_handle[ 0 ] );

        if ( !$controller ) {
            $this->notFoundControllerError( $controllerName );
        }

        if ( !method_exists( $controller, $method ) ) {
            $this->notFoundMethodError( $controllerName, $method );
        }

        return $controller->callAction( $method, $parameters );
    }

    /**
     * Подключаем нужный контроллер
     *
     * @param $controllerName
     *
     * @return Controller
     */
    private function getController ( $controllerName ): Controller
    {
        require_once __DIR__ . "/../../app/Controllers/$controllerName.php";

        $controllerName = "App\\Controllers\\" . $controllerName;

        return new $controllerName();
    }
}