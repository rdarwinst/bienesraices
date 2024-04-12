<?php

namespace Model;

class Entrada extends ActiveRecord
{

    protected static $tabla = 'blog';
    protected static $columnasDB = ['id', 'titulo', 'contenido', 'autor', 'fecha_publicacion', 'ultima_modificacion', 'categoria', 'imagen', 'etiquetas'];
    
    public $id;
    public $titulo;
    public $contenido;
    public $autor;
    public $fecha_publicacion;
    public $ultima_modificacion;
    public $categoria;
    public $imagen;
    public $etiquetas;

    public function __construct($args = [])
    {
        $this -> id = $args['id'] ?? null;
        $this -> titulo = $args['titulo'] ?? '';
        $this -> contenido = $args['contenido'] ?? '';
        $this -> autor = $args['autor'] ?? 'Admin';
        $this -> fecha_publicacion = date('Y/m/d');
        $this -> ultima_modificacion = date('Y/m/d');
        $this -> categoria = $args['categoria'] ?? '';
        $this -> imagen = $args['imagen'] ?? '';
        $this -> etiquetas = $args['etiquetas'] ?? '';

    }

    public function validarForm()
    {
        if(!$this -> titulo) {
            self::$errores[] = 'El titulo de la entrada es necesario';
        }
        if(strlen($this -> contenido) < 50) {
            self::$errores[] = 'El contenido de la entrada es obligatorio o debe contener al menos 50 caracteres';
        }
        if(!$this -> categoria) {
            self::$errores[] = 'Debe seleccionar una categoria';
        }
        if(!$this -> imagen) {
            self::$errores[] = 'La imagen destacada es obligatoria';
        }
        if(!$this -> etiquetas) {
            self::$errores[] = 'Las etiquetas son obligatorias';
        }
        return self::$errores;
    }

    public static function all() {
        $query = "SELECT * FROM " . static::$tabla;
        $query .= " ORDER BY fecha_publicacion DESC";

        $resultado = self::consultarSQL($query);

        return $resultado;
    }
    public static function get($cantidad) {
        $query = "SELECT * FROM " . static::$tabla;
        $query .= " ORDER BY fecha_publicacion DESC";
        $query .= " LIMIT {$cantidad}";

        $resultado = self::consultarSQL($query);

        return $resultado;
    }
}
