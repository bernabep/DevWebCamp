<?php

namespace Controllers;

use MVC\Router;

class DashboardController
{
    public static function index(Router $router)
    {

        $router->render('/admin/dashboard', [
            'titulo' => 'Panel de Administración'
        ]);
    }
}
