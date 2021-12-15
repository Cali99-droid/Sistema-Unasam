<?php

namespace Model;

class Beneficio_x_tipo_grupo extends ActiveRecord
{
    //base datos
    protected static $tabla = 'beneficio_x_tipo_grupo'; //BENEFICIO_X_TIPO_GRUPO
    protected static $columnasDB = ['id', 'estado', 'beneficio_id', 'tipo_grupo_id'];

    public $id;
    public $estado;
    public $beneficio_id;
    public $tipo_grupo_id;


    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->estado = $args['estado'] ?? '';
        $this->beneficio_id = $args['beneficio_id'] ?? '';
        $this->tipo_grupo_id = $args['tipo_grupo_id'] ?? '';
    }

    public static function validarEstado($tipo_grupo_id, $estado)
    {
        $query = "SELECT * FROM beneficio_x_tipo_grupo WHERE tipo_grupo_id = " . $tipo_grupo_id . " AND estado = '" . $estado . "'";
        $resultado = self::consultarSQL($query);
        return $resultado;
    }

    public  function validarExistencia()
    {
        $query = "SELECT * FROM beneficio_x_tipo_grupo WHERE tipo_grupo_id = " . $this->tipo_grupo_id . " AND beneficio_id = '" . $this->beneficio_id . "'";
        $resultado = self::SQL_primer($query);
        if ($resultado) {
            if ($resultado->id == $this->id) {
                return false;
            } else {
                return true;
            }
        } else {
            return false;
        }
    }



    public function getNombreBeneficio()
    {
        $id = $this->beneficio_id;
        $beneficio = Beneficio::find($id);

        return $beneficio->nombre;
    }

    public function validarAsignacion()
    {
        $beneAlumno = Beneficio_x_alumno::where('beneficio_x_tipo_grupo_id', $this->id);
        if ($beneAlumno) {
            return true;
        } else {
            return false;
        }
    }
}
