<?php
require 'includes/app.php';

use App\Estudiante;
use App\TipoGrupo;
use App\Beneficio;
use App\Evento;
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
        // echo json_encode(Beneficio::find($_POST['id']));;
        break;
    case 4:
        //  echo json_encode(Evento::find($_POST['id']));;
        break;
    case 5:
        // echo json_encode(User::find($_POST['dni']));
        break;
}
