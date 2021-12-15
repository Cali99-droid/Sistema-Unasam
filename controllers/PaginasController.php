<?php

namespace Controllers;

use MVC\Router;

class PaginasController
{
    public static function noExiste(Router $router)
    {
        $router->renderLog('error/404', []);
    }
}
