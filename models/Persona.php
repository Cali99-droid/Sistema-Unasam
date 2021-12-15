<?php

namespace Model;

class Persona extends ActiveRecord
{
    //base datos
    protected static $tabla = 'persona';
    protected static $columnasDB = ['id', 'dni', 'nombre', 'apellido', 'genero', 'direccion', 'email', 'telefono'];

    public $id;
    public $dni;
    public $nombre;
    public $apellido;
    public $genero;
    public $direccion;
    public $email;
    public $telefono;


    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->dni = $args['dni'] ?? '';
        $this->nombre = $args['nombre'] ?? '';
        $this->apellido = $args['apellido'] ?? '';
        $this->genero = $args['genero'] ?? '';
        $this->direccion = $args['direccion'] ?? '';
        $this->email = $args['email'] ?? '';
        $this->telefono = $args['telefono'] ?? '';
    }


    /*
           Mensajes de validacion
     
*/
    //revisa si un alumno ya participò en una invitacion en un grupo
    public function existePersona()
    {
        $query = " SELECT * FROM " . self::$tabla . " dni = '" . $this->dni . "' LIMIT 1";
        $resultado = self::$db->query($query);
        if ($resultado->num_rows) {
            self::$alertas['error'][] = 'La persona ya se encuentra registrada';
        }

        return $resultado;
    }
}
