<label for="fechaHoraInvitacion">Fecha:</label>
<input type="date" name="fechaHoraInvitacion" id="fechaHoraInvitacion" min="<?php echo date('Y-m-d', strtotime('+0 day')); ?>">

<label for="Observacion">Observacion:</label>
<textarea name="Observacion" id="Observacion" cols="30" rows="10"></textarea>

<input type="hidden" value="" id="idevento">

<label for="idGrupo">Grupo:</label>
<select class="js-example-basic-single " id="idGrupo" name="idGrupo">
    <?php foreach ($grupos as $grupo) : ?>
        <option value="<?php echo $grupo->id ?>"><?php echo $grupo->nombre ?></option>
    <?php endforeach; ?>
</select>



<input type="hidden" id="idInvitacion">
<button class="btn-asignar" onclick="asignarInvitacionGrupo()" type="button">Invitar</button>