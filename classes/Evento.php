<?php

namespace App;


class Evento
{
    //Base de datos
    protected static $db;
    protected static $columnaDB = ['idEventosrealizados', 'nombre_evento', 'fecha_inicio', 'fecha_final', 'idorganizador', 'organizador', 'contacto'];

    //errores
    protected static $errores = [];

    public $idEventosrealizados;
    public $nombre_evento;
    public $fecha_inicio;
    public $fecha_final;
    public $idorganizador;
    public $organizador;
    public $contacto;



    public function __construct($args = [])
    {
        $this->idEventosrealizados = $args['idEventosrealizados'] ?? '';
        $this->nombre_evento = $args['nombre_evento'] ?? '';
        $this->fecha_inicio = $args['fecha_inicio'] ?? '';
        $this->fecha_final = $args['fecha_final'] ?? '';
        $this->idorganizador = $args['idorganizador'] ?? '';
        $this->organizador = $args['organizador'] ?? '';
        $this->contacto = $args['contacto'] ?? '';
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
        $query = "INSERT INTO Eventos_realizados(";
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
        $query = " UPDATE Eventos_realizados SET ";
        $query .= join(', ', $valores);
        $query .= " WHERE idEventosrealizados = '" . self::$db->escape_string($this->idEventosrealizados) . "' ";
        $query .= " LIMIT 1 ";

        $resultado = self::$db->query($query);
        return $resultado;
    }

    public function atributos()
    {
        $atributos = [];
        foreach (self::$columnaDB as $columna) {
            if ($columna == 'idEventosrealizados') continue;
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

    public function validar()
    {

        if (!$this->titulo) {
            self::$errores[] = "Debes Añadir un titulo";
        }

        if (!$this->precio) {
            self::$errores[] = "El precio es obligatorio";
        }

        if (strlen($this->descripcion) < 50) {
            self::$errores[] = "La descripcion es obligatoria y debe tener mas de 50 caracteres";
        }

        if (!$this->habitaciones) {
            self::$errores[] = "El numero de habitaciones es obligatorio";
        }

        if (!$this->wc) {
            self::$errores[] = "El numero de baños es obligatorio";
        }

        if (!$this->estacionamiento) {
            self::$errores[] = "El numero de estacionamientos es obligatorio";
        }

        if (!$this->vendedorId) {
            self::$errores[] = "Elige un vendedor";
        }

        if (!$this->imagen) {
            self::$errores[] = "la imagen es obligatoria";
        }


        return self::$errores;
    }


    // lista todas los grupos
    public static function all()
    {
        $query = "SELECT * FROM vista_eventos";
        $resultado = self::consultarSQL($query);
        return $resultado;
    }
    // trae un evento
    public static function find($id)
    {
        $query = "SELECT * FROM Eventos_realizados WHERE idEventosrealizados = ${id}";
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
