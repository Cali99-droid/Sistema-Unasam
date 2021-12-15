<?php

namespace Model;

class TipoUsuario extends ActiveRecord
{
    //base datos
    protected static $tabla = 'tipo_usuario';
    protected static $columnasDB = ['id', 'nombre'];

    public $id;
    public $nombre;



    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->fecha_registro = $args['nombre'] ?? '';
    }


    /*
           Mensajes de validacion
     
*/
    //revisa si un tipo de usuario ya existe
    public function existeTipo_Usuario()
    {
        $query = " SELECT * FROM " . self::$tabla . " nombre = '" . $this->nombre . "' LIMIT 1";
        $resultado = self::$db->query($query);
        if ($resultado->num_rows) {
            self::$alertas['error'][] = 'El tipo de usuario ya existe';
        }

        return $resultado;
    }
}
