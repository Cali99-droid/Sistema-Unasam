<?php

namespace App;


class User
{
    //Base de datos
    protected static $db;
    protected static $columnaDB = ['idPersona', 'dni', 'nombre', 'apellido', 'genero', 'direccion', 'idDatosUsuario', 'idUsuario', 'usuario', 'estado'];

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
    public $idDatosUsuario;
    public $idUsuario;
    public $usuario;
    public $estado;


    public function __construct($args = [])
    {
        $this->idPersona = $args['idPersona'] ?? '';
        $this->dni = $args['dni'] ?? '';
        $this->nombre = $args['nombre'] ?? '';
        $this->apellido = $args['apellido'] ?? '';
        $this->genero = $args['genero'] ?? '';
        $this->email = $args['email'] ?? '';
        $this->telefono = $args['telefono'] ?? '';
        $this->direccion = $args['direccion'] ?? '';
        $this->idDatosUsuario = $args['idDatosUsuario'] ?? '';
        $this->idUsuario = $args['idUsuario'] ?? '';
        $this->usuario = $args['usuario'] ?? '';
        $this->estado = $args['estado'] ?? 'inactivo';
    }

    //definir la conexion a la bd
    public static function setDB($dataBase)
    {
        self::$db = $dataBase;
    }


    public function crear($pass)
    {
        //sanitizar datos
        $atributos = $this->sanitizarAtributos();
        //insertar en la base de da
        $query = "call p_insertUsuario('" . $this->dni . "','" . $this->nombre . "','" . $this->apellido . "' ,'" . $this->genero . "','" . $this->direccion . " ','" . $this->email . " ','" . $this->telefono . "', '" . $this->usuario . "','" . $pass . "','" . $this->estado . "')";

        $resultado = self::$db->query($query)->fetch_object();

        if ($resultado->valor == '1') {
            // self::$errores[] = 'El DNI ya existe';
            header('Location: /usuarios.php?dni=&mensaje=el dni se repite');
        } else {
            header('Location: /usuarios.php');
        }
    }

    public function actualizar($pass)
    {
        $query = "call p_updateUsuario('" . $this->idPersona . "','" . $this->dni . "','" . $this->nombre . "','" . $this->apellido . "' ,'" . $this->genero . "','" . $this->direccion . " ','" . $this->email . " ','" . $this->telefono . "', '" . $this->usuario . "','" . $pass . "','" . $this->estado . "')";

        $resultado = self::$db->query($query);
        if ($resultado) {
            header('Location: /usuarios.php');
        }

        return $resultado;
    }

    public function atributos()
    {
        $atributos = [];
        foreach (self::$columnaDB as $columna) {
            if ($columna == 'idTipoGrupo') continue;
            $atributos[$columna] = $this->$columna;
        }

        return $atributos;
    }

    public function sanitizarAtributos()
    {
        $atributos = $this->atributos();

        $sanitizado = [];

        foreach ($atributos as $key => $value) {
            $sanitizado[$key] = self::$db->escape_string($value);
        }

        return $sanitizado;
    }





    //sincroniza el objeto en memoria con los cambios realizados por el susario
    public function sincronizar($args = [])
    {
        foreach ($args as $key => $value) {
            if (property_exists($this, $key) && !is_null($value)) {
                $this->$key = $value;
            }
        }
    }




    //validacion

    public static  function getErrores()
    {
        return self::$errores;
    }



    // lista todas los grupos
    public static function all()
    {
        $query = "SELECT * FROM v_users";
        $resultado = self::consultarSQL($query);
        return $resultado;
    }
    // trae un grupo
    public static function getTipo($id)
    {
        $query = "SELECT * FROM tipo_grupo WHERE idTipoGrupo = ${id}";
        $resultado = self::consulta($query)->fetch_assoc();
        return $resultado;
    }

    // trae un grupo
    public static function find($dni)
    {
        $query = "SELECT * FROM v_users WHERE dni = ${dni}";
        $resultado = self::consulta($query)->fetch_assoc();
        return $resultado;
    }


    public static function consulta($query)
    {
        $resultado = self::$db->query($query);

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
}
