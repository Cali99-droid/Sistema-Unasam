<?php

namespace Model;

class Beneficio_x_alumno extends ActiveRecord
{
    //base datos
    protected static $tabla = 'beneficio_x_alumno';
    protected static $columnasDB = ['id', 'estado', 'fecha_efectiva', 'descripcion', 'semestre_id', 'beneficio_x_tipo_grupo_id', 'alumno_x_grupo_id', 'usuario_id'];

    public $id;
    public $estado;
    public $fecha_efectiva;
    public $descripcion;
    public $semestre_id;
    public $beneficio_x_tipo_grupo_id;
    public $alumno_x_grupo_id;
    public $usuario_id;
    public $nombreBeneficio;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->estado = $args['estado'] ?? '';
        $this->fecha_efectiva = date('Y-m-d', strtotime($this->fecha_efectiva . "- 1 days"));
        $this->descripcion = $args['descripcion'] ?? '';
        $this->semestre_id = $args['semestre_id'] ?? '';
        $this->beneficio_x_tipo_grupo_id = $args['beneficio_x_tipo_grupo_id'] ?? '';
        $this->alumno_x_grupo_id = $args['alumno_x_grupo_id'] ?? '';
        $this->usuario_id = $args['usuario_id'] ?? '';
    }


    public function getSemestre()
    {
        $query = "SELECT * FROM semestre WHERE " . $this->fecha_efectiva . " BETWEEN fecha_inicio AND fecha_fin";
        $semestre = Semestre::SQL_primer($query);
        if (is_null($semestre)) {
            $semestre_id = '1';
        } else {
            $semestre_id = $semestre->id;
        }
        return $semestre_id;
    }

    public function getNombreBeneficio()
    {

        $id =  $this->beneficio_x_tipo_grupo_id;
        $beneficioTipo = Beneficio_x_tipo_grupo::find($id);
        $this->nombreBeneficio = $beneficioTipo->getNombreBeneficio();
        return  $this->nombreBeneficio;
    }




    public function actEstado()
    {
        if ($this->estado === 'COMPLETADO') {
            $this->estado = 'PENDIENTE';
        } else {
            $this->estado = 'COMPLETADO';
        }
    }

    public function existe()
    {
        $query = "SELECT * FROM beneficio_x_alumno WHERE alumno_x_grupo_id = " . $this->alumno_x_grupo_id . " AND beneficio_x_tipo_grupo_id = " . $this->beneficio_x_tipo_grupo_id;
        $bena = self::SQL_primer($query);
        if ($bena) {
            return true;
        } else {
            return false;
        }
    }
}
