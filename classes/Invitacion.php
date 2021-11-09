<?php

namespace App;

use App\Grupo;

class Invitacion
{
    //Base de datos
    protected static $db;
    protected static $columnaDB = ['idinvitacion', 'fechaRegistro', 'fechaHoraInvitacion', 'estado',  'Observacion', 'idEventosrealizados', 'idgrupo_universitario'];

    public $idinvitacion;
    public $fechaRegistro;
    public $fechaHoraInvitacion;
    public $estado;
    public $Observacion;
    public $idEventosrealizados;
    public $idgrupo_universitario;


    public function __construct($args = [])
    {
        $this->idinvitacion = $args['idinvitacion'] ?? '';
        $this->fechaRegistro = getdate();
        $this->fechaHoraInvitacion = $args['fechaHoraInvitacion'] ?? '';
        $this->estado = 'VIGENTE';
        $this->Observacion = $args['Observacion'] ?? '';
        $this->idEventosrealizados = $args['idEventosrealizados'] ?? '';
        $this->idgrupo_universitario = $args['idgrupo_universitario'] ?? '';
    }

    public function crear()
    {
        $query = "CALL proc_insertInvitacion('" . $this->fechaHoraInvitacion . "','" . $this->Observacion . "'," . $this->idEventosrealizados . ", " . $this->idgrupo_universitario . ")";
        $resultado = self::$db->query($query)->fetch_object();
        return $resultado;
    }


    //definir la conexion a la bd
    public static function setDB($dataBase)
    {
        self::$db = $dataBase;
    }

    public function getGrupoInvitado()
    {
        return Grupo::getGrupo($this->idgrupo_universitario);
    }

    public function getEvento()
    {
        return Evento::find($this->idEventosrealizados);
    }

    // lista todas las invitaciones
    public static function all()
    {
        $query = "SELECT * FROM invitacion";
        $resultado = self::consultarSQL($query);
        return $resultado;
    }

    public static function find($idinvitacion)
    {
        $query = "SELECT * FROM invitacion WHERE idinvitacion = " . $idinvitacion;
        $resultado = self::consultarSQL($query);
        return array_shift($resultado);
    }

    public static function getInvitacionesPorGrupo($id)
    {
        $query = "SELECT * FROM invitacion WHERE idgrupo_universitario = " . $id;

        $resultado = self::consultarSQL($query);
        return $resultado;
    }

    public static function consultarSQL($query)
    {

        //consutar base de datos
        $resultado = self::$db->query($query);


        //iterar los resultados
        $array = [];
        while ($registro = $resultado->fetch_assoc()) {
            $array[] = self::crearObjeto($registro);
        }

        //liberar la memoria
        $resultado->free();

        //retornar los resultados
        return $array;
    }

    protected static function crearObjeto($registro)
    {
        $objeto = new self;

        foreach ($registro as $key => $value) {
            if (property_exists($objeto, $key)) {
                $objeto->$key = $value;
            }
        }

        return $objeto;
    }

    public function getEstado()
    {
        $query = "SELECT func_EstadoInvitacion('" . $this->idinvitacion  . "', '" . $this->fechaHoraInvitacion . "') estado";
        $resultado = self::$db->query($query)->fetch_object();
        return $resultado;
    }


    public  function confirmarAsistencia($idAlumnoGrupo, $tipo)
    {
        $query = "CALL proc_insertaParticipacion('" . $tipo . "', '" . $idAlumnoGrupo . "', 6, 4, '" . $this->idinvitacion . "'  )";
        $resultado = self::$db->query($query)->fetch_object();
        return $resultado;
    }
}
