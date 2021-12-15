<?php

use Model\Integrante;
use Model\TipoGrupo;





//$estudiante=new Estudiante();

//$obj= new clase(); 
$cod = $_POST['cod'];

//Está llamando directo de la otra capa
//los datos que se encuentran en la otra capa y asi la está ejecutando en ésta
switch ($cod) {
    case 1:
        //buscar estudiantes
        echo json_encode(Integrante::where('dni', $_POST['dni']));
        break;
    case 2:
        //buacar tipo
        // echo json_encode(TipoGrupo::getTipo($_POST['id']));
        break;
        //traer beneficio
    case 3:
        //echo json_encode(Beneficio::find($_POST['id']));;
        break;
    case 4:
        // echo json_encode(Evento::find($_POST['id']));;
        break;
    case 5:
        // echo json_encode(User::find($_POST['dni']));
        break;
}
