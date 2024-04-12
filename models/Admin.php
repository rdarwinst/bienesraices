<?php 

namespace Model;

class Admin extends ActiveRecord {
    protected static $tabla = 'usuarios';
    protected static $columnasDB = ['id', 'email', 'password'];

    public $id;
    public $email;
    public $password;

    public function __construct($args = [])
    {
        $this -> id = $args['id'] ?? null;
        $this -> email =  $args['email'] ?? '';
        $this -> password =  $args['password'] ?? '';
    }
    
    public function validarForm()
    {
        if(!$this -> email) {
            self::$errores[] = 'El email es necesario para iniciar sesión.';
        }
        if(!$this -> password) {
            self::$errores[] = 'Tienes que escribir una contraseña válida.';
        }

        return self::$errores;
    }

    public function existeUsuario() {

        // Revisar si el usuario existe
        $query = "SELECT * FROM " . self::$tabla;
        $query .= " WHERE email = '" . $this->email ."'";
        $query .= " LIMIT 1";

        $resultado = self::$db->query($query);

        if(!$resultado -> num_rows) {
            self::$errores[] = "El usuario {$this -> email} no existe.";
            return;
        } 

        return $resultado;
        
    }

    public function comprobarPassword($resultado){
        $usuario = $resultado -> fetch_object();

        $autenticado = password_verify($this -> password, $usuario -> password);

        if(!$autenticado) {
            self::$errores[] = "La contraseña ingresada no es correcta.";            
        }
        return $autenticado;
    }

    public function autenticarUsuario()
{
    // Iniciar el búfer de salida para evitar cualquier salida antes de la redirección
    ob_start();

    // Iniciar la sesión si no está iniciada
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    // Llenar el arreglo de sesión
    $_SESSION['usuario'] = $this->email;
    $_SESSION['login'] = true;

    // Construir la URL de redirección absoluta
    $redirectUrl = 'http://' . $_SERVER['HTTP_HOST'] . '/admin';    

    // Enviar la cabecera de redirección
    header('Location: ' . $redirectUrl);

    // Terminar la ejecución del script después de la redirección
    exit;

    // Limpiar el búfer de salida al final del script
    ob_end_flush();
}
}