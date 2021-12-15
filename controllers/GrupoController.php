<?php

namespace Controllers;

use Model\Grupo;
use Model\TipoGrupo;
use MVC\Router;
use Intervention\Image\ImageManagerStatic as Image;
use Model\AlumnoGrupo;
use Model\Beneficio;
use Model\Beneficio_x_alumno;
use Model\Beneficio_x_tipo_grupo;
use Model\CondicionEconomica;
use Model\Integrante;
use Model\Invitacion;
use Model\ParticipacionAlumno;
use Model\Semestre;
use Model\DatosUser;
use Model\Opcion_x_tipo;
use Model\Rendimiento_academico;

class GrupoController
{


    public static function index(Router $router)
    {
        //session_start();

        // debuguear(substr($_SERVER['PATH_INFO'], 1));
        // validarPermisos(1);
        $grupos = Grupo::all();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            if (isset($_POST['codB'])) {
                $grupos = Grupo::buscarGrupo($_POST['valor']);
            } else {
                $grupo = new Grupo($_POST['grupo']);

                /** Generar nombre unico */
                $nombreImagen = md5(uniqid(rand(), true)) . ".jpg";


                /**Setear imagen */
                if ($_FILES['grupo']['tmp_name']['imagen']) {
                    $image = Image::make($_FILES['grupo']['tmp_name']['imagen'])->fit(800, 600);
                    $grupo->setImagen($nombreImagen);
                }

                /**Subida de Imagenes */
                //crear carpeta
                if (!is_dir(CARPETA_IMAGENES)) {
                    mkdir(CARPETA_IMAGENES);
                }
                //guarda la imagen en el servidor
                $image->save(CARPETA_IMAGENES . $nombreImagen);
                //guarda en la base de datos
                $resultado = $grupo->crear();
                header('Location: /grupos');
            }
        }
        $escuelas = Grupo::consulta('SELECT * FROM escuela');

