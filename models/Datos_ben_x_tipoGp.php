<?php

namespace Model;

class Datos_ben_x_tipoGp extends ActiveRecord
{
    //base datos
    protected static $tabla = 'vta_datos_ben_x_tipoGp';
    protected static $columnasDB = ['id', 'idbeneficio', 'Beneficio', 'idTipoGrupo', 'TipoGrupo', 'estado'];

    public $id;
    public $idbeneficio;
    public $Beneficio;
    public $idTipoGrupo;
    public $TipoGrupo;
    public $estado;


    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->idbeneficio = $args['idbeneficio'] ?? '';
        $this->Beneficio = $args['Beneficio'] ?? '';
        $this->idTipoGrupo = $args['idTipoGrupo'] ?? '';
        $this->TipoGrupo = $args['TipoGrupo'] ?? '';
        $this->estado = $args['estado'] ?? '';
    }
}
