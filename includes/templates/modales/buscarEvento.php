<select class="js-example-basic-single lista-eventos" id="option" name="option">


    <?php foreach ($eventos as $evento) : ?>


        <option value="<?php echo $evento->idEventosrealizados ?>"><?php echo $evento->nombre_evento ?></option>
    <?php endforeach; ?>
</select>
<button>Nuevo Evento</button>
<button>Aceptar</button>