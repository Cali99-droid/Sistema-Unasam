<div class="modal-agregar " id="modal-grupo">
    <div class="contenido-modal-grupo ">
        <div class="encabezado-modal">
            <h2>Nuevo Grupo</h2>
            <span class="close close-grupo">&times;</span>

        </div>
        <form class="formulario-grupo" method="POST" enctype="multipart/form-data">

            <label for="nombre_grupo">Nombre del grupo</label>
            <input type="text" name="nombre_grupo" id="nombre-grupo" required>

            <label for="fecha_creacion">Fecha de Creacion</label>
            <input type="date" name="fecha_creacion" id="fecha_creacion">

            <label for="resolucion_creacion">Resolucion</label>
            <input type="text" name="resolucion_creacion" id="resolucion">

            <div class="contenido-tipos">
                <div class="cont-tip">
                    <label for="idTipoGrupo">Tipo de Grupo</label>
                    <select name="idTipoGrupo" id="tipo-grupo">
                        <option value="" selected>--Seleccione--</option>

                        <!--  <? //php echo $tipo === $row['idTipoGrupo'] ? 'selected' : '' 
                                ?>-->

                    </select>
                </div>

                <div class="cont-tip">
                    <button class="" type="button" id="boton-agregar-tipo" onclick="modal('modal-tipo', 'boton-agregar-tipo', 'close-tipo')">
                        <i class="fas fa-plus-circle"></i> Nuevo tipo
                    </button>

                </div>

            </div>


            <div>
                <label for="imagen">Imagen de Grupo</label>
                <input type="file" name="imagen">
            </div>

            <button type="submit">Aceptar</button>

        </form>

    </div>
</div>