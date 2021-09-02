<?php

namespace App;


class User
{
    //Base de datos
    protected static $db;
    protected static $columnaDB = ['idTipoGrupo', 'nombre_tipo'];

    //errores
    protected static $errores = [];

    public $idTipoGrupo;
    public $nombre_tipo;


    public function __construct($args = [])
    {
        $this->idTipoGrupo = $args['idTipoGrupo'] ?? '';
        $this->nombre_tipo = $args['nombre_tipo'] ?? '';
    }

    //definir la conexion a la bd
    public static function setDB($dataBase)
    {
        self::$db = $dataBase;
    }


    public function crear()
    {
        //sanitizar datos
        $atributos = $this->sanitizarAtributos();
        //insertar en la base de da
        $query = "INSERT INTO tipo_grupo(";
        $query .= join(', ', array_keys($atributos));
        $query .= " ) VALUES(' ";
        $query .= join("', '", array_values($atributos));
        $query .= " ')";


        $resultado = self::$db->query($query);
        return $resultado;
    }

    public function actualizar()
    {
        $atributos = $this->sanitizarAtributos();
        $valores = [];
        foreach ($atributos as $key => $value) {
            $valores[] = "{$key}='{$value}'";
        }
        $query = " UPDATE tipo_grupo SET ";
        $query .= join(', ', $valores);
        $query .= " WHERE idTipoGrupo = '" . self::$db->escape_string($this->idTipoGrupo) . "' ";
        $query .= " LIMIT 1 ";



        $resultado = self::$db->query($query);
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
        $query = "SELECT * FROM tipo_grupo";
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
    public static function find($id)
    {
        $query = "SELECT * FROM tipo_grupo WHERE idTipoGrupo = ${id}";
        $resultado = self::consulta($query)->fetch_assoc();;
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
