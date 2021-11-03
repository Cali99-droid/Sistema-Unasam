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
                    <button type="button" onclick="modal('modal-org', 'boton-agregar-integrante', 'close-org')">Nuevo Organizador</button>
                    <input type="text" id="cod" name="cod" value="7" hidden>

                </div>


            </div>

            <div class="entrada">
                <label>Asignar Grupo</label>
                <input type="text" id="grupoBuscado" name="grupoBuscado" placeholder="Escriba nombre de grupo">


                <div class="botones-accion">
                    <button id="btnAgregarIvtc">Guardar</button>
                    <button id="btnCancelar">Cancelar</button>
                </div>

            </div>
        </form>
    </div>
    <!---->
</div>


</div>
</div>

<div class="modal-agregar" id="modal-org">

    <div class="contenido-modal-grupo modal-org">
        <div class="encabezado-modal">
            <h2 id="titulo_integrante">Nuevo Organizador</h2>
            <span class=" close close-org">&times;</span>

        </div>
        <form method="POST" class="formulario-grupo">

            <?php include 'includes/templates/modales/formOrg.php';  ?>



        </form>
    </div>

</div>




<?php


incluirTemplate('cierre');
