<?php

namespace Controllers;

use Classes\Paginacion;
use MVC\Router;
use Model\Ponente;
use Intervention\Image\ImageManagerStatic as Image;

class PonentesController
{
    public static function index(Router $router)
    {
        if(!is_admin()){
            header('Location: /login');
        }
        $total = Ponente::total();
        if($total>0){
            $pagina_actual = $_GET['page'];
            $pagina_actual = filter_var($pagina_actual,FILTER_VALIDATE_INT);
            if(!$pagina_actual || $pagina_actual<0){
                header('Location: /admin/ponentes?page=1');
            }
    
            $registros_por_pagina = 10;
            
            $paginacion = new Paginacion($pagina_actual,$registros_por_pagina,$total);
            if($paginacion->total_paginas()<$pagina_actual){
                header('Location: /admin/ponentes?page=1');
            }
            $ponentes = Ponente::paginar($registros_por_pagina,$paginacion->offset());
            $resultado_paginacion = $paginacion->paginacion();
        }else{
            $ponentes = [];
            $resultado_paginacion = null;
        }
        

        $router->render('/admin/ponentes/index', [
            'titulo' => 'Ponentes / Conferencistas',
            'ponentes' => $ponentes,
            'paginacion' => $resultado_paginacion
        ]);
    }

    public static function crear(Router $router)
    {
        if(!is_admin()){
            header('Location: /login');
        }
        $alertas = [];
        $ponente = new Ponente;

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if(!is_admin()){
                header('Location: /login');
            }
            //leer imagen del formulario
            if (!empty($_FILES['imagen']['tmp_name'])) {
                $carpeta_imagenes = '../public/img/speakers';

                //crear la carpeta si no existe
                if (!is_dir($carpeta_imagenes)) {
                    mkdir($carpeta_imagenes, 0755, true);
                }

                $imagen_png = Image::make($_FILES['imagen']['tmp_name'])->fit(800, 800)->encode('png', 80);
                $imagen_webp = Image::make($_FILES['imagen']['tmp_name'])->fit(800, 800)->encode('webp', 80);

                $nombre_imagen = md5(uniqid(rand(), true));
                $_POST['imagen'] = $nombre_imagen;
            }

            $_POST['redes'] = json_encode($_POST['redes'], JSON_UNESCAPED_SLASHES);

            $ponente->sincronizar($_POST);
            $alertas = $ponente->validar();

            if (empty($alertas)) {
                //Guardar la imagen
                $imagen_png->save($carpeta_imagenes . '/' . $nombre_imagen . '.png');
                $imagen_webp->save($carpeta_imagenes . '/' . $nombre_imagen . '.webp');

                // Guardar el registro
                $resultado = $ponente->guardar();
                if ($resultado) {
                    header('Location: /admin/ponentes');
                }
            }
        }

        $router->render('/admin/ponentes/crear', [
            'titulo' => 'Registrar Ponente',
            'alertas' => $alertas,
            'ponente' => $ponente,
            'redes' => json_decode($ponente->redes)
        ]);
    }
    public static function editar(Router $router)
    {
        if(!is_admin()){
            header('Location: /login');
        }
        $alertas = [];

        //Validar
        $id = $_GET['id'];
        $id = filter_var($id, FILTER_VALIDATE_INT);

        if (!$id) {
            header('Location: /admin/ponentes');
        }

        //Obtener ponente a Editar

        $ponente = Ponente::find($id);

        if (!$ponente) {
            header('Location: /admin/ponentes');
        }

        $ponente->imagen_actual = $ponente->imagen;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if(!is_admin()){
                header('Location: /login');
            }
            //leer imagen del formulario
            if (!empty($_FILES['imagen']['tmp_name'])) {
                $carpeta_imagenes = '../public/img/speakers';

                //crear la carpeta si no existe
                if (!is_dir($carpeta_imagenes)) {
                    mkdir($carpeta_imagenes, 0755, true);
                }

                $imagen_png = Image::make($_FILES['imagen']['tmp_name'])->fit(800, 800)->encode('png', 80);
                $imagen_webp = Image::make($_FILES['imagen']['tmp_name'])->fit(800, 800)->encode('webp', 80);

                $nombre_imagen = md5(uniqid(rand(), true));
                $_POST['imagen'] = $nombre_imagen;
            } else {
                $_POST['imagen'] = $ponente->imagen_actual;
            }

            $_POST['redes'] = json_encode($_POST['redes'], JSON_UNESCAPED_SLASHES);
            $ponente->sincronizar($_POST);
            
            $alertas = $ponente->validar();

            if (empty($alertas)) {
                if (isset($nombre_imagen)) {
    // Eliminar la imagen previa
                    unlink($carpeta_imagenes . '/' . $ponente->imagen_actual . ".png" );
                    unlink($carpeta_imagenes . '/' . $ponente->imagen_actual . ".webp" );
                    //Guardar la imagen
                    $imagen_png->save($carpeta_imagenes . '/' . $nombre_imagen . '.png');
                    $imagen_webp->save($carpeta_imagenes . '/' . $nombre_imagen . '.webp');
                }
                // Guardar el registro
                $resultado = $ponente->guardar();
                if ($resultado) {
                    header('Location: /admin/ponentes');
                }
            }
        }

        $router->render('/admin/ponentes/editar', [
            'titulo' => 'Actualizar Ponente',
            'alertas' => $alertas,
            'ponente' =>$ponente,
            'redes' => json_decode($ponente->redes)
        ]);
    }

    public static function eliminar(Router $router)
    {
        if(!is_admin()){
            header('Location: /login');
        }
        $alertas = [];
        $ponente = new Ponente;

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if(!is_admin()){
                header('Location: /login');
            }
            $id = $_POST['id'];
            $ponente = Ponente::find($id);

            if(!isset($ponente)){
                header('Location: /admin/ponentes');
            }
            
            $resultado = $ponente->eliminar();

            if($ponente->imagen){
                $carpeta_imagenes = '../public/img/speakers';
                unlink($carpeta_imagenes . '/' . $ponente->imagen . ".png" );
                unlink($carpeta_imagenes . '/' . $ponente->imagen . ".webp" );
            }
            if($resultado){
                header('Location: /admin/ponentes');
            }
            //leer imagen del formulario
            if (!empty($_FILES['imagen']['tmp_name'])) {
                $carpeta_imagenes = '../public/img/speakers';

                //crear la carpeta si no existe
                if (!is_dir($carpeta_imagenes)) {
                    mkdir($carpeta_imagenes, 0755, true);
                }

                $imagen_png = Image::make($_FILES['imagen']['tmp_name'])->fit(800, 800)->encode('png', 80);
                $imagen_webp = Image::make($_FILES['imagen']['tmp_name'])->fit(800, 800)->encode('webp', 80);

                $nombre_imagen = md5(uniqid(rand(), true));
                $_POST['imagen'] = $nombre_imagen;
            }

            $_POST['redes'] = json_encode($_POST['redes'], JSON_UNESCAPED_SLASHES);

            $ponente->sincronizar($_POST);
            $alertas = $ponente->validar();

            if (empty($alertas)) {
                //Guardar la imagen
                $imagen_png->save($carpeta_imagenes . '/' . $nombre_imagen . '.png');
                $imagen_webp->save($carpeta_imagenes . '/' . $nombre_imagen . '.webp');

                // Guardar el registro
                $resultado = $ponente->guardar();
                if ($resultado) {
                    header('Location: /admin/ponentes');
                }
            }
        }
    }
}
