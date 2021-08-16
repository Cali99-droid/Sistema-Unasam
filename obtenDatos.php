<?php 
    require 'includes/app.php';
    use App\Estudiante;
    
    //$estudiante=new Estudiante();
    
    //$obj= new clase(); 
	echo json_encode(Estudiante::find($_POST['dni'])); //Está llamando directo de la otra capa
														//los datos que se encuentran en la otra capa y asi la está ejecutando en ésta
