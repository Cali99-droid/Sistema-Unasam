<!--ventana modal-->
<div class="modal-agregar" id="modal-agregar-ev">


    <div class="contenido-modal-grupo">
        <div class="encabezado-modal">
            <h2>Nuevo Evento</h2>
            <span class="close close-evento">&times;</span>

        </div>
        <form class="formulario-grupo" method="POST">

            <label for="nombre_evento">Nombre del Evento</label>
            <input type="text" name="nombre_evento" id="nombre_evento">

            <label for="fecha_inicio">Fecha inicio</label>
            <input type="date" name="fecha_inicio" id="fecha_inicio">

            <label for="fecha_final">Fecha fin</label>
            <input type="date" name="fecha_final" id="fecha_final">

            <input type="hidden" name="cod" value="1" id="valor">
            <input type="hidden" name="idEventosrealizados" value='' id="idEventosrealizados">
            <button class="" type="submit">Aceptar</button>


        </form>

    </div>


</div>