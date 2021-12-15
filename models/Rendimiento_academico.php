<?php

namespace Model;

class Rendimiento_academico extends ActiveRecord
{
    //base datos
    protected static $tabla = 'rendimiento_academico';
    protected static $columnasDB = ['id', 'estado', 'semestre_id', 'alumno_id'];

    public $id;
    public $estado;
    public $semestre_id;
    public $alumno_id;
    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->estado = $args['estado'] ?? '';
        $this->semestre_id = $args['semestre_id'] ?? '';
        $this->alumno_id = $args['alumno_id'] ?? '';
    }


    public function getSemestre()
    {
        $id = $this->semestre_id;
        $semestre = Semestre::find($id);
        return $semestre;
    }

    public function existeSemestre()
    {
        $query = "SELECT * FROM rendimiento_academico WHERE semestre_id = " . $this->semestre_id . " AND alumno_id  = " . $this->alumno_id;

        $rend = self::SQL_primer($query);
        if ($rend) {
            if ($rend->id == $this->id) {
                return false;
            } else {
                return true;
            }
        } else {
            return false;
        }
    }
}
