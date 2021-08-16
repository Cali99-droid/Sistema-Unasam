<div class="buscar">
    <label for="buscar">Buscar</label>
    <input type="text" name="buscar" id="buscar" placeholder="Buscar por DNI">
    <button type="button" id="btnBuscarDNI" name="btnBuscarDNI">Buscar</button>
</div>

<div class="contenedor-usuario">
    <div class="columna-usuario">
        <label for="dni">DNI</label>
        <input type="text" name="integrante[dni]" id="dni">

        <label for="nombre">Nombre</label>
        <input type="text" name="integrante[nombre]" id="nombre">

        <label for="apellido">Apellido</label>
        <input type="text" name="integrante[apellido]" id="apellido">


        <label for="genero">Género</label>
        <select name="integrante[genero]" id="genero">
            <option value="" disabled selected>--Seleccione--</option>
            <option value="Masculino">Masculino</option>
            <option value="Femenino">Femenino</option>
        </select>

        <label for="direccion">Dirección</label>
        <input type="text" name="integrante[direccion]" id="direccion">


    </div>

    <div class="columna-usuario">
        <label for="email">Email</label>
        <input type="email" name="integrante[email]" id="email">

        <label for="telefono">Teléfono</label>
        <input type="number" name="integrante[telefono]" id="telefono" placeholder="Ingrese teléfono">

        <label for="codigo_alumno">Código</label>
        <input type="text" name="integrante[codigo_alumno]" id="codigo_alumno">

        <label for="idEscuela" nombre-usu>Escuela</label>
        <select name="integrante[idEscuela]" id="idEscuela">
            <option value="" selected disabled>--Seleccione--</option>
            <?php while ($row = mysqli_fetch_assoc($escuelas)) : ?>
                <option <?php echo $estudiante->idEscuela == $row['idEscuela'] ? 'selected' : '' ?> value="<?php echo $row['idEscuela']; ?>"><?php echo $row['nombre_escuela']; ?>
                <?php endwhile; ?></option>

        </select>




        <label for="nombre_procedencia">Procedencia</label>
        <input type="text" name="integrante[nombre_procedencia]" id="nombre_procedencia">

    </div>

    <div class="columna-usuario">



        <label for="estado">Estado</label>
        <select name="integrante[estado]" id="">
            <option value="" disabled selected>--Seleccione--</option>
            <option value="Activo">Activo</option>
            <option value="Inactivo">Inactivo</option>
        </select>


        <label for="idCondicionEconomica">Condición Socioeconomica</label>
        <select name="integrante[idCondicionEconomica]" id="escuela">
            <option value="" selected disabled>--Seleccione--</option>
            <?php while ($row = mysqli_fetch_assoc($condiciones)) : ?>
                <option <?php echo $estudiante->idCondicionEconomica == $row['idCondicionEconomica'] ? 'selected' : '' ?> value="<?php echo $row['idCondicionEconomica']; ?>"><?php echo $row['nombre_condicion']; ?>
                <?php endwhile; ?></option>

        </select>
        <label for="descripcion">Descripción</label>
        <textarea name="integrante[descripcion]" id="integrante[descripcion]" cols="30" rows="4"></textarea>

        <input type="hidden" name="cod" value="2">
        <button class="" type="submit">Aceptar</button>

    </div>

</div>