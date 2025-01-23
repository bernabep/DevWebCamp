<?php

namespace Controllers;


use Model\Dia;
use Model\Hora;
use MVC\Router;
use Model\Categoria;

class EventosController
{
    public static function index(Router $router)
    {
    
        $router->render('/admin/eventos/index', [
            'titulo' => 'Conferencias y Workshops'
        ]);
    }

    public static function crear(Router $router){
        $alertas = [];
        $categorias = Categoria::all();    
        $dias = Dia::all('ASC');
        $horas = Hora::all('ASC');
                
        $router->render('admin/eventos/crear',[
            'alertas' => $alertas,
            'titulo' => 'Registrar Evento',
            'categorias' => $categorias,
            'dias' => $dias,
            'horas' => $horas
        ]);
    }
}
