<input type="hidden" value="" id="idbeneficio">
<label for="idTipoGrupo">Tipo de Grupo</label>
<select class="js-example-basic-single " id="idTipoGrupo" name="idTipoGrupo">
    <?php foreach ($tipos as $tipo) : ?>
        <option value="<?php echo $tipo->id ?>"><?php echo $tipo->nombre ?></option>
    <?php endforeach; ?>
</select>

<label for="estado">Estado</label>
<select name="estado" id="estadoGrupo">
    <option value="ACTIVO">ACTIVO</option>
    <option value="INACTIVO">INACTIVO</option>
</select>

<input type="hidden" id="idBeneTipo" value="">
<button onclick="asignarBeneficioGrupo()" type="button" class="btn-asignar">Asignar</button>