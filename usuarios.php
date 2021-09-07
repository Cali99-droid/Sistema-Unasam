<?php
require 'includes/app.php';

use App\User;

$users = User::all();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if ($_POST['cod'] == 1) {

        $arg =  $_POST['user'];
        $user = new User($arg);
        $user->crear($arg['password']);
    } else if ($_POST['cod'] == 2) {
        $arg =  $_POST['user'];

        $user = new User($arg);

        $user->actualizar($arg['password']);
    }
}


incluirTemplate('barra');
?>

<div class="contenedor-grupos">
    <div class="titulo-grupos">
        <h2 class="no-margin">Gestión de Usuarios</h2>
    </div>

    <div class="acciones-grupo">
        <div class="buscar">
            <i class="fas fa-search"></i>
            <input type="text" placeholder="Buscar">
        </div>

        <div class="nuevo-grupo">
            <button type="button" class="boton-grupo" id="boton-agregar-usuario" onclick="modal('modal-agregar', 'boton-agregar-usuario', 'close')">
                <i class="fas fa-plus-circle"></i> Agregar Usuario</button>
        </div>
    </div>

    <div class="contenedor-tabla tab-beneficio">

        <table>
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Usuario</th>
                    <th>DNI</th>
                    <th>Estado</th>
                    <th>Acciones</th>

                </tr>

            </thead>

            <?php foreach ($users as $user) :  ?>
                <tr>
                    <td><?php echo $user->nombre . ' ' . $user->apellido ?></td>
                    <td><?php echo $user->usuario ?></td>
                    <td><?php echo $user->dni ?></td>
                    <td><label for="estado<?php echo $user->dni ?>">Activo </label><input id="estado<?php echo $user->dni ?>" name="estado<?php echo $user->dni ?>" type="checkbox" <?php echo $user->estado == 'activo' ? 'checked' : '' ?> value="activo"> </td>

                    <td>
                        <form method="GET" target="frame">


                            <button type="button" class="boton-acciones" onclick="actualizarUsuario(<?php echo $user->dni; ?>, 'modal-agregar', 'boton-actualizar-tipo', 'close')">
                                <i class=" fas fa-pencil-alt"></i> </button>


                            <input type="hidden" name="id" value="<?php echo $user->dni; ?>">
                            <button type="button" class="boton-acciones borrar">
                                <i class="fas fa-trash"></i> </button>
                        </form>

                    </td>
                </tr>

            <?php endforeach; ?>

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
        <form method="POST" class="formulario-grupo">

            <div class="buscar" id="bus_user">
                <label for="buscar_user">Buscar</label>
                <input type="text" name="buscar_user" id="buscar_user" placeholder="Buscar por DNI">
                <button type="button" id="btnBuscauser" name="btnBuscauser" onclick="buscarUsuario($('#buscar_user').val())">Buscar</button>
            </div>

            <div class="contenedor-usuario">
                <div class="columna-usuario">
                    <label for="dni">DNI</label>
                    <input type="text" name="user[dni]" id="dni">
                    <label for="nombre">Nombre</label>
                    <input type="text" name="user[nombre]" id="nombre">

                    <label for="apellido">Apellido</label>
                    <input type="text" name="user[apellido]" id="apellido">

                    <label for="genero">Género</label>
                    <select name="user[genero]" id="genero">
                        <option value="" disabled selected>--Seleccione--</option>
                        <option value="Masculino">Masculino</option>
                        <option value="Femenino">Femenino</option>
                    </select>
                </div>

                <div class="columna-usuario">
                    <label for="direccion">Dirección</label>
                    <input type="text" name="user[direccion]" id="direccion">

                    <label for="email">Email</label>
                    <input type="email" name="user[email]" id="email">

                    <label for="telefono">Teléfono</label>
                    <input type="number" name="user[telefono]" id="telefono" placeholder="Ingrese teléfono">

                </div>

                <div class="columna-usuario">




                    <label for="usuario" nombre-usu>Nombre de Usuario</label>
                    <input type="text" name="user[usuario]" id="usuario" placeholder="Ingrese nombre de Usuario">

                    <label for="password">Clave de Usuario</label>
                    <input type="password" name="user[password]" id="password" placeholder="Ingrese Password de Usuario">
                    <div class="estado">
                        <label for="estado">Estado</label>
                        <input type="checkbox" name="user[estado]" id="estado" value="activo" <?php echo $user->estado == 'activo' ? 'checked' : '' ?>>

                    </div>

                    <input type="hidden" name="cod" value="1" id="valor">
                    <input type="hidden" name="user[idPersona]" value='' id="idPersona">
                    <button class="" type="submit">Aceptar</button>

                </div>

            </div>





        </form>

        <?php

        incluirTemplate('cierre');
