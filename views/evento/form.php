    <!-- DIVISIONES DEL NUEVO FORMULARIO -->
    <div>
        <form class="formulario-evento" id="form-evento" method="POST">
            <div class="entrada">
                <label for="nombre_evento">Nombre del Evento</label>
                <input type="text" name="evento[nombre]" id="nombre_evento" value="<?php echo $evento->nombre; ?>">

                <label for="fecha_inicio">Fecha inicio</label>
                <input type="date" name="evento[fecha_inicio]" id="fecha_inicio" value="<?php echo $evento->fecha_inicio; ?>"" >

                <label for=" fecha_final">Fecha fin</label>
                <input type="date" name="evento[fecha_fin]" id="fecha_fin" value="<?php echo $evento->fecha_fin; ?>">

                <div class=" org">
                    <label>Organizador</label>
                    <select class="js-example-basic-single " id="idorganizador" name="evento[organizador_id]">
                        <?php foreach ($organizadores as $org) : ?>
                            <option <?php echo $evento->organizador_id === $org->id ? 'selected' : ''  ?> value="<?php echo $org->id ?>"><?php echo $org->nombre ?></option>
                        <?php endforeach; ?>
                    </select>

                    <button type="button" onclick="modalS('modal-org', 'boton-agregar-integrante', 'close-org')"> <i class="fas fa-plus-circle"> </i> Nuevo Organizador</button>


                </div>
                <div class="botones-accion">
                    <input type="hidden" value="<?php echo $evento->id ?>" id="idevento">
                    <button id="btnAgregarEvento" onclick="crearEvento()" type="button"><i class="far fa-save"></i> Guardar</button>
                    <button id="btnCancelar" type="reset">Cancelar</button>
                </div>

            </div>

            <div class="entrada">


            </div>
        </form>
    </div>