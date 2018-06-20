<?php

ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

// Иницилизация основных классов
// Обработчик ошибок
require_once __DIR__ . '/../core/Logs.php';

// Обработчик http запроса
require_once __DIR__ . '/../core/Request.php';
$request = Core\Request::getInstance();

// Роутер
require_once __DIR__ . '/../core/Router/UrlHandler.php';
require_once __DIR__ . '/../core/Router/ErrorsHandler.php';
require_once __DIR__ . '/../core/Router/Router.php';
$routes = require_once __DIR__ . '/../routes.php';
$router = new Core\Router\Router( $routes );

// Контроллер
require_once __DIR__ . '/../core/Controller.php';


// Выполнение экшена
$response = $router->handle( $request );

print $response;
