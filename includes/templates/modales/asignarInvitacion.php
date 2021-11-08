<div>
    <div>
        <label for="fechaHoraInvitacion">Fecha y Hora</label>
        <input type="datetime-local" name="fechaHoraInvitacion" id="fechaHoraInvitacion">

        <label for="Observacion">Observacion</label>
        <textarea name="Observacion" id="Observacion" cols="30" rows="10"></textarea>
    </div>
    <div>
        <input type="hidden" value="" id="idevento">

        <select class="js-example-basic-single " id="idGrupo" name="idGrupo">
            <?php foreach ($grupos as $grupo) : ?>
                <option value="<?php echo $grupo->idgrupo_universitario ?>"><?php echo $grupo->nombre_grupo ?></option>
            <?php endforeach; ?>
        </select>

    </div>

    <div>
        <button onclick="asignarInvitacionGrupo()" type="button">Invitar</button>
    </div>

</div>