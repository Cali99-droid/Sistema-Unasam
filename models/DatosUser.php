<?php

namespace Model;

class DatosUser extends ActiveRecord
{
    //Base de datos
    protected static $tabla = 'vista_usuarios';
    protected static $columnaDB = ['idPersona',  'dni', 'nombre', 'apellido', 'direccion', 'genero', 'email', 'telefono',  'idDatosUsu', 'idUsuario', 'usuario', 'pass', 'estado', 'idTipoUsu', 'tipo'];
    //errores
    protected static $errores = [];

    public $idPersona;
    public $dni;
    public $nombre;
    public $apellido;
    public $genero;
    public $email;
    public $telefono;
    public $direccion;
    public $idDatosUsu;
    public $idUsuario;
    public $usuario;
    public $pass;
    public $idTipoUsu;
    public $tipo;
    public $estado;


    public function __construct($args = [])
    {

        $this->idPersona = $args['idPersona'] ?? '';
        $this->nombre = $args['nombre'] ?? '';
        $this->dni = $args['dni'] ?? '';
        $this->apellido = $args['apellido'] ?? '';
        $this->genero = $args['genero'] ?? '';
        $this->email = $args['email'] ?? '';
        $this->telefono = $args['telefono'] ?? '';
        $this->idDatosUsu = $args['idDatosUsu'] ?? '';
        $this->idUsuario = $args['idUsuario'] ?? '';
        $this->usuario = $args['usuario'] ?? '';
        $this->pass = $args['pass'] ?? '';
        $this->idTipoUsu = $args['idTipoUsu'] ?? '';
        $this->tipo = $args['tipo'] ?? '';
        $this->direccion = $args['direccion'] ?? '';
        $this->estado = $args['estado'] ?? '';
    }


    public function crearUser()
    {
        $psw =  password_hash($this->dni, PASSWORD_BCRYPT);
        $query = "CALL proc_insertUsuario('" . $this->dni . "', '" . $this->nombre . "', '" . $this->apellido . "', '" . $this->genero . "', '" . $this->direccion . "','" . $this->email . "', '" . $this->telefono . "', '" . $this->usuario . "', '" . $psw . "', '" . $this->estado . "', '" . $this->idTipoUsu . "');";

        $resultado = self::consulta($query);
        return $resultado;
    }

    public function uptUser()
    {
        $query = "CALL proc_updateUsuario('" . $this->idUsuario . "','" . $this->dni . "', '" . $this->nombre . "', '" . $this->apellido . "', '" . $this->genero . "', '" . $this->direccion . "','" . $this->email . "', '" . $this->telefono . "', '" . $this->usuario . "', '" . $this->dni . "', '" . $this->estado . "', '" . $this->idTipoUsu . "');";

        $resultado = self::consulta($query);
        return $resultado;
    }

    public static function getTipoUsuario($idUsuario)
    {
        $query='SELECT idTipoUsu FROM vista_usuarios WHERE idUsuario = '. $idUsuario;
        $resultado = self::consulta($query);
        return $resultado;
    }
}
