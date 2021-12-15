<?php

namespace Controllers;

use Model\Beneficio;
use Model\Beneficio_x_tipo_grupo;
use Model\Datos_ben_x_tipoGp;
use Model\Resolucion_x_beneficio;
use Model\TipoGrupo;
use Model\Desercion;
use MVC\Router;
class DesercionController
{
    public static function index(Router $router)
    {
        $descripcion = Desercion::all();
        //$tipos = TipoGrupo::all();
        $router->render('desercion/index', [
            'descripcion' => $descripcion
            //'tipos' => $tipos
        ]);
    }

    public static function setDesercion()
    {
        $id = $_POST['id'];
        $desercion = new Desercion($_POST);

       if ($desercion->validarNombre()) {
            $resultado = false;
        } else {
            if ($id ==='') {
                $resultado = $desercion->crear();
                $resultado =  $resultado['resultado'];
            } else {
                $resultado = $desercion->actualizar();
            }
        }
        echo json_encode($resultado);
    }
    public static function actualizarDesercion(Router $router)
    {
        $id = validarORedireccionar($_GET['id']);
        $desercion =  Desercion::find($id);
        //$organizadores = Organizador::all();
        $router->render('desercion/desercion-actualizar', [
            //'organizadores' => $organizadores
            'desercion' => $desercion
        ]);
    }

    public static function crear()
    {
        //  $doc =  $_POST['doc'];
        $ben = new Beneficio($_POST['beneficio']);

        if ($ben->validarNombre()) {
            $resultado = false;
        } else {

            if ($_POST['cod'] == 2) {
                //actualizando
                $doc = $_FILES["doc"];
                $nombreDoc = md5(uniqid(rand(), true)) . ".pdf";

                $beneficio = new Beneficio($_POST['beneficio']);
                $beneficio->guardar();
                $resolucion = new Resolucion_x_beneficio($_POST['resolucion_x_beneficio']);
                if ($resolucion->id) {
                    $ress = Resolucion_x_beneficio::find($resolucion->id);
                } else {
                    $ress =  new Resolucion_x_beneficio($_POST['resolucion_x_beneficio']);
                }

                $ress->beneficio_id = $beneficio->id;
                $ress->setDoc($nombreDoc);
                move_uploaded_file($doc["tmp_name"], CARPETA_DOCS . $nombreDoc);

                if ($ress->id == '') {
                    $resultado = $ress->crear();
                } else {
                    $resultado = $ress->guardar();
                }
            } else {
                //creando
                $doc = $_FILES["doc"];
                $beneficio = new Beneficio($_POST['beneficio']);
                $res = $beneficio->crear();
                $id = $res['id'];
                $resolucion = new Resolucion_x_beneficio($_POST['resolucion_x_beneficio']);
                $resolucion->beneficio_id = $id;

                $nombreDoc = md5(uniqid(rand(), true)) . ".pdf";

                //set archivo
                $resolucion->setDoc($nombreDoc);
                move_uploaded_file($doc["tmp_name"], CARPETA_DOCS . $nombreDoc);



                $resu = $resolucion->crear();
                $resultado = $res['resultado'];
            }
        }




        echo json_encode($resultado);
    }

    public static function desercion_eliminar()
    {
        $id = $_POST['id'];
        $desercion = Desercion::find($id);
        
            $resultado =  $desercion->eliminar();
        

        echo json_encode($resultado);
    }
    public static function asignarBeneficio()
    {
        $id = $_POST['id'];
        $beneficioAsignado = new Beneficio_x_tipo_grupo($_POST);
        if ($beneficioAsignado->validarExistencia()) {
            $resultado = false;
        } else {
            if ($id == '') {
                $resultado =   $beneficioAsignado->crear();
                $resultado = $resultado['resultado'];
            } else {
                //verificar si ya esta en la tabla beneficio x alumno
                if (!$beneficioAsignado->validarAsignacion()) {
                    $resultado =  $beneficioAsignado->guardar();
                } else {
                    $resultado = false;
                }
            }
        }

        echo json_encode($resultado);
    }

    public static function getBeneficio()
    {
        $id = $_POST['id'];
        $beneficio = Beneficio::find($id);
        $resultado = $beneficio->getResolucion()->fetch_assoc();
        echo  json_encode($resultado);
    }


    public static function verBeneficiosTipo(Router $router)
    {
        $beneficios = Beneficio::all();
        $tipos = TipoGrupo::all();
        $beneficiosTipo = Datos_ben_x_tipoGp::all();
        $router->render('beneficio/beneficiosXtipoGrupo', [
            'beneficiosTipo' => $beneficiosTipo,
            'beneficios' => $beneficios,
            'tipos' => $tipos

        ]);
    }


    public static function eliminarBenTipo()
    {
        $id = $_POST['id'];
        $beneficiosTipo = Beneficio_x_tipo_grupo::find($id);
        if (!$beneficiosTipo->validarAsignacion()) {
            $resultado =  $beneficiosTipo->eliminar();
        } else {
            $resultado = false;
        }

        echo json_encode($resultado);
    }
}
