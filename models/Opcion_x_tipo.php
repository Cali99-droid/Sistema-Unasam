<?php

namespace Model;

class Opcion_x_tipo extends ActiveRecord
{
    //base datos
    protected static $tabla = 'opcion_x_tipo'; //OPCION_X_TIPO
    protected static $columnasDB = ['id', 'opciones_id', 'tipo_usuario_id'];

    public $id;
    public $opciones_id;
    public $tipo_usuario_id;



    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->opciones_id = $args['opciones_id'] ?? '';
        $this->tipo_usuario_id = $args['tipo_usuario_id'] ?? '';
    }


    public static function getPermisos($id)
    {
        $permisos = Opcion_x_tipo::where_all('tipo_usuario_id', $id);

        return $permisos;
    }


    public static function eliminarPriv($id)
    {
        $query = 'DELETE FROM opcion_x_tipo WHERE tipo_usuario_id = ' . $id;
        $resultado = Opcion_x_tipo::consulta($query);
        return $resultado;
    }

    public static function getPermisos2($id)
    {
        $permisos = Opcion_x_tipo::consulta('SELECT opciones_id FROM opcion_x_tipo o WHERE tipo_usuario_id = ' . $id);

        return $permisos;
    }
}
