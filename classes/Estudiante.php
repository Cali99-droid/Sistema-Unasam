<?php

namespace App;

class Estudiante
{
    //Base de datos
    protected static $db;
    protected static $columnaDB = ['idPersona', 'idAlumno', 'codigo_alumno', 'dni', 'nombre', 'apellido', 'genero', 'email', 'telefono', 'idEscuela', 'nombre_escuela', 'nombre_procedencia', 'idCondicionEconomica', 'descripcion', 'direccion', 'fecha_inscripcion', 'estado', 'idgrupo_universitario'];
    //errores
    protected static $errores = [];

    public $idPersona;
    public $idAlumno;
    public $codigo_alumno;
    public $dni;
    public $nombre;
    public $apellido;
    public $genero;
    public $email;
    public $telefono;
    public $idEscuela;
    public $nombre_escuela;
    public $idCondicionEconomica;
    public $nombre_procedencia;
    public $descripcion;
    public $direccion;
    public $fecha_inscripcion;
    public $estado;
    public $idgrupo_universitario;

    public function __construct($args = [])
    {

        $this->idAlumno = $args['idAlumno'] ?? '';
        $this->codigo_alumno = $args['codigo_alumno'] ?? '';
        $this->dni = $args['dni'] ?? '';
        $this->nombre = $args['nombre'] ?? '';
        $this->apellido = $args['apellido'] ?? '';
        $this->genero = $args['genero'] ?? '';
        $this->email = $args['email'] ?? '';
        $this->telefono = $args['telefono'] ?? '';
        $this->idEscuela = $args['idEscuela'] ?? '';
        $this->nombre_escuela = $args['nombre_escuela'] ?? '';
        $this->nombre_procedencia = $args['nombre_procedencia'] ?? '';
        $this->idCondicionEconomica = $args['idCondicionEconomica'] ?? '';
        $this->descripcion = $args['descripcion'] ?? '';
        $this->direccion = $args['direccion'] ?? '';
        $this->fecha_inscripcion = $args['fecha_inscripcion'] ?? date('Y-m-d');
        $this->estado = $args['estado'] ?? '';
        $this->idgrupo_universitario = $args['idgrupo_universitario'] ?? '';
        $this->idPersona = $args['idPersona'] ?? '';
    }

    //definir la conexion a la bd
    public static function setDB($dataBase)
    {
        self::$db = $dataBase;
    }


    public function actualizar($id)
    {
        $query = "CALL proce_updateAlumno_dos('" . $this->idPersona . "' ,'" . $this->dni . "' ,'" . $this->nombre . "','" . $this->apellido . "' ,'" . $this->genero . "','" . $this->direccion . " ','" . $this->email . " ','" . $this->telefono . "',
        '" . $this->codigo_alumno . "' , " . $this->idEscuela . " , '" . $this->nombre_procedencia . "' ," . $this->idCondicionEconomica . ", '" . $this->descripcion . "' ,
        '" . $this->fecha_inscripcion . "' , '" . $this->estado . "' , " . $id . ")";

        $resultado = self::consulta($query)->fetch_object();

        if ($resultado->valor == '1') {
            // self::$errores[] = 'El DNI ya existe';
            header('Location: /grupo.php?id=' . $id . "&mensaje=el codigo se repite");
        } elseif ($resultado->valor == '2') {
            header('Location: /grupo.php?id=' . $id . "&mensaje=el dni se repite");
        } else {
            header('Location: /grupo.php?id=' . $id);
        }
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

    public function crear($id)
    {

        $query = "CALL p_insertarAlumno ('" . $this->dni . "' ,'" . $this->nombre . "','" . $this->apellido . "' ,'" . $this->genero . "','" . $this->direccion . " ','" . $this->email . " ','" . $this->telefono . "',
        '" . $this->codigo_alumno . "' , " . $this->idEscuela . " , '" . $this->nombre_procedencia . "' ," . $this->idCondicionEconomica . ", '" . $this->descripcion . "' ,
        '" . $this->fecha_inscripcion . "' , '" . $this->estado . "', " . $id . ")";

        $resultado = self::consulta($query)->fetch_object();

        $this->recarga($resultado, $id);
    }

    function recarga($resultado, $id)
    {
        if ($resultado->valor == '1') {
            // self::$errores[] = 'El DNI ya existe';
            header('Location: ./grupo.php?id=' . $id . "&mensaje=El DNI ya Existe");
        } else {
            header('Location: ./grupo.php?id=' . $id);
        }
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
        $query = "SELECT * FROM Vista_Estudiantes";
        $resultado = self::consultarSQL($query);
        return $resultado;
    }

    public static function find($dni)
    {
        $query = "SELECT * FROM vista_Estudiantes WHERE dni = " . $dni;
        $resultado = self::consultarSQL($query);
        return $resultado[0];
    }
    // trae un grupo
    public static function getIntegrantes($id)
    {
        $query = "SELECT * FROM Vista_Estudiantes WHERE idgrupo_universitario = ${id}";
        $resultado = self::consultarSQL($query);

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

    public   function getIdAlumnoGrupo()
    {

        $query = "SELECT idAlumnoGrupo FROM alumnogrupo WHERE idAlumno = " . $this->idAlumno . " AND idgrupo_universitario = " . $this->idgrupo_universitario;

        $resultado = self::consulta($query)->fetch_assoc();

        return $resultado;
    }

    public static function getBeneficiosAsignados(Estudiante $est)
    {
        $alumnoGrupo = $est->getIdAlumnoGrupo();

        $query = "SELECT * FROM vista_beneficioAlumnos WHERE idAlumnoGrupo = " . $alumnoGrupo['idAlumnoGrupo'];

        $resultado = self::consulta($query);

        return $resultado;
    }

    public static function getNumBeneficiosAsignados(Estudiante $est)
    {
        $alumnoGrupo = $est->getIdAlumnoGrupo();

        $query = "SELECT count(*) cantidad FROM vista_beneficioAlumnos WHERE idAlumnoGrupo = " . $alumnoGrupo['idAlumnoGrupo'] . " AND EstadoBenAlum = 'PENDIENTE' ";

        $resultado = self::consulta($query)->fetch_object();

        return $resultado;
    }



    public static function asignarBeneficio($idAlumnoGrupo, $idbeneficioXtipo)
    {
        $query = "CALL proc_insrtBenAlumno ('" . $idAlumnoGrupo . "','" . $idbeneficioXtipo . "', 4 ,6) ";
        $resultado = self::consulta($query)->fetch_object();
        return $resultado;
    }

    public static function actualizarEstadoBeneficio($id)
    {
        $query = "SELECT estado FROM beneficioalumno WHERE idBeneficioalumno =  " . $id;
        $resultado = self::consulta($query)->fetch_object();
        if ($resultado->estado == 'CUMPLIDO') {
            $quer = "UPDATE beneficioalumno SET estado = 'PENDIENTE'  WHERE idbeneficioalumno = " . $id;
        } else {
            $quer = "UPDATE beneficioalumno SET estado = 'CUMPLIDO', fechefec = CURDATE() WHERE idbeneficioalumno = " . $id;
        }

        $res = self::consulta($quer);
    }

    public function getParticipaciones()
    {
        $id = $this->getIdAlumnoGrupo();
        $query = "SELECT * FROM vista_asistenciaAlumno WHERE idAlumnoGrupo = '" . $id['idAlumnoGrupo'] . "' ;";

        $resultado = self::consulta($query);
        return $resultado;
    }
}
