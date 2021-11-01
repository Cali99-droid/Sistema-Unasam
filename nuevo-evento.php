<?php

require 'includes/app.php';
incluirTemplate('barra');
?>

<div class="contenedor-grupos">
    <div class="titulo-grupos">
        <h2 class="no-margin">Nuevo Evento</h2>
    </div>

    <!-- DIVISIONES DEL NUEVO FORMULARIO -->
    <div>
        <form class="formulario-evento" method="POST">
            <div class="entrada">
                <label for="nombre_evento">Nombre del Evento</label>
                <input type="text" name="nombre_evento" id="nombre_evento">

                <label for="fecha_inicio">Fecha inicio</label>
                <input type="date" name="fecha_inicio" id="fecha_inicio">

                <label for="fecha_final">Fecha fin</label>
                <input type="date" name="fecha_final" id="fecha_final">

                <div class="org">
                    <label>Organizador</label>
                    <input type="text" id="nombreOrganizador" name="nombreOrganizador" placeholder="Buscar Organizador">
                    <button>Nuevo Organizador</button>
                    <input type="text" id="cod" name="cod" value="7" hidden>

                </div>


            </div>

            <div class="entrada">
                <label>Asignar Grupo</label>
                <input type="text" id="grupoBuscado" name="grupoBuscado" placeholder="Escriba nombre de grupo">



                <button id="btnAgregarIvtc">Guardar</button>
                <button id="btnCancelar">Cancelar</button>
            </div>
        </form>
    </div>
    <!---->
</div>


</div>
</div>





<?php


incluirTemplate('cierre');
