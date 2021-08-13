<!--ventana modal-->
<div class="modal-agregar" id="modal-agregar">


    <div class="contenido-modal-grupo">
        <div class="encabezado-modal">
            <h2>Nuevo Evento</h2>
            <span class="close close-evento">&times;</span>

        </div>
        <form class="formulario-grupo" method="POST">

            <label for="nombre-evento">Nombre del Evento</label>
            <input type="text" name="nombre-evento" id="nombre-evento">

            <label for="fecha-inicio">Fecha inicio</label>
            <input type="date" name="fecha-inicio" id="fecha-inicio">

            <label for="fecha-fin">Fecha fin</label>
            <input type="date" name="fecha-fin" id="fecha-fin">

            <input type="hidden" name="cod" value="1">
            <button class="" type="submit">Aceptar</button>


        </form>

    </div>


</div>