<?php

namespace Controllers;

use Model\Entrada;
use MVC\Router;
use Model\Propiedad;
use PHPMailer\PHPMailer\PHPMailer;

class PaginasController
{

    public static function index(Router $router)
    {
        $propiedades = Propiedad::get(3);
        $entradas = Entrada::get(2);
        $inicio = true;

        $router->render('pages/index', [
            'propiedades' => $propiedades,
            'inicio' => $inicio,
            'entradas' => $entradas
        ]);
    }
    public static function nosotros(Router $router)
    {
        $router->render('pages/nosotros');
    }
    public static function propiedades(Router $router)
    {
        $propiedades = Propiedad::all();
        $router->render('pages/propiedades', [
            'propiedades' => $propiedades
        ]);
    }
    public static function propiedad(Router $router)
    {
        $id = validarORedireccionar('/propiedades');

        $propiedad = Propiedad::find($id);
        $router->render('pages/propiedad', [
            'propiedad' => $propiedad
        ]);
    }
    public static function blog(Router $router)
    {
        $entradas = Entrada::all();
        $router->render('pages/blog', [
            'entradas' => $entradas
        ]);
    }
    public static function entrada(Router $router)
    {
        $id = validarORedireccionar('/blog');
        $entrada = Entrada::find($id);
        $router->render('pages/entrada', [
            'entrada' => $entrada
        ]);
    }
    public static function contacto(Router $router)
    {
        $mensaje = null;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $respuestas = $_POST['contacto'];

            // Crear un instacia de php mailer
            $mail = new PHPMailer();

            // Configurar SMTP
            $mail->isSMTP();
            $mail->Host = 'sandbox.smtp.mailtrap.io';
            $mail->SMTPAuth = true;
            $mail->Port = 2525;
            $mail->Username = '23e4a27c8f08f6';
            $mail->Password = 'aaaba31fa04c22';
            $mail->SMTPSecure = 'tls';

            // COnfigurar el contenido del email
            $mail->setFrom('admin@bienesraices.com');
            $mail->addAddress('admin@bienesraices.com', 'BienesRaices.com');
            $mail->Subject = 'Tienes un nuevo mensaje de BienesRaices';

            // Habilitar HTML 
            $mail->isHTML(true);
            $mail->CharSet = 'UTF-8';

            // DEfinir el contenido

            $contenido = '<html>';
            $contenido .= '<p>Tienes un nuevo mensaje</p>';
            $contenido .= '<p><b>Nombre: </b>' . $respuestas['nombre'] . '</p>';
            if($respuestas['contacto'] === 'telefono') {
                $contenido .= '<p><b>La persona eligió ser contactada por via telefónica.</b></p>';
                $contenido .= '<p><b>Teléfono: </b>' . $respuestas['telefono'] . '</p>';
                $contenido .= '<p><b>Fecha para deseada para ser contactado: </b>' . $respuestas['fecha'] . '</p>';
                $contenido .= '<p><b>Hora para deseada para ser contactado: </b>' . $respuestas['hora'] . '</p>';
            } else {
                $contenido .= '<p><b>La persona eligió ser contactada por email.</b></p>';
                $contenido .= '<p><b>Email: </b>' . $respuestas['email'] . '</p>';
            }                       
            $contenido .= '<p><b>Mensaje: </b>' . $respuestas['mensaje'] . '</p>';
            $contenido .= '<p><b>Interesado en: </b>' . $respuestas['tipo'] . '</p>';
            $contenido .= '<p><b>Precio o Presupuesto: $ </b>' . $respuestas['presupuesto'] . '</p>';
            $contenido .= '</html>';

            $mail->Body = $contenido;
            $mail->AltBody = 'Esto es un texto alternativo sin html';

            // Enviar el email
            if ($mail->send()) {
                $mensaje =  "Mensaje enviado correctamente.";
            } else {
                $mensaje = "El mensaje no se pudo enviar";
            }
        }
        $router->render('pages/contacto', [
            'mensaje' => $mensaje   
        ]);
    }
}
