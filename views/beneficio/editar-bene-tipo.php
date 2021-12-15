<label for="idbeneficio">Beneficio</label>
<select class="js-example-basic-single " id="idbeneficio" name="beneficio">
    <?php foreach ($beneficios as $beneficio) : ?>
        <option value="<?php echo $beneficio->id ?>"><?php echo $beneficio->nombre ?></option>
    <?php endforeach; ?>
</select>

<label for="idTipoGrupo">Tipo de Grupo</label>
<select class="js-example-basic-single " id="idTipoGrupo" name="idTipoGrupo">
    <?php foreach ($tipos as $tipo) : ?>
        <option value="<?php echo $tipo->id ?>"><?php echo $tipo->nombre ?></option>
    <?php endforeach; ?>
</select>

<label for="estadoGrupo">Estado</label>
<select name="estado" id="estadoGrupo">
    <option value="ACTIVO">ACTIVO</option>
    <option value="INACTIVO">INACTIVO</option>
</select>


<input type="hidden" id="idBeneTipo" value="">
<button onclick="asignarBeneficioGrupo()" type="button" class="btn-asignar">Asignar</button>