<?php

namespace Model;

class FormacionSocioeconomica extends ActiveRecord
{
    //base datos
    protected static $tabla = 'formacion_socioeconomica';
    protected static $columnasDB = ['id', 'descripcion', 'alumno_id'];

    public $id;
    public $descripcion;
    public $alumno_id;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->descripcion = $args['descripcion'] ?? '';
        $this->alumno_id = $args['alumno_id'] ?? '';
    }
}
