<div class="columna-beneficio">

    <fieldset>
        <legend>Datos Resolucion</legend>
        <div class="columna-beneficio">
            <label for="numero">Noº de Resolución</label>
            <input type="text" id="numero" name="resolucion_x_beneficio[numero]" placeholder="Ingrese el Nº de Resolución de Beneficio">

            <label for="fecha_emision">Fecha de Emisión</label>
            <input type="date" name="resolucion_x_beneficio[fecha_emision]" class="form-control" id="fecha_emision">
            <!--
            <label for="resolucion_x_beneficio[estado]">Estado</label>
            <select name="resolucion_x_beneficio[estado]" id="estado">
                <option value="COMPLETADO">COMPLETADO</option>
                <option value="PENDIENTE">PENDIENTE</option>
            </select>
-->
            <label for="doc">Archivo</label>
            <input type="file" name="doc" id="doc" accept="application/pdf">

        </div>

    </fieldset>
</div>

<div class="columna-beneficio">
    <fieldset>
        <legend>Datos de Beneficio</legend>
        <div class="columna-beneficio">
            <label for="nombre">Nombre del Beneficio</label>
            <input type="text" id="nombre" name="beneficio[nombre]" placeholder="Ingrese el Beneficio" required>
        </div>
    </fieldset>
    <input type="hidden" name="resolucion_x_beneficio[id]" value='' id="idresolucion_x_beneficio">
    <input type="hidden" name="beneficio[id]" value='' id="idBeneficio">
    <input type="hidden" name="cod" value='1' id="cod">
    <button type="button" onclick="crearBeneficio()">Aceptar</button>
</div>