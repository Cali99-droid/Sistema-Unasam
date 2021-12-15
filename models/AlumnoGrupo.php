<?php

namespace Model;

class AlumnoGrupo extends ActiveRecord
{
    //base datos
    protected static $tabla = 'alumno_x_grupo';
    protected static $columnasDB = ['id', 'fecha_inscripcion', 'estado', 'grupo_universitario_id', 'alumno_id'];

    public $id;
    public $fecha_inscripcion;
    public $estado;
    public $grupo_universitario_id;
    public $alumno_id;


    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->fecha_inscripcion = $args['fecha_inscripcion'] ?? '';
        $this->estado = $args['estado'] ?? '';
        $this->grupo_universitario_id = $args['grupo_universitario_id'] ?? '';
        $this->alumno_id = $args['alumno_id'] ?? '';
    }


    /*
           Mensajes de validacion
     
*/
    //revisa si un Alumno en un grupo ya existe
    public function existeAlumnoG()
    {
        $query = " SELECT * FROM " . self::$tabla . " WHERE grupo_universitario_id = '" . $this->grupo_universitario_id . "' alumno_id = '" . $this->alumno_id . "' LIMIT 1";
        $resultado = self::$db->query($query);
        if ($resultado->num_rows) {
            self::$alertas['error'][] = 'El Alumno ya esta registrado en el grupo';
        }

        return $resultado;
    }
}
