<?php

namespace Model;

class ParticipacionAlumno extends ActiveRecord
{
    //base datos
    protected static $tabla = 'participacion_alumno'; //PARTICIPACION_ALUMNO
    protected static $columnasDB = ['id', 'tipo', 'alumno_x_grupo_id', 'usuario_id', 'semestre_id', 'invitacion_id'];

    public $id;
    public $tipo;
    public $alumno_x_grupo_id;
    public $usuario_id;
    public $semestre_id;
    public $invitacion_id;
    public $nombreEvento;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->tipo = $args['tipo'] ?? '';
        $this->alumno_x_grupo_id = $args['alumno_x_grupo_id'] ?? '';
        $this->usuario_id = $args['usuario_id'] ?? '';
        $this->semestre_id = $args['semestre_id'] ?? '';
        $this->invitacion_id = $args['invitacion_id'] ?? '';
    }

    public function getEvento()
    {
        $invitacion = Invitacion::find($this->invitacion_id);
        $evento = $invitacion->getEvento();

        return $evento->nombre;
    }

    public function setEvento()
    {
        $this->nombreEvento = $this->getEvento();
    }

    public function existe()
    {
        $query = 'SELECT * FROM participacion_alumno WHERE alumno_x_grupo_id = ' . $this->alumno_x_grupo_id . ' AND invitacion_id = ' . $this->invitacion_id;
        $part = self::SQL_primer($query);
        if ($part) {
            return true;
        } else {
            return false;
        }
    }
}
