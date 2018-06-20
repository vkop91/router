<?php

/**
 * Регистрация роутов
 */

return [
    '/resource/action' => 'ResourceController@action',
    '/items/get/:item:/:id:' => 'ItemsController@get',
    '/items/set/:item:/:id:?:params:' => 'ItemsController@set',
    '/items/pet/:item:/:id:' => 'ItemsController@pet',
];