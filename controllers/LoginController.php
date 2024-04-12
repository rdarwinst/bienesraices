<?php 

namespace Controllers;

use MVC\Router;
use Model\Admin;

class LoginController {
    public static function login(Router $router) {
        $errores = Admin::getErrores();        
        $metodo = $_SERVER['REQUEST_METHOD'];

        if($metodo === 'POST') {
            $auth = new Admin($_POST);

            $errores = $auth -> validarForm();

            if(empty($errores)) {
                // Verificar el Email
                $resultado = $auth -> existeUsuario();
                if(!$resultado) {
                    $errores = Admin::getErrores();
                } else {
                    // Verificar el Password
                    $autenticado = $auth -> comprobarPassword($resultado);

                    if($autenticado) {
                        // Autenticar al usuario
                        $auth -> autenticarUsuario();
                    } else {
                        $errores = Admin::getErrores();
                    }
                }
            }
        }

        $router -> render('auth/login', [
            'errores' => $errores            
        ]);
    }
    public static function logout()
{
    // Iniciar el búfer de salida para evitar cualquier salida antes de la redirección
    ob_start();

    // Iniciar la sesión si no está iniciada
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    // Destruir la sesión actual
    session_destroy();

    // Eliminar todas las variables de sesión
    $_SESSION = [];

    // Construir la URL de redirección absoluta
    $redirectUrl = 'http://' . $_SERVER['HTTP_HOST'] . '/';

    // Enviar la cabecera de redirección
    header('Location: ' . $redirectUrl);

    // Terminar la ejecución del script después de la redirección
    exit;

    // Limpiar el búfer de salida al final del script
    ob_end_flush();
}
}