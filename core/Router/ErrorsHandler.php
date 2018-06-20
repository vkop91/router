<?php

namespace Core\Router;

use Core\Logs;

trait ErrorsHandler
{
    /**
     * Вывод ошибки в случае, если не установлен роут
     */
    private function notFoundRouteError ()
    {
        Logs::alert( "Не найдена страница." . PHP_EOL . $this->helpInfo(), 404 );
    }

    /**
     * Вывод ошибки в случае, если не найден контроллер
     *
     * @param string $controllerName
     */
    private function notFoundControllerError ( string $controllerName )
    {
        Logs::alert( "Не найден контроллер $controllerName." . PHP_EOL . $this->helpInfo(), 404 );
    }

    /**
     * Вывод ошибки в случае, если не найден метод контроллера
     *
     * @param string $controllerName
     * @param string $method
     */
    private function notFoundMethodError ( string $controllerName, string $method )
    {
        Logs::alert( "Не найден метод $method контроллера $controllerName." . PHP_EOL . $this->helpInfo(), 404 );
    }

    private function helpInfo ()
    {
        return "Проверьте правильность роутов в файле routes.php" . PHP_EOL
               . "Роут должен быть вида /items/set/:item:/:id:?:params:";
    }
}
