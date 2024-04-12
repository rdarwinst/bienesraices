<?php

namespace MVC;

class Router
{

    public $rutasGET = [];
    public $rutasPOST = [];

    public function get($url, $fn)
    {
        $this->rutasGET[$url] = $fn;
    }
    public function post($url, $fn)
    {
        $this->rutasPOST[$url] = $fn;
    }

    public function comprobarRutas()
    {
        session_start();
        $auth = $_SESSION['login'] ?? null;

        // Arreglo de rutas protegidas
        $rutas_protegidas = ['/admin', '/propiedades/crear', '/propiedades/actualizar', '/propiedades/eliminar', '/vendedores/crear', '/vendedores/actualizar', '/vendedores/eliminar', '/entradas/crear', '/entradas/actualizar', '/entradas/eliminar'];
        $urlActual = $_SERVER['PATH_INFO'] ?? '/';
        $metodo = $_SERVER['REQUEST_METHOD'];

        if ($metodo === 'GET') {
            $fn = $this->rutasGET[$urlActual] ?? null;
        } else {

            $fn = $this->rutasPOST[$urlActual] ?? null;
        }

        if (in_array($urlActual, $rutas_protegidas) && !$auth) {

            $urlRedirigir = 'http://' . $_SERVER['HTTP_HOST'] . '/';
            header('Location: ' . $urlRedirigir);
        }

        if ($fn) {
            // La URL existe y hay una función asociada.
            call_user_func($fn, $this);
        } else {
            include __DIR__ . '/views/pages/error.php';
        }
    }

    public function render($view, $datos = [])
    {
        foreach ($datos as $key => $value) {
            $$key = $value;
        }
        ob_start(); // Almacenamiento en memoria temporalmente
        include __DIR__ . "/views/{$view}.php";
        $contenido = ob_get_clean(); // Limpia el buffer
        include __DIR__ . "/views/layout.php";
    }
}
