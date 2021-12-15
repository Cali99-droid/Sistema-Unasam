<?php

namespace Controllers;

use Model\AlumnoGrupo;
use Model\Integrante;
use Model\TipoGrupo;

class APIController
{

    public static function getTipos()
    {
        $tipos = TipoGrupo::all();
        echo json_encode($tipos);
    }

    public static function guardarTipo()
    {
        $id = $_POST['id'];
        $tipo = new TipoGrupo($_POST);

        if ($tipo->validarNombre()) {
            $resultado = false;
        } else {
            if ($id) {
                $resultado = $tipo->actualizar();
            } else {
                $resultado = $tipo->crear();
                $resultado =  $resultado['resultado'];
            }
        }


        // $resultado = $tipo->guardar();['resultado' => $resultado]
        echo json_encode($resultado);
    }


    public static function getAlumno()
    {
        $dni = $_POST['dni'];
        $alumno = Integrante::where('dni', $dni);
        echo json_encode($alumno);
    }

    public static  function setAlumno()
    {

        if ($_POST['cod'] == 2) {
            $dni = $_POST['dni'];
            $idgrupo = $_POST['idgrupo'];
            $descripcion = $_POST['descripcion'];
            $idCondicionEconomica = $_POST['idCondicionEconomica'];
            $estado = $_POST['estado'];
            $alumno = Integrante::where('dni', $dni);
            $res = $alumno->updateGrupo($descripcion, $estado, $idgrupo, $idCondicionEconomica);
            if ($res->valor == 1) {
                $resultado = true;
            }
        } else {
            /*** Primero se debe buscar en la bd local
             *   si no existe se buscar en la API
             *   Si el alumno no existe en la bd local
             *   se deberá crear ese alumno y asignar los nuevos datos de este
             *   en caso exista se deberá solo asignar el dni al grupo
             */

            $dni = $_POST['dni'];
            $idgrupo = $_POST['idgrupo'];
            $descripcion = $_POST['descripcion'];
            $idCondicionEconomica = $_POST['idCondicionEconomica'];
            $estado = $_POST['estado'];
            $alumno = Integrante::where('dni', $dni);
            //validar que no se repita en el grupo
            $query = 'SELECT * FROM alumno_x_grupo WHERE grupo_universitario_id = ' . $idgrupo . ' AND alumno_id = ' . $alumno->idAlumno;
            $res = AlumnoGrupo::consulta($query);
            $respuesta = $res->fetch_assoc();

            //validar existencia
            if (!is_null($respuesta)) {
                $resultado = false;
            } else {
                //ejecutar proce

                $res = $alumno->asignarGrupo($descripcion, $estado, $idgrupo, $idCondicionEconomica);
                if ($res) {
                    $resultado = true;
                }
            }
        }


        echo json_encode($resultado);
    }


    public static function eliminarTipo()
    {
        $tipo = new TipoGrupo($_POST);
        if (!$tipo->estaAsignado()) {
            $resultado = $tipo->eliminar();
        } else {
            $resultado = false;
        }

        echo json_encode($resultado);
    }
}
