<label for="nombre">Nombre del grupo</label>
<input type="text" name="grupo[nombre]" id="nombre-grupo" value="<?php echo $grupo->nombre;  ?>" required>

<label for="fecha_creacion">Fecha de Creacion</label>
<input type="date" name="grupo[fecha_creacion]" id="fecha_creacion" value="<?php echo $grupo->fecha_creacion;  ?>" required>

<label for="resolucion_creacion">Resolucion</label>
<input type="text" name="grupo[resolucion_creacion]" id="resolucion" value="<?php echo $grupo->resolucion_creacion;  ?>" required>

<div class="contenido-tipos">
    <div class="cont-tip">
        <label for="tipo_grupo_id">Tipo de Grupo</label>
        <select name="grupo[tipo_grupo_id]" id="tipo_grupo_id" required>
            <option value="" selected>--Seleccione--</option>

            <?php foreach ($tipos as $tipo) : ?>
                <option <?php echo $grupo->tipo_grupo_id == $tipo->id ? 'selected' : ''
                        ?> value="<?php echo $tipo->id; ?>"><?php echo $tipo->nombre; ?></option>
            <?php endforeach; ?>

        </select>
    </div>

    <div class="cont-tip">
        <button class="" type="button" id="boton-agregar-tipo" onclick="modalS('modal-tipo', 'boton-agregar-tipo', 'close-tipo')">
            <i class="fas fa-plus-circle"></i> Nuevo tipo
        </button>

    </div>

</div>


<div>
    <label for="imagen">Imagen de Grupo</label>
    <input type="file" name="grupo[imagen]" accept='image/png,.jpeg,.jpg,image/gif'>>
</div>