<label for="nombre_grupo">Nombre del grupo</label>
<input type="text" name="grupo[nombre_grupo]" id="nombre-grupo" value="<?php echo $grupo->nombre_grupo;  ?>" required>

<label for="fecha_creacion">Fecha de Creacion</label>
<input type="date" name="grupo[fecha_creacion]" id="fecha_creacion" value="<?php echo $grupo->fecha_creacion;  ?>">

<label for="resolucion_creacion">Resolucion</label>
<input type="text" name="grupo[resolucion_creacion]" id="resolucion" value="<?php echo $grupo->resolucion_creacion;  ?>">

<div class="contenido-tipos">
    <div class="cont-tip">
        <label for="idTipoGrupo">Tipo de Grupo</label>
        <select name="grupo[idTipoGrupo]" id="tipo-grupo">
            <option value="" selected>--Seleccione--</option>
            <?php while ($row = mysqli_fetch_assoc($tipos)) : ?>
                <option <?php echo $grupo->idTipoGrupo == $row['idTipoGrupo'] ? 'selected' : '' ?> value="<?php echo $row['idTipoGrupo']; ?>"><?php echo $row['nombre_tipo']; ?>
                <?php endwhile; ?>
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
    <input type="file" name="grupo[imagen]">
</div>