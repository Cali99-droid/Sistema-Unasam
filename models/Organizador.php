<?php

namespace Model;

class Organizador extends ActiveRecord
{
    //base datos
    protected static $tabla = 'organizador';
    protected static $columnasDB = ['id', 'nombre', 'contacto'];

    public $id;
    public $nombre;
    public $contacto;


    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
        $this->contacto = $args['contacto'] ?? '';
    }


    /*
           Mensajes de validacion
     
*/
    //revisa si un Orgaizador ya existe
    public function existeOrganizador()
    {
        $query = " SELECT * FROM " . self::$tabla . " nombre = '" . $this->nombre . " LIMIT 1";
        $resultado = self::$db->query($query);
        if ($resultado->num_rows) {
            self::$alertas['error'][] = 'El Organizador ya esta registrado';
        }

        return $resultado;
    }
}
