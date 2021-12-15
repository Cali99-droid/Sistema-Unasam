<?php

namespace Model;

class Opciones extends ActiveRecord
{
    //base datos
    protected static $tabla = 'opciones';
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
    //revisa si un Alumno en un grupo ya existe
    /*public function existeTipo_Grupo()
    {
        $query = " SELECT * FROM " . self::$tabla . " nombre = '" . $this->nombre . "' LIMIT 1";
        $resultado = self::$db->query($query);
        if ($resultado->num_rows) {
            self::$alertas['error'][] = 'El tipo de grupo ya existe';
        }

        return $resultado;
    }*/
}
