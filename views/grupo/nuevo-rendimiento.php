<label for="semestre">Semestre</label>
<select class="js-example-basic-single " id="semestre" name="idTipoGrupo">
    <?php foreach ($semestres as $semestre) : ?>
        <option value="<?php echo $semestre->id ?>"><?php echo $semestre->nombre ?></option>
    <?php endforeach; ?>
</select>

<label for="estado">Estado</label>
<select name="estado" id="estado">
    <option value="regular">REGULAR</option>
    <option value="irregular">IRREGULAR</option>
</select>
<input type="hidden" id="idAlumno" value="<?php echo $alumno->idAlumno ?>">
<input type="hidden" id="idRendimiento" value="">
<button onclick="agregarRend()" type="button" class="btn-asignar">Agregar</button>