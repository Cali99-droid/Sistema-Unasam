<?php

namespace Model;

class Usuario extends ActiveRecord
{
    //base datos
    protected static $tabla = 'usuario';
    protected static $columnasDB = ['id', 'usuario', 'pass', 'estado', 'tipo_usuario_id', 'confirmado', 'token'];

    public $id;
    public $usuario;
    public $pass;
    public $estado;
    public $tipo_usuario_id;
    public $confirmado;
    public $token;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->usuario = $args['usuario'] ?? '';
        $this->pass = $args['pass'] ?? '';
        $this->estado = $args['estado'] ?? '';
        $this->tipo_usuario_id = $args['tipo_usuario_id'] ?? '';
        $this->confirmado = $args['confirmado'] ?? '';
        $this->token = $args['token'] ?? '';
    }

    public function getDatos()
    {
        $id =  $this->id;
        $datos = DatosUser::where('idUsuario', $id);
        return $datos;
    }


    /**
     * Mensajes de validacion
     */

    //revisa si un usuario ya existe
    public function existeUsuario()
    {
        $query = " SELECT * FROM " . self::$tabla . " WHERE usuario = '" . $this->usuario . "' LIMIT 1";
        $resultado = self::$db->query($query);
        if ($resultado->num_rows) {
            self::$alertas['error'][] = 'El usuario ya esta registrado';
        }

        return $resultado;
    }

    public function hashPassword()
    {
        $this->pass = password_hash($this->pass, PASSWORD_BCRYPT);
    }



    public function validarLogin()
    {
        if (!$this->usuario) {
            self::$alertas['error'][] = 'El usuario es obligatorio';
        }

        if (!$this->pass) {
            self::$alertas['error'][] = 'El password es obligatorio';
        }

        return self::$alertas;
    }


    public function validarPassword()
    {
        if (!$this->pass) {
            self::$alertas['error'][] = 'El password es obligatorio';
        }

        if (strlen($this->pass) < 6) {
            self::$alertas['error'][] = 'El password es debe tener al menos 6 caracteres';
        }

        return self::$alertas;
    }

    public function comprobarPassword($password)
    {
        $resultado = password_verify($password, $this->pass);
        if ($resultado) {
            return true;
        } else {
            self::$alertas['error'][] = 'Password incorrecto ';
        }
    }

    public function crearToken()
    {
        $this->token = uniqid();
    }
}
