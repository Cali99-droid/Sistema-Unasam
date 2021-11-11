<?php
require 'includes/app.php';
incluirTemplate('barra');
?>

<h1>Reportes</h1>
<div class="contenido-grupos">
    <div class="grupo">
        <a href="/reporte/reporte1.php" target="_blank">
            <img src="https://conceptodefinicion.de/wp-content/uploads/2019/05/Tendencia-1.jpg" alt="Avatar" class="grupo-imagen">
            <div class="container">
                <h4> Reporte de tendecia de estudiantes </h4>
                <p>Lista a los alumnos que parcticpan</p>
            </div>

        </a>

    </div>

    <div class="grupo">
        <a href="/reporte/reporte2.php">
            <div class="container">
                <h4>Reporte 2</h4>
            </div>
        </a>

    </div>

    <div class="grupo">
        <a href="/reporte/reporte3.php">
            <div class="container">
                <h4>Reporte 3</h4>
            </div>
        </a>

    </div>

    <div class="grupo">
        <a href="/reporte/reporte4.php">
            <div class="container">
                <h4>Reporte 4</h4>
            </div>
        </a>

    </div>


</div>

<?php
incluirTemplate('cierre');
