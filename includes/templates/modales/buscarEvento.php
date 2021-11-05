<label for="fechaRegistro">Fecha de Registro</label>
<input type="date" name="fechaRegistro">
<label for="fechaHoraInvitacion">Fecha y hora</label>
<input type="datetime-local" name="fechaHoraInvitacion">
<label for="estado">Estado</label>
<select name="estado" id="">
    <option value="COMPLETADO">COMPLETADO</option>
    <option value="PENDIENTE">PENDIENTE</option>
</select>
<label for="observacion">Observacion</label>
<textarea name="observacion" id="" cols="30" rows="5"></textarea>
<label class="lab-evento" for="evento">Evento</label>
<div class="evento-accion">


    <select class="js-example-basic-single lista-eventos" id="option" name="evento">
        <?php foreach ($eventos as $evento) : ?>
            <option value="<?php echo $evento->idEventosrealizados ?>"><?php echo $evento->nombre_evento ?></option>
        <?php endforeach; ?>
    </select>

    <div>
        <button class="boton-evento">Nuevo Evento</button>

    </div>

</div>
<label for=""></label>
<button>Aceptar</button>