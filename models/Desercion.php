<?php

namespace Model;

class Desercion extends ActiveRecord
{
    //base datos
    protected static $tabla = 'indices_de_desercion';
    protected static $columnasDB = ['id', 'descripcion'];

    public $id;
    public $descripcion;
    


    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->descripcion = $args['descripcion'] ?? '';
    }


    /**
     * Mensajes de validacion
     */

    //revisa si un nombre ya existe
    public function existeIndicador()
    {
        $query = " SELECT * FROM " . self::$tabla . " WHERE descripcion = '" . $this->descripcion . "' LIMIT 1";
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
        $nombreS = $this->descripcion;
        $sem = Desercion::where('descripcion', $nombreS);
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
}
