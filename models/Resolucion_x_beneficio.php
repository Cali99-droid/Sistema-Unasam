<?php

namespace Model;

class Resolucion_x_beneficio extends ActiveRecord
{
    //base datos
    protected static $tabla = 'resolucion_x_beneficio';
    protected static $columnasDB = ['id', 'numero_resolucion', 'fecha_emision', 'estado', 'doc', 'beneficio_id'];

    public $id;
    public $numero_resolucion;
    public $fecha_emision;
    public $estado;
    public $doc;
    public $beneficio_id;


    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->numero_resolucion = $args['numero_resolucion'] ?? '';
        $this->fecha_emision = $args['fecha_emision'] ?? '';
        $this->estado = $args['estado'] ?? '';
        $this->doc = $args['doc'] ?? '';
        $this->beneficio_id = $args['beneficio_id'] ?? '';
    }


    /**
     * Mensajes de validacion
     */

    //revisa si un numero ya existe


    public function setDoc($doc)
    {

        if ($this->id != '') {
            //comprobar si existe el archivo
            $this->borrarDoc();
        }
        //asignar al atributo de imagen el nombre de la imagen
        if ($doc) {
            $this->doc = $doc;
        }
    }

    //eliminar imagen
    public function borrarDoc()
    {
        if ($this->doc != '') {
            $existeArchivo = file_exists(CARPETA_DOCS . $this->doc);
            if ($existeArchivo) {
                unlink(CARPETA_DOCS . $this->doc);
            }
        }
    }
}
