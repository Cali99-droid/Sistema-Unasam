<?php

namespace Model;

class TipoGrupo extends ActiveRecord
{
    //base datos
    protected static $tabla = 'tipo_grupo';
    protected static $columnasDB = ['id', 'nombre'];

    public $id;
    public $nombre;



    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
    }


    /*
           Mensajes de validacion
     
*/
    //revisa si un Alumno en un grupo ya existe
    public function existeTipo_Grupo()
    {
        $query = " SELECT * FROM " . self::$tabla . " nombre = '" . $this->nombre . "' LIMIT 1";
        $resultado = self::$db->query($query);
        if ($resultado->num_rows) {
            self::$alertas['error'][] = 'El tipo de grupo ya existe';
        }

        return $resultado;
    }


    public function validarNombre()
    {
        $nombreT = $this->nombre;
        $tip = TipoGrupo::where('nombre', $nombreT);
        if ($tip) {
            if ($tip->id == $this->id) {
                return false;
            } else {
                return true;
            }
        } else {
            return false;
        }
    }


    public function estaAsignado()
    {

        $grupo = Grupo::where('tipo_grupo_id', $this->id);
        if (isset($grupo)) {
            return true;
        } else {
            return false;
        }
    }
}
