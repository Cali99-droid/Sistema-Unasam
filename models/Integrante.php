<?php

namespace Model;

class Integrante extends ActiveRecord
{
    //Base de datos
    protected static $tabla = 'vista_estudiantes';
    protected static $columnaDB = ['idPersona', 'idAlumno', 'codigo', 'dni', 'nombre', 'apellido', 'genero', 'email', 'telefono', 'idEscuela', 'nombre_escuela', 'nombre_procedencia', 'idCondicionEconomica', 'descripcion', 'direccion', 'fecha_inscripcion', 'estado', 'idAlumnoGrupo', 'idgrupo_universitario'];
    //errores
    protected static $errores = [];

    public $idPersona;
    public $idAlumno;
    public $codigo;
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
    public $idAlumnoGrupo;
    public $idgrupo_universitario;

    public function __construct($args = [])
    {

        $this->idAlumno = $args['idAlumno'] ?? '';
        $this->codigo = $args['codigo'] ?? '';
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
        $this->idAlumnoGrupo = $args['idAlumnoGrupo'] ?? '';
        $this->idPersona = $args['idPersona'] ?? '';
    }


    public function asignarGrupo($descripcion, $estado, $idgrupo, $idCondicionEconomica)
    { //TODO
        $query = "CALL p_ingresar_alumno_grupo('" . $this->codigo . "'," . $this->idPersona . ", '" . $descripcion . "',curdate(), '" . $estado . "'," . $idCondicionEconomica . "," . $idgrupo . ");";
        $resultado = self::consulta($query);
        return $resultado;
    }

    public function asignarGrupoS()
    {
        $query = "CALL insert_alumno_grupo('" . $this->dni . "','" . $this->nombre . "', '" . $this->apellido . "', '" . $this->genero . "','" . $this->direccion . "','" . $this->email . "','" . $this->telefono .  "','" . $this->codigo .  "','" .  $this->idEscuela . "','" . $this->nombre_procedencia  . "','" . $this->estado . "','" . $this->idCondicionEconomica . "','" . $this->descripcion . "','" . $this->idgrupo_universitario . "');";
        $resultado = self::consulta($query);
        return $resultado;
    }

    public function updateGrupo($descripcion, $estado, $idgrupo, $idCondicionEconomica)
    { //TODO
        $query = "CALL p_update_alumno_grupo('" . $this->codigo . "'," . $this->idPersona . ", '" . $descripcion . "',curdate(), '" . $estado . "'," . $idCondicionEconomica . ", " . $idgrupo . ");";
        $resultado = self::consulta($query)->fetch_object();
        return $resultado;
    }

    //Función provisional
    public  function getAlumnoGrupo($dni,$idGrupo)
    {
        $alumno = self::SQL("SELECT count(*) valor FROM vista_estudiantes where dni='".$dni."' and idgrupo_universitario='".$idGrupo."'");
        echo json_encode($alumno);
    }
}
