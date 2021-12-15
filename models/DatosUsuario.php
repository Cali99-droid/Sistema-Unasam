<?php

namespace Model;

class DatosUsuario extends ActiveRecord
{
    //base datos
    protected static $tabla = 'datos_usuario'; //DATOS_USUARIO
    protected static $columnasDB = ['id', 'persona_id', 'usuario_id'];

    public $id;
    public $persona_id;
    public $usuario_id;



    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->persona_id = $args['persona_id'] ?? '';
        $this->usuario_id = $args['usuario_id'] ?? '';
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
