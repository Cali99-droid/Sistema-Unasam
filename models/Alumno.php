<?php

namespace Model;

class Alumno extends ActiveRecord
{
    //base datos
    protected static $tabla = 'alumno';
    protected static $columnasDB = ['id', 'codigo', 'persona_id', 'escuela_id', 'procedencia_id', 'condicion_economica_id'];

    public $id;
    public $codigo;
    public $persona_id;
    public $escuela_id;
    public $procedencia_id;
    public $condicion_economica_id;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->codigo = $args['codigo'] ?? '';
        $this->persona_id = $args['persona_id'] ?? '';
        $this->escuela_id = $args['escuela_id'] ?? '';
        $this->procedencia_id = $args['procedencia_id'] ?? '';
        $this->procedencia_id = $args['condicion_economica_id'] ?? '';
    }


    /**
     * Mensajes de validacion
     */

    //revisa si un Alumno ya existe
    public function existeAlumno()
    {
        $query = " SELECT * FROM " . self::$tabla . " WHERE codigo = '" . $this->codigo . "' LIMIT 1";
        $resultado = self::$db->query($query);
        if ($resultado->num_rows) {
            self::$alertas['error'][] = 'El codigo ya esta registrado';
        }

        return $resultado;
    }
}
