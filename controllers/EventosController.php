<?php

namespace Controllers;

use Model\Dia;
use Model\Hora;
use MVC\Router;
use Model\Evento;
use Model\Ponente;
use Model\Categoria;
use Classes\Paginacion;

class EventosController
{
    public static function index(Router $router)
    {
        $total = Evento::total();
        if ($total > 0) {
            $pagina_actual = $_GET['page'];
            $pagina_actual = filter_var($pagina_actual, FILTER_VALIDATE_INT);
            if (!$pagina_actual || $pagina_actual < 0) {
                header('Location: /admin/eventos?page=1');
            }
        }
        $registros_por_pagina = 10;
        $paginacion = new Paginacion($pagina_actual,$registros_por_pagina,$total);
        $eventos = Evento::paginar($registros_por_pagina,$paginacion->offset());
        foreach($eventos as $evento){
            $evento->categoria = Categoria::find($evento->categoria_id); 
            $evento->hora = Hora::find($evento->hora_id); 
            $evento->dia = Dia::find($evento->dia_id); 
            $evento->ponente = Ponente::find($evento->ponente_id); 
        }
        // debuguear($evento);
        
        $router->render('/admin/eventos/index', [
            'titulo' => 'Conferencias y Workshops',
            'eventos' => $eventos,
            'paginacion' => $paginacion->paginacion()
        ]);
    }

    public static function crear(Router $router)
    {
        $alertas = [];
        $categorias = Categoria::all();
        $dias = Dia::all('ASC');
        $horas = Hora::all('ASC');
        $evento = new Evento;

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $evento->sincronizar($_POST);
            $alertas = $evento->validar();
            if (empty($alertas)) {
                $resultado = $evento->guardar();

                if ($resultado) {
                    header('Location: /admin/eventos');
                }
            }
        }

        $router->render('admin/eventos/crear', [
            'alertas' => $alertas,
            'titulo' => 'Registrar Evento',
            'categorias' => $categorias,
            'dias' => $dias,
            'horas' => $horas,
            'evento' => $evento
        ]);
    }

    public static function editar(Router $router)
    {
        $alertas = [];
        $id = $_GET['id'];
        $id = filter_var($id,FILTER_VALIDATE_INT);

        if(!$id){
            header('Location: /admin/eventos');
        }

        $categorias = Categoria::all();
        $dias = Dia::all('ASC');
        $horas = Hora::all('ASC');
        $evento = Evento::find($id);

        if(!$evento){
            header('Location: /admin/eventos');
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $evento->sincronizar($_POST);
            $alertas = $evento->validar();
            if (empty($alertas)) {
                $resultado = $evento->guardar();

                if ($resultado) {
                    header('Location: /admin/eventos');
                }
            }
        }

        $router->render('admin/eventos/editar', [
            'alertas' => $alertas,
            'titulo' => 'Editar Evento',
            'categorias' => $categorias,
            'dias' => $dias,
            'horas' => $horas,
            'evento' => $evento
        ]);
    }
}
