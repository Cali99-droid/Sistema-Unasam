<?php

namespace App;


class Grupo
{
    //Base de datos
    protected static $db;
    protected static $columnaDB = ['idgrupo_universitario', 'nombre_grupo', 'fecha_creacion', 'resolucion_creacion',  'imagen', 'idTipoGrupo'];

    //errores
    protected static $errores = [];

    public $idgrupo_universitario;
    public $nombre_grupo;
    public $fecha_creacion;
    public $imagen;
    public $resolucion_creacion;
    public $idTipoGrupo;


    public function __construct($args = [])
    {
        $this->idgrupo_universitario = $args['idgrupo_universitario'] ?? '';
        $this->nombre_grupo = $args['nombre_grupo'] ?? '';
        $this->fecha_creacion = $args['fecha_creacion'] ?? '';
        $this->imagen = $args['imagen'] ?? '';
        $this->resolucion_creacion = $args['resolucion_creacion'] ?? '';
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
        $query = "INSERT INTO grupo_universitario(";
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
        $query = " UPDATE grupo_universitario SET ";
        $query .= join(', ', $valores);
        $query .= " WHERE idgrupo_universitario = '" . self::$db->escape_string($this->idgrupo_universitario) . "' ";
        $query .= " LIMIT 1 ";


        $resultado = self::$db->query($query);
    }

    public function atributos()
    {
        $atributos = [];
        foreach (self::$columnaDB as $columna) {
            if ($columna == 'idgrupo_universitario') continue;
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

    public function setImagen($imagen)
    {

        if (!is_null($this->idgrupo_universitario)) {
            //comprobar si existe el archivo
            $this->borrarImagen();
        }
        //asignar al atributo de imagen el nombre de la imagen
        if ($imagen) {
            $this->imagen = $imagen;
        }
    }

    //eliminar imagen
    public function borrarImagen()
    {
        $existeArchivo = file_exists(CARPETA_IMAGENES . $this->imagen);
        if ($existeArchivo) {
            unlink(CARPETA_IMAGENES . $this->imagen);
        }
    }

    public function getTipo(): string
    {
        $tipo = $this->idTipoGrupo;
        $query = "SELECT  nombre_tipo FROM tipo_grupo WHERE idTipoGrupo = ${tipo}";
        $resultado = self::consulta($query)->fetch_assoc();
        return $resultado['nombre_tipo'];
    }

    public function getIntegrantes()
    {
        $idgrupo = $this->idgrupo_universitario;
        $query = "SELECT * FROM vista_alumno_x_grupo WHERE idgrupo_universitario = ${idgrupo}";
        $resultado = self::consulta($query);
        return $resultado;
    }


    public function getBeneficios()
    {
        $idgrupo = $this->idTipoGrupo;
        $query = "SELECT idBeneficio FROM beneficioxtipgrupoo WHERE idTipoGrupo = ${idgrupo}";
        $resultado = self::consulta($query);
        return $resultado;
    }

    public function setIntegrante($alumno)
    {

        $resultado = $alumno->crear($this->idgrupo_universitario);


        return $resultado;
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
        $query = "SELECT * FROM vista_grupo_universitario";
        $resultado = self::consultarSQL($query);
        return $resultado;
    }
    // trae un grupo
    public static function getGrupo($id): Grupo
    {
        $query = "SELECT * FROM vista_grupo_universitario WHERE idgrupo_universitario = ${id}";
        $resultado = self::consultarSQL($query);
        return $resultado[0];
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
