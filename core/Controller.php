<?php

namespace Core;

abstract class Controller
{
    /**
     * Вызов экшена контроллера.
     *
     * @param  string $method
     * @param  array  $parameters
     *
     * @return mixed
     */
    public function callAction ( $method, $parameters )
    {
        return call_user_func_array( [ $this, $method ], $parameters );
    }
}
