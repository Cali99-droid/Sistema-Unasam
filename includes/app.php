<?php

require 'funciones.php';
require 'config/database.php';
require __DIR__ . '/../vendor/autoload.php';

//conectar a la base de dato
$db = conectarDB();

use App\Grupo;

Grupo::setDB($db);
