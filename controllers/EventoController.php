<?php

namespace Controllers;

use finfo;
use Model\Evento;
use Model\Organizador;
use Model\Grupo;
use Model\Invitacion;
use MVC\Router;

class EventoController
{
    public static function index(Router $router)
    {


        $grupos = Grupo::all();
        $eventos = Evento::all();
        $router->render('evento/index', ['eventos' => $eventos, 'grupos' => $grupos]);
    }

    public static function v_crear(Router $router)
    {
        $evento = new Evento();
        $organizadores = Organizador::all();
        $router->render('evento/nuevo-evento', [
            'organizadores' => $organizadores,
            'evento' => $evento
        ]);
    }

    public static function crear()
    {
        $evento = new Evento($_POST);
        if ($evento->validarNombre()) {
            $resultado = false;
        } else {
            if ($_POST['id'] === '') {
                $resultado = $evento->crear();
                $resultado = $resultado['resultado'];
            } else {
                $resultado = $evento->guardar();
            }
        }

        echo json_encode($resultado);
    }

    public static function v_actualizar(Router $router)
    {
        $id = validarORedireccionar($_GET['id']);
        $evento =  Evento::find($id);
        $organizadores = Organizador::all();
        $router->render('evento/actualizar-evento', [
            'organizadores' => $organizadores,
            'evento' => $evento
        ]);
    }

    public static function crearOrg()
    {
        $org = new Organizador($_POST);
        $resultado = $org->guardar();
        echo json_encode($resultado);
    }


    public static function invitar()
    {
        $resultado['upt'] = false;
        $resultado['code'] = false;
        $resultado['resultado'] = false;
        $resultado['upd'] = false;
        $evento = Evento::find($_POST['evento_id']);
        $invitacion = new Invitacion($_POST);
        if (!$invitacion->validarInvitacion()) {
            if ($evento->validarInvitacion($_POST['fecha_hora'])) {
                if ($invitacion->id == '') {
                    $resultado = $invitacion->crear();
                } else {
                    //verificar si la invitacion ya esta en la tabla participacion alumno
                    if (!$invitacion->validarEdicion()) {
                        $resultado['upt'] = $invitacion->guardar();
                    } else {
                        $resultado['upd']  = true;
                    }
                }
            } else {
                $resultado['resultado'] = false;
            }
        } else {
            $resultado['code'] = true;
        }


        echo  json_encode($resultado);
    }

    public static function getOrgs()
    {
        $organizadores = Organizador::all();
        echo  json_encode($organizadores);
    }

    public static function verInvitacion(Router $router)
    {
        $invitaciones = Invitacion::all();
        $grupos = Grupo::all();
        $router->render('evento/invitaciones', [
            'invitaciones' => $invitaciones,
            'grupos' => $grupos

        ]);
    }


    public static function eliminarInvitacion()
    {
        $id = $_POST['id'];
        $invitacion = Invitacion::find($id);
        if (!$invitacion->validarEdicion()) {
            $resultado = $invitacion->eliminar();
        } else {
            $resultado = false;
        }

        echo json_encode($resultado);
    }


    public static function eliminarEvento()
    {

        $id = $_POST['id'];
        $evento = new Evento($_POST);
        if (!$evento->estaAsignado()) {
            $resultado = $evento->eliminar();
        } else {
            $resultado = false;
        }

        echo json_encode($resultado);
    }
}