        $tipos = TipoGrupo::all();
        $grupo = new Grupo();
        $router->render('grupo/index', ['grupos' => $grupos, 'grupo' => $grupo, 'tipos' => $tipos, '$escuelas' => $escuelas]);
    }


    public static function grupo(Router $router)
    {


        $id = validarORedireccionar('/grupos');
        $grupo = Grupo::find($id);
        $escuelas = Integrante::consulta("SELECT * FROM escuela");
        $tipos = TipoGrupo::all();
        $condiciones = CondicionEconomica::all();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $grupo->sincronizar($_POST['grupo']);

            /**Generar nombre unico */
            $nombreImagen = md5(uniqid(rand(), true)) . ".jpg";


            /**Setear imagen */
            if ($_FILES['grupo']['tmp_name']['imagen']) {
                $image = Image::make($_FILES['grupo']['tmp_name']['imagen'])->fit(800, 600);
                $grupo->setImagen($nombreImagen);
            }
            //guarda la imagen en el servidor
            if ($_FILES['grupo']['tmp_name']['imagen']) {
                $image->save(CARPETA_IMAGENES . $nombreImagen);
            }
            //guarda en la base de datos

            $resultado = $grupo->guardar();
            if ($resultado) {
                header('Location: /grupo?id=' . $grupo->id . '&resultado=2');
            }
        }

        if ($grupo) {
            $integrantes = $grupo->getIntegrantes();
            $router->render('grupo/grupo', [
                'grupo' => $grupo,
                'integrantes' => $integrantes,
                'escuelas' => $escuelas,
                'condiciones' => $condiciones,
                'tipos' => $tipos

            ]);
        } else {
            echo ' no existe el grupo';
        }
    }

    public static function integrante(Router $router)
    {
        $idgrupo = validarORedireccionar('/grupos');
        $dni = validarORedireccionarDNI('/grupos');

        $query = "SELECT * FROM vista_estudiantes WHERE dni = " . $dni . " AND " . "idgrupo_universitario = " . $idgrupo;
        $integrante = Integrante::SQL_primer($query);

        if (is_null($integrante) || $integrante->estado == 'inactivo') {
            header('Location: /grupos');
        }
        $grupo = Grupo::find($idgrupo);
        $invitaciones = Invitacion::where_all('grupo_universitario_id', $idgrupo);
        $participaciones = ParticipacionAlumno::where_all('alumno_x_grupo_id', $integrante->idAlumnoGrupo);
        $beneficios = Beneficio_x_tipo_grupo::validarEstado($grupo->tipo_grupo_id, 'ACTIVO'); //derecjos'tipo_grupo_id', )
        $beneficioAsignados = Beneficio_x_alumno::where_all('alumno_x_grupo_id',  $integrante->idAlumnoGrupo);

        $router->render('grupo/integrante', [
            'integrante' => $integrante,
            'grupo' => $grupo,
            'invitaciones' => $invitaciones,
            'participaciones' => $participaciones,
            'beneficios' => $beneficios,
            'beneficioAsignados' => $beneficioAsignados


        ]);
    }

    public static function getParticipaciones()
    {
        $idAlumnoGrupo = $_POST['idAlumnoGrupo'];
        $participaciones = ParticipacionAlumno::where_all('alumno_x_grupo_id', $idAlumnoGrupo);
        $participacion = end($participaciones);
        $participacion->setEvento();
        echo json_encode($participacion);
    }

    public static function setAsistencia()
    {
        isAuth();
        $resultado = [];
        $idinvitacion = $_POST['invitacion_id'];
        $participacionAlumno = new ParticipacionAlumno($_POST);
        if ($participacionAlumno->existe()) {
            $resultado['resultado'] = false;
        } else {
            $participacionAlumno->usuario_id = $_SESSION['id'];
            $idsemestre = Semestre::getIdSemestreActual($idinvitacion);

            if (is_null($idsemestre)) {
                $participacionAlumno->semestre_id = '1';
            } else {
                $participacionAlumno->semestre_id = $idsemestre;
            }
            $resultado = $participacionAlumno->guardar();
        }

        echo json_encode($resultado);
    }

    public static function getIntegrante()
    {
        $id = $_POST['id'];

        $integrante =  Integrante::where('idpersona', $id);
        echo json_encode($integrante);
    }

    public static function setIntegrante()
    {
        $id = $_POST['id'];

        $integrante =  Integrante::where('idpersona', $id);
        echo json_encode($integrante);
    }

    public static function deleteAsistencia()
    {
        $id = $_POST['id'];
        $participacion = ParticipacionAlumno::find($id);
        $resultado = $participacion->eliminar();
        echo json_encode($resultado);
    }


    public static function setBeneficio()
    {
        //$resultado = [];
        $beneficioAlumno = new Beneficio_x_alumno($_POST);
        // if ($beneficioAlumno->existe()) {
        //     $resultado['resultado'] = false;
        // } else {
        $id = $beneficioAlumno->getSemestre();
        $beneficioAlumno->semestre_id = $id;
        $beneficioAlumno->usuario_id = $_SESSION['id'];
        $resultado = $beneficioAlumno->guardar();
        // }

        echo json_encode($resultado);
    }

    public static function getBeneficio()
    {
        $idAlumnoGrupo = $_POST['idAlumnoGrupo'];
        $beneficiosAlumnos = Beneficio_x_alumno::where_all('alumno_x_grupo_id', $idAlumnoGrupo);
        $beneficioAlumno = end($beneficiosAlumnos);
        $beneficioAlumno->getNombreBeneficio();
        echo json_encode($beneficioAlumno);
    }


    public static function updBeneficioEst()
    {
        $id = $_POST['id'];
        $bena = Beneficio_x_alumno::find($id);
        $bena->actEstado();
        $resultado = $bena->guardar();
        echo json_encode($bena);
    }


    public static function crearIntegrante()
    {
        $alumno = new Integrante($_POST);
        $resultado =   $alumno->asignarGrupoS();
        echo json_encode($resultado);
    }


    public static function rendimiento(Router $router)
    {
        $id = validarORedireccionar('/grupos');
        $alumno = Integrante::where('idAlumno', $id);

        if ($alumno) {
            $rendimientos = Rendimiento_academico::where_all('alumno_id', $alumno->idAlumno);
            // debuguear($rendimientos);
        } else {
            echo 'no existe el alumno';
        }
        $semestres = Semestre::all();
        $router->render('grupo/rendimiento', [
            'rendimientos' => $rendimientos,
            'alumno' => $alumno,
            'semestres' => $semestres
        ]);
    }


    public static function setRendimiento()
    {
        $resultado['existe'] = false;
        $rend = new Rendimiento_academico($_POST);
        if (!$rend->existeSemestre()) {
            if ($rend->id == '') {
                $resultado = $rend->crear();
                $resultado = $resultado['resultado'];
            } else {
                $resultado = $rend->actualizar();
            }
        } else {
            $resultado['existe'] = true;
        }

        echo json_encode($resultado);
    }

    public static function delRendimiento()
    {
        // $id = $_POST['id'];
        $rend = new Rendimiento_academico($_POST);
        $resultado = $rend->eliminar();
        echo json_encode($resultado);
    }

    public static function eliminarIntegrante()
    {

        $id = $_POST['id'];
        $al = new AlumnoGrupo($_POST);
        $participacion = ParticipacionAlumno::where('alumno_x_grupo_id', $id);
        $beneficioAsignados = Beneficio_x_alumno::where('alumno_x_grupo_id', $id);
        if (isset($participacion) || isset($beneficioAsignados)) {
            $res = false;
        } else {
            $res = true;
            $al->eliminar();
        }
        echo json_encode($res);
    }
}
