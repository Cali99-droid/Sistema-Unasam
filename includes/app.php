<?php

require 'funciones.php';
require 'config/database.php';
require __DIR__ . '/../vendor/autoload.php';

//conectar a la base de dato
$db = conectarDB();

use App\Grupo;
use App\Beneficio;
use App\Estudiante;
use App\TipoGrupo;
use App\Evento;

Grupo::setDB($db);
Beneficio::setDB($db);
Estudiante::setDB($db);
TipoGrupo::setDB($db);
Evento::setDB($db);
