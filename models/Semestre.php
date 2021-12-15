<?php

namespace Model;

class Semestre extends ActiveRecord
{
    //base datos
    protected static $tabla = 'semestre';
    protected static $columnasDB = ['id', 'nombre', 'fecha_inicio', 'fecha_fin', 'estado'];

    public $id;
    public $nombre;
    public $fecha_inicio;
    public $fecha_fin;
    public $estado;


    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
        $this->fecha_inicio = $args['fecha_inicio'] ?? '';
        $this->fecha_fin = $args['fecha_fin'] ?? '';
        $this->estado = $args['estado'] ?? '';
    }


    /**
     * Mensajes de validacion
     */

    //revisa si un nombre ya existe
    public function existeSemestre()
    {
        $query = " SELECT * FROM " . self::$tabla . " WHERE nombre = '" . $this->nombre . "' LIMIT 1";
        $resultado = self::$db->query($query);
        if ($resultado->num_rows) {
            self::$alertas['error'][] = 'El nombre ya esta registrado';
        }
        return $resultado;
    }

    public static function getIdSemestreActual($idinvitacion)
    {
        $query = "SELECT f_idSemestreInv(" . $idinvitacion . ") valor;";
        $resultado = self::consulta($query)->fetch_assoc();
        return $resultado['valor'];
    }

    public  function getEstadoSemestre()
    {
        $query = "SELECT func_estadoSemestre(" . $this->id . ") valor;";
        $resultado = self::consulta($query)->fetch_assoc();
        return $resultado['valor'];
    }

    public function validarNombre()
    {
        $nombreS = $this->nombre;
        $sem = Semestre::where('nombre', $nombreS);
        if ($sem) {
            if ($sem->id == $this->id) {
                return false;
            } else {
                return true;
            }
        } else {
            return false;
        }
    }


    public function existenDosActivos()
    {
    }
}
