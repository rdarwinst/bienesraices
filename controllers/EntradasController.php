<?php

namespace Controllers;

use Model\Entrada;
use MVC\Router;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class EntradasController
{
    public static function crear(Router $router)
    {
        $errores = Entrada::getErrores();
        $entrada = new Entrada;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $entrada = new Entrada($_POST['entrada']);

            $nombreImagen = md5(uniqid(rand(), true)) . ".jpg";

            $manager = new ImageManager(Driver::class);
            if ($_FILES['entrada']['tmp_name']['imagen']) {
                $image = $manager->read($_FILES['entrada']['tmp_name']['imagen']);
                $image = $image->cover(900, 600);
                $entrada->setImagen($nombreImagen);
            }

            $errores = $entrada->validarForm();

            if (empty($errores)) {
                if (!is_dir(CARPETA_IMAGENES)) {
                    mkdir(CARPETA_IMAGENES);
                }
                $image->save(CARPETA_IMAGENES . $nombreImagen);

                $entrada->guardar();
            }
        }
        $router->render('/entradas/crear', [
            'errores' => $errores,
            'entrada' => $entrada
        ]);
    }

    public static function actualizar(Router $router)
    {

        $id = validarORedireccionar('/admin');

        $errores = Entrada::getErrores();
        $entrada = Entrada::find($id);

        if ($_SERVER["REQUEST_METHOD"] === 'POST') {

            $args = $_POST['entrada'];
            $entrada->sincronizar($args);

            $errores = $entrada->validarForm();

            $nombreImagen = md5(uniqid(rand(), true)) . ".jpg";

            $manager = new ImageManager(Driver::class);

            if ($_FILES['entrada']['tmp_name']['imagen']) {
                $image = $manager->read($_FILES['entrada']['tmp_name']['imagen']);
                $image = $image->cover(900, 600);
                $entrada->setImagen($nombreImagen);
            }

            if (empty($errores)) {
                if ($_FILES['entrada']['tmp_name']['imagen']) {
                    $image->save(CARPETA_IMAGENES . $nombreImagen);
                }
                $entrada->guardar();
            }
        }

        $router->render('/entradas/actualizar', [
            'errores' => $errores,
            'entrada' => $entrada
        ]);
    }
    public static function eliminar() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
            $id = $_POST['id'];
            $id = filter_var($id, FILTER_VALIDATE_INT);
        
            if ($id) {
        
                $tipo = $_POST['tipo'];
                
                if(validarTipoContenido($tipo)) {
                    $entrada = Entrada::find($id);
                    $entrada -> eliminar();
                }                       
            }
        }
    }
}
