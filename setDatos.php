<?php
require 'includes/app.php';

use App\Estudiante;
use App\TipoGrupo;
use App\Beneficio;
use App\Evento;
use App\Invitacion;
use App\User;

//$estudiante=new Estudiante();

//$obj= new clase(); 
$cod = $_POST['cod'];

//Está llamando directo de la otra capa
//los datos que se encuentran en la otra capa y asi la está ejecutando en ésta
switch ($cod) {
    case 1:
        //asignar Beneficio
        $resultado =  Estudiante::asignarBeneficio($_POST['idAlumnoGrupo'], $_POST['idbeneficioXtipo']);
        echo $resultado->valor;
        break;
    case 2:
        //actualiar estado
        $resultado =  Estudiante::actualizarEstadoBeneficio($_POST['id']);
        echo $resultado;
        break;
        //traer beneficio
    case 3:
        $resultado = Beneficio::asignarBeneficio($_POST['estado'], $_POST['idbeneficio'], $_POST['idTipoGrupo']);
        echo $resultado->valor;

        break;
    case 4:
        $invitacion = new Invitacion($_POST['invitacion']);
        $resultado = $invitacion->crear();
        echo $resultado->valor;
        //  echo json_encode(Evento::find($_POST['id']));;
        break;
    case 5:
        $resultado = Evento::setOrganizador($_POST['nombre'], $_POST['contacto']);
        echo $resultado;
        break;

    case 6:
        $evento = new Evento($_POST['evento']);
        $resultado = $evento->crear()->fetch_object();
        echo $resultado->valor;
        break;

    case 7:
        $invitacion = Invitacion::find($_POST['idinvitacion']);
        $resultado = $invitacion->confirmarAsistencia($_POST['idAlumnoGrupo'], $_POST['tipo']);
        echo $resultado->valor;
        break;
}
