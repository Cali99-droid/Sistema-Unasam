<?php

namespace Model;

class PorcentajeDescuento extends ActiveRecord
{
    //base datos
    protected static $tabla = 'porcentaje_descuento';
    protected static $columnasDB = ['id', 'porcentaje', 'beneficio_id'];

    public $id;
    public $porcentaje;
    public $beneficio_id;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->porcentaje = $args['porcentaje'] ?? '';
    }

    //revisa si un porcentaje ya existe
    /*public function existeDescuento()
    {
        $query = " SELECT * FROM " . self::$tabla . " WHERE porcentaje = '" . $this->porcentaje . "' LIMIT 1";
        $resultado = self::$db->query($query);
        if ($resultado->num_rows) {
            self::$alertas['error'][] = 'El porcentaje ya esta registrado';
        }

        return $resultado;
    }*/
}
