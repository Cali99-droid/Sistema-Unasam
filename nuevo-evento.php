<?php

use App\Evento;

require 'includes/app.php';
$organizadores = Evento::getOrganizadores();

incluirTemplate('barra');
?>

<div class="contenedor-grupos">
    <div class="titulo-grupos">
        <h2 class="no-margin">Nuevo Evento</h2>
    </div>

    <!-- DIVISIONES DEL NUEVO FORMULARIO -->
    <div>
        <form class="formulario-evento" id="form-evento" method="POST">
            <div class="entrada">
                <label for="nombre_evento">Nombre del Evento</label>
                <input type="text" name="evento[nombre_evento]" id="nombre_evento">

                <label for="fecha_inicio">Fecha inicio</label>
                <input type="date" name="evento[fecha_inicio]" id="fecha_inicio">

                <label for="fecha_final">Fecha fin</label>
                <input type="date" name="evento[fecha_final]" id="fecha_final">

                <div class="org">
                    <label>Organizador</label>
                    <select class="js-example-basic-single " id="idorganizador" name="evento[idorganizador]">
                        <?php while ($org = $organizadores->fetch_object()) : ?>
                            <option value="<?php echo $org->idorganizador ?>"><?php echo $org->organizador ?></option>
                        <?php endwhile; ?>
                    </select>

                    <button type="button" onclick="modal('modal-org', 'boton-agregar-integrante', 'close-org')">Nuevo Organizador</button>


                </div>


            </div>

            <div class="entrada">
                <div class="botones-accion">
                    <button id="btnAgregarEvento" onclick="crearEvento()" type="button">Guardar</button>
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
        <form class="formulario-grupo">

            <?php include 'includes/templates/modales/formOrg.php';  ?>

        </form>
    </div>

</div>
<script>
    $(document).ready(function() {
        $('#idorganizador').select2();

    });
</script>



<?php


incluirTemplate('cierre');
