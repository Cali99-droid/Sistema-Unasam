<?php

namespace Controllers;

use MVC\Router;

class ReporteController
{
    public static function index(Router $router)
    {
        isAuth();
        $router->render('reporte/index', []);
    }
}
