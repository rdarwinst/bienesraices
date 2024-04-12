<?php

namespace Model;

class Vendedor extends ActiveRecord
{
    protected static $tabla = 'vendedores';
    protected static $columnasDB = ['id', 'nombre', 'apellido', 'telefono', 'email'];

    public $id;
    public $nombre;
    public $apellido;
    public $telefono;
    public $email;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
        $this->apellido = $args['apellido'] ?? '';
        $this->telefono = $args['telefono'] ?? '';
        $this->email = $args['email'] ?? '';
    }

    public function validarForm()
    {
        if(!$this->nombre) {
            self::$errores[] = 'Debe ingresar un nombre para el vendedor.';
        }
        if(!$this->apellido) {
            self::$errores[] = 'Debe ingresar un apellido para el vendedor.';
        }
        if(!$this->telefono) {
            self::$errores[] = 'El número de telefono es obligatorio.';
        }
        if(!preg_match('/^(3[0-9]{9}|[2-8][0-9]{3}[0-9]{6})$/', $this -> telefono)) {
            self::$errores[] = 'El formato del número telefonico no es válido.';
        }
        if(!$this->email) {
            self::$errores[] = 'La direccion de email es obligatoria.';
        }
        if(!preg_match('/^[\p{L}\p{N}._%+-]+@[\p{L}\p{N}.-]+\.[\p{L}]{2,}$/u', $this -> email)) {
            self::$errores[] = 'El formato de la direccion de correo no es válido.';
        }

        return self::$errores;
    }
}
