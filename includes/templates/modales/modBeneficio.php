<div class="columna-beneficio">
    <label for="inputEmail">Nombre del Beneficio</label>
    <input type="text" id="inputEmai" placeholder="Ingrese el Beneficio">

    <label for="inputEmail4">Noº de Resolución</label>
    <input type="text" id="inputEmail4" placeholder="Ingrese el Nº de Resolución de Beneficio">

    <label for="">Fecha de Emisión</label>
    <input type="date" style="margin: .4rem 0;" class="form-control" placeholder="First name">

</div>

<div class="columna-beneficio">
    <label for="">Estado</label>
    <select name="Estado" id="Estado">

        <option value="1">ACTIVO</option>
        <option value="2">INACTIVO</option>
    </select>

    <label for="inputEmai">Seleccione Tipo de Grupos a Asignar</label>
    <select name="EstadoU" id="EstadoU">
        <?php while ($row = mysqli_fetch_assoc($tipos)) : ?>
            <option value="<?php echo $row['idTipoGrupo']; ?>"><?php echo $row['nombre_tipo']; ?>
            <?php endwhile; ?>
    </select>


    <button class="" type="submit">Aceptar</button>

</div>