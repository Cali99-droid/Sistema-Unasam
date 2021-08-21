<div class="columna-beneficio">

    <fieldset>
        <legend>Datos Resolucion</legend>
        <div class="columna-beneficio">

            <label for="numero">Noº de Resolución</label>
            <input type="text" id="numero" name="beneficio[numero]" placeholder="Ingrese el Nº de Resolución de Beneficio">

            <label for="fecha_emision">Fecha de Emisión</label>
            <input type="date" name="beneficio[fecha_emision]" class="form-control" id="fecha_emision">

            <label for="estadoresolucion">Estado</label>
            <select name="beneficio[estadoresolucion]" id="estadoresolucion">
                <option value="COMPLETADO">COMPLETADO</option>
                <option value="PENDIENTE">PENDIENTE</option>
            </select>


        </div>

    </fieldset>



</div>

<div class="columna-beneficio">


    <fieldset>
        <legend>Datos de Beneficio</legend>
        <div class="columna-beneficio">
            <label for="nombre">Nombre del Beneficio</label>
            <input type="text" id="nombre" name="beneficio[nombre]" placeholder="Ingrese el Beneficio">

            <label for="estado">Estado</label>
            <select name="beneficio[estado]" id="estado">
                <option value="ACTIVO">ACTIVO</option>
                <option value="INACTIVO">INACTIVO</option>
            </select>

            <label for="idTipoGrupo">Seleccione Tipo de Grupos a Asignar</label>
            <select name="beneficio[idTipoGrupo]" id="idTipoGrupo">
                <option value="" selected disabled>--Seleccione--</option>
                <?php foreach ($tipos as $tipo) { ?>

                    <option <?php echo $tipo->idTipoGrupo == $beneficio->idTipoGrupo ? 'selected' : ''  ?> value="<?php echo $tipo->idTipoGrupo ?>"><?php echo $tipo->nombre_tipo; ?>
                    <?php } ?></option>
            </select>




        </div>

    </fieldset>
    <input type="hidden" name="cod" value="1" id="valor">
    <input type="hidden" name="beneficio[idBeneficio]" value='' id="idBeneficio">
    <button type="submit">Aceptar</button>


</div>