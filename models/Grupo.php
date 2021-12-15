<?php

namespace Model;

class Grupo extends ActiveRecord
{
    //base datos
    protected static $tabla = 'grupo_universitario'; //GRUPO_UNIVERSITARIO
    protected static $columnasDB = ['id', 'nombre', 'fecha_creacion', 'resolucion_creacion', 'imagen', 'tipo_grupo_id'];

    public $id;
    public $nombre;
    public $fecha_creacion;
    public $resolucion_creacion;
    public $imagen;
    public $tipo_grupo_id;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
        $this->fecha_creacion = $args['fecha_creacion'] ?? '';
        $this->resolucion_creacion = $args['resolucion_creacion'] ?? '';
        $this->imagen = $args['imagen'] ?? '';
        $this->tipo_grupo_id = $args['tipo_grupo_id'] ?? '';
    }

    public function setImagen($imagen)
    {

        if (!is_null($this->id)) {
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


    public function getCantidadIntegrantes()
    {
        $query = "SELECT count(*) cantidad FROM alumno_x_grupo where grupo_universitario_id = " . $this->id;
        $resultado = self::$db->query($query)->fetch_object();
        return $resultado->cantidad;
    }

    public function getTipoGrupo()
    {
        $tipo = TipoGrupo::find($this->tipo_grupo_id);
        return $tipo->nombre;
    }


    public function getIntegrantes()
    {

        $integrantes = Integrante::where_all('idgrupo_universitario', $this->id);

        return $integrantes;
    }


    public static function buscarGrupo($valor)
    {
        $query = 'SELECT * FROM grupo_universitario  WHERE nombre LIKE "%' . $valor . '%"';
        $grupos = self::consultarSQL($query);
        return $grupos;
    }
}
