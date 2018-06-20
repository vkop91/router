<?php

namespace App\Controllers;

use Core\Controller;

class ItemsController extends Controller
{
    /**
     * Выполнение метода get
     *
     * @param string $item
     * @param string $id
     *
     * @return string
     */
    public function get ( string $item, string $id ): string
    {
        return "выполняется метод get(item: $item, id: $id) контроллера Items";
    }

    /**
     * Выполнение метода set
     *
     * @param string $item
     * @param string $id
     * @param string $params
     *
     * @return string
     */
    public function set ( string $item, string $id, string $params ): string
    {
        return "выполняется метод set(item: $item, id: $id, params: $params) контроллера Items";
    }
}
