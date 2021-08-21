<?php

namespace App;

class Beneficio
{
    //Base de datos
    protected static $db;
    protected static $columnaDB = ['idResolucionxbeneficio', 'numero', 'fecha_emision', 'estadoresolucion', 'idBeneficio', 'nombre', 'idBeneficioxtipGrupo', 'estado', 'nombre_tipo', 'idTipoGrupo'];

    //errores
    protected static $errores = [];



    public $idResolucionxbeneficio;
    public $numero;
    public $fecha_emision;
    public $estadoresolucion;
    public $idBeneficio;
    public $nombre;
    public $idBeneficioxtipGrupo;
    public $estado;
    public $nombre_tipo;
    public $idTipoGrupo;




    public function __construct($args = [])
    {
        $this->idResolucionxbeneficio = $args['idResolucionxbeneficio'] ?? '';
        $this->numero = $args['numero'] ?? '';
        $this->fecha_emision = $args['fecha_emision'] ?? '';
        $this->estadoresolucion = $args['estadoresolucion'] ?? '';
        $this->idBeneficio = $args['idBeneficio'] ?? '';
        $this->nombre = $args['nombre'] ?? '';
        $this->idBeneficioxtipGrupo = $args['idBeneficioxtipGrupo'] ?? '';
        $this->estado = $args['estado'] ?? '';
        $this->nombre_tipo = $args['nombre_tipo'] ?? '';
        $this->idTipoGrupo = $args['idTipoGrupo'] ?? '';
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
        $query = "CALL p_insertarbeneficio( '" . $this->nombre . "','" . $this->numero . "', '" . $this->fecha_emision . "', '" . $this->estadoresolucion . "','" . $this->estado . "'," . $this->idTipoGrupo . ")";

        $resultado = self::$db->query($query);

        if ($resultado) {
            header('Location: /beneficios.php');
        }
    }

    public function actualizar()
    {

        $atributos = $this->sanitizarAtributos();
        $valores = [];
        foreach ($atributos as $key => $value) {
            $valores[] = "{$key}='{$value}'";
        }

        $query = "CALL p_updatebeneficio('" . $this->idBeneficio . "', '" . $this->nombre . "','" . $this->numero . "', '" . $this->fecha_emision . "', '" . $this->estadoresolucion . "','" . $this->estado . "'," . $this->idTipoGrupo . ")";


        $resultado = self::$db->query($query);
        if ($resultado) {
            header('Location: /beneficios.php');
        }
    }

    public function atributos()
    {
        $atributos = [];
        foreach (self::$columnaDB as $columna) {
            if ($columna == 'idResolucionxbeneficio') continue;
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


    public function getTipoGrupo(): string
    {
        $beneficio = $this->idBeneficio;
        $query = "SELECT  * FROM vista_benef_tipo WHERE idTipoGrupo = ${beneficio}";
        $resultado = self::consulta($query)->fetch_assoc();

        if (isset($resultado)) {
            return $resultado['idTipoGrupo'];
        } else {
            return '';
        }
    }



    public function getBeneficio(): string
    {
        $beneficio = $this->idBeneficio;
        $query = "SELECT  nombre FROM beneficio WHERE idBeneficio = ${beneficio}";
        $resultado = self::consulta($query)->fetch_assoc();
        return $resultado['nombre'];
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
        $query = "SELECT * FROM vista_beneficios_tipo";
        $resultado = self::consultarSQL($query);
        return $resultado;
    }
    public static function find($id)
    {
        $query = "SELECT * FROM vista_beneficios_tipo WHERE idBeneficio = " . $id;
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
