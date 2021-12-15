<?php

namespace Model;

class CondicionEconomica extends ActiveRecord
{
    //base datos
    protected static $tabla = 'condicion_economica';
    protected static $columnasDB = ['id', 'nombre'];

    public $id;
    public $nombre;


    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
    }
}
