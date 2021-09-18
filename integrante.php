<?php
require 'includes/app.php';


incluirTemplate('barra');
?>


<div class="contenedor-grupos">

    <div class="contenedor-integrante">

        <div class="datos-integrante">
            <img src="build/img/profile.svg" alt="Avatar" class="avatar-int">
            <p>Carlos Alvarado</p>
            <p><?php echo $_GET['id']?></p>
            <p>Ing. sistemas</p>

        </div>

        <div class="detalles-integrante">
            <div class="detalle">
                <h3>Beneficios</h3>
                <ul>
                    <li>Descuento matricula para todos</li>
                    <li>Descuento matricula</li>
                    <li>Descuento matricula</li>
                    <li>Descuento matricula</li>
                </ul>

            </div>

            <div class="detalle">
                <h3>Participaciones</h3>
                <ul>
                    <li>Evento cultural</li>
                    <li>Evento cultural</li>
                    <li>Evento cultural</li>
                    <li>Evento cultural</li>
                </ul>

            </div>

        </div>

    </div>
</div>

<?php

incluirTemplate('cierre');