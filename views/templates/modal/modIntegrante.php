<div class="buscar" id="cont_buscar">
    <label for="buscar" id="lbBuscar">Buscar</label>
    <input type="text" maxlength="8" name="buscar" id="buscar" placeholder="Buscar por DNI" |>
    <button type="button" id="btnBuscarDNI" name="btnBuscarDNI" onclick="buscarAlumno($('#buscar').val())">Buscar</button>
</div>

<div class="contenedor-integrante">
    <div class="columna-integrante">
        <label for="dni">DNI</label>
        <input type="text" name="integrante[dni]" id="dni" disabled>
        <label for="nombre">Nombre</label>
        <input type="text" name="integrante[nombre]" id="nombre" disabled>

    </div>

    <div class="columna-integrante">


        <label for="idCondicionEconomica">Condición Socioeconomica</label>
        <select name="integrante[idCondicionEconomica]" id="idCondicionEconomica" required>
            <option value="" selected disabled>--Seleccione--</option>
            <?php foreach ($condiciones as $condicion) : ?>
                <option value="<?php echo $condicion->id; ?>"><?php echo $condicion->nombre; ?>
                <?php endforeach; ?></option>
        </select>
        <label for="descripcion">Descripción</label>
        <textarea name="integrante[descripcion]" id="descripcion" cols="30" rows="4"></textarea>


        <label for="estado">Estado</label>
        <select name="integrante[estado]" id="estado">
            <option value="" disabled selected>--Seleccione--</option>
            <option value="activo">Activo</option>
            <option value="inactivo">Inactivo</option>
        </select>
        <input type="hidden" name="cod" value="1" id="cod">

        <input type="hidden" name="integrante[idPersona]" value='' id="idPersona">

        <button type="button" id="actualizarIntegrante" onclick="guardarIntegrante()">Aceptar</button>
    </div>

</div>

<script>
    $(document).ready(function() {
        $('#buscar').on('input', function() {
            this.value = this.value.replace(/[^0-9]/g, '')
        });
    });
</script>