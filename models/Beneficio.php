<?php

namespace Model;

class Beneficio extends ActiveRecord
{
    //base datos
    protected static $tabla = 'beneficio';
    protected static $columnasDB = ['id', 'nombre'];

    public $id;
    public $nombre;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
    }


    public function getResolucion()
    {
        $query = 'SELECT b.id, b.nombre, r.id idres, r.numero_resolucion, r.fecha_emision, r.estado, r.beneficio_id 
        FROM beneficio b left JOIN resolucion_x_beneficio r on b.id = r.beneficio_id WHERE b.id = ' . $this->id;
        $resultado = self::consulta($query);
        return $resultado;
    }

    public function getDoc()
    {
        $id = $this->id;
        $res = Resolucion_x_beneficio::where('beneficio_id', $id);
        if (isset($res->doc)) {
            return $res->doc;
        } else {
            return '#';
        }
    }

    public function validarNombre()
    {
        $nombreB = $this->nombre;
        $ben = Beneficio::where('nombre', $nombreB);
        if ($ben) {
            if ($ben->id == $this->id) {
                return false;
            } else {
                return true;
            }
        } else {
            return false;
        }
    }


    public function estaAsignado()
    {
        $ben = Beneficio_x_tipo_grupo::where('beneficio_id', $this->id);
        if (isset($ben)) {
            return true;
        } else {
            return false;
        }
    }
}
