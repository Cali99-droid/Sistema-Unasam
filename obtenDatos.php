<?php
require 'includes/app.php';

use App\Estudiante;
use App\TipoGrupo;

//$estudiante=new Estudiante();

//$obj= new clase(); 
$cod = $_POST['cod'];

//Está llamando directo de la otra capa
//los datos que se encuentran en la otra capa y asi la está ejecutando en ésta
switch ($cod) {
    case 1:
        echo json_encode(Estudiante::find($_POST['dni']));
        break;
    case 2:
        echo json_encode(TipoGrupo::getTipo($_POST['id']));
        break;
    case "pastel":
        echo "i es un pastel";
        break;
}
