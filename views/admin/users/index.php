<?php // debuguear($users) 
?>
<div class="contenedor-grupos">
    <div class="titulo-grupos">
        <h2 class="no-margin">Gestión de Usuarios</h2>
    </div>

    <div class="acciones-grupo">
        <div class="buscar">
            <i class="fas fa-search"></i>
            <input type="text" placeholder="Buscar" class="busqueda" id="buscar-user">
        </div>

        <div class="nuevo-grupo__mod">
            <a type="button" class="btn-asignar" id="boton-agregar-usuario" onclick="modal('modal-agregar', 'boton-agregar-usuario', 'close')">
                <i class="fas fa-plus-circle"></i> Agregar Usuario</a>
        </div>
    </div>

    <div class="contenedor-tabla tab-beneficio">

        <table id="mytable">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Usuario</th>
                    <th>DNI</th>
                    <th>Estado</th>
                    <th>Acciones</th>

                </tr>

            </thead>
            <tbody>
                <?php foreach ($users as $user) :  ?>
                    <tr>
                        <td><?php echo $user->nombre . ' ' . $user->apellido ?></td>
                        <td><?php echo $user->usuario ?></td>
                        <td><?php echo $user->dni ?></td>
                        <td> <?php echo $user->estado ?></td>
                        <td>
                            <button type="button" class="btn-asignar" onclick="actualizarUsuario(<?php echo $user->dni; ?>, 'modal-agregar', 'boton-actualizar-tipo', 'close')">
                                <i class=" fas fa-pencil-alt"></i> Editar</button>

                            <input type="hidden" name="id" value="<?php echo $user->idUsuario; ?>">
                            <button type="button" class="btn-asignar" onclick="preguntar(borrarUser,<?php echo $user->idUsuario; ?>)">
                                <i class="fas fa-trash"></i> Borrar</button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>




        </table>

    </div>


</div>

</div>



</div>
</div>

<!--ventana modal-->
<div class="modal-agregar " id="modal-agregar">


    <div class="contenido-modal-grupo modal-usuarios">
        <div class="encabezado-modal">
            <h2 id="titulo_user">Nuevo Usuario</h2>
            <span class="close">&times;</span>

        </div>
        <form method="POST" class="formulario-grupo" id="form-user">

            <div class="buscar" id="bus_user">
                <label for="buscar_user">Buscar</label>
                <input type="text" name="buscar_user" id="buscar_user" placeholder="Buscar por DNI" maxlength="8">
                <button class="btn-asignar" type="button" id="btnBuscauser" name="btnBuscauser" onclick="buscarUsuario($('#buscar_user').val())">Buscar</button>
            </div>

            <div class="contenedor-usuario">
                <div class="columna-usuario">
                    <label for="dni">DNI</label>
                    <input type="text" name="dni" id="dni" maxlength="8" autocomplete="off">
                    <label for="nombre">Nombre</label>
                    <input type="text" name="nombre" id="nombre">

                    <label for="apellido">Apellido</label>
                    <input type="text" name="apellido" id="apellido">

                    <label for="genero">Género</label>
                    <select name="genero" id="genero">
                        <option value="" disabled selected>--Seleccione--</option>
                        <option value="Masculino">Masculino</option>
                        <option value="Femenino">Femenino</option>
                    </select>
                </div>

                <div class="columna-usuario">
                    <label for="direccion">Dirección</label>
                    <input type="text" name="direccion" id="direccion">

                    <label for="email">Email</label>
                    <input type="email" name="email" id="email">

                    <label for="telefono">Teléfono</label>
                    <input type="text" name="telefono" id="telefono" placeholder="Ingrese teléfono" maxlength="9">
                    <label for="usuario" nombre-usu>Nombre de Usuario</label>
                    <input type="text" name="usuario" id="usuario" placeholder="Ingrese nombre de Usuario">
                </div>

                <div class="columna-usuario">




                    <label for="estado">Estado</label>
                    <select name="estado" id="estado">
                        <option value="activo">ACTIVO</option>
                        <option value="inactivo">INACTIVO</option>
                    </select>


                    <label for="rol">Rol</label>
                    <select name="rol" id="rol">
                        <?php foreach ($roles as $rol) : ?>
                            <option value="<?php echo $rol->id; ?>"><?php echo $rol->nombre; ?></option>
                        <?php endforeach; ?>
                    </select>

                    <input type="hidden" name="cod" value="1" id="cod">
                    <input type="hidden" name="idusu" value='' id="idusu">
                    <button class="" type="button" onclick="crearUser()">Aceptar</button>

                </div>

            </div>





        </form>

        <script>
            $(document).ready(function() {
                $('#buscar_user').on('input', function() {
                    this.value = this.value.replace(/[^0-9]/g, '');
                });
                $('#dni').on('input', function() {
                    this.value = this.value.replace(/[^0-9]/g, '');
                });
                $('#telefono').on('input', function() {
                    this.value = this.value.replace(/[^0-9]/g, '');
                });
                $('#nombre').keypress(function(e) {
                    var tecla = document.all ? tecla = e.keyCode : tecla = e.which;
                    return !((tecla > 47 && tecla < 58) || tecla == 46);
                });
                $('#apellido').keypress(function(e) {
                    var tecla = document.all ? tecla = e.keyCode : tecla = e.which;
                    return !((tecla > 47 && tecla < 58) || tecla == 46);
                });

            });
        </script>