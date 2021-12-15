<div class="modal-agregar" id="modal-tipo">


    <div class="contenido-modal-grupo">
        <div class="encabezado-modal">
            <h2 id="titulo_tipo">Ingrese nuevo tipo de grupo</h2>
            <span class="close close-tipo">&times;</span>

        </div>

        <form method="POST" class="formulario-grupo">

            <label for="nombre_tipo">Nombre del tipo</label>
            <input type="text" name="nombre_tipo" id="nombre_tipo" value="<?php $tip->nombre ?? '' ?>">

            <input type="hidden" name="cod" value="1" id="valor">
            <input type="hidden" name="idTipoGrupo" value='' id="idTipoGrupo">
            <button type="button" id="crearTipo">Aceptar</button>

        </form>

    </div>

</div>