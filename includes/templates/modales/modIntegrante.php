<div class="modal-agregar" id="modal-integrante">


    <div class="contenido-modal-grupo modal-usuarios">
        <div class="encabezado-modal">
            <h2>Nuevo Integrante</h2>
            <span class=" close close-integrante">&times;</span>

        </div>
        <form method="POST" class="formulario-grupo">

            <div class="buscar">
                <label for="buscar">Buscar</label>
                <input type="text" name="buscar" id="buscar">
            </div>

            <div class="contenedor-usuario">
                <div class="columna-usuario">
                    <label for="nombre-usuario">Nombre</label>
                    <input type="text" name="nombre-usuario" id="nombre-usuario">

                    <label for="apellido-usuario">Apellido</label>
                    <input type="text" name="apellido-usuario" id="apellido-usuario">


                    <label for="genero">Genero</label>
                    <select name="genero" id="">
                        <option value="">Masculino</option>
                        <option value="">Femenino</option>
                    </select>

                    <label for="direccion">Direccion</label>
                    <input type="text" name="direccion" id="direccion">

                    <label for="email-usuario">Email</label>
                    <input type="email" name="email-usuario" id="email-usuario">


                </div>

                <div class="columna-usuario">


                    <label for="telefono">Teléfono</label>
                    <input type="number" name="telefono" id="telefono" placeholder="Ingrese teléfono">

                    <label for="nombre-usu" nombre-usu>Nombre de Usuario</label>
                    <input type="text" name="nombre-usu" placeholder="Ingrese nombre de Usuario">

                    <label for="pass-usuario">Clave de Usuario</label>
                    <input type="password" name="pass-usuario" placeholder="Ingrese Password de Usuario">
                    <div class="estado">
                        <label for="estado">Estado</label>
                        <input type="checkbox" name="estado">

                    </div>
                    <input type="hidden" name="cod" value="2">
                    <button class="" type="submit">Aceptar</button>


                </div>

            </div>
        </form>

    </div>
</div>