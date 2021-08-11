<?php

require 'includes/funciones.php';
require 'includes/config/database.php';
$db = conectarDB();

$id  = $_GET['id'];

$query = "SELECT * FROM  vista_grupo_universitario WHERE idgrupo_universitario = '$id'";
$resultado = mysqli_query($db, $query);
$grupo = mysqli_fetch_assoc($resultado);

$queryIntegrantes = "SELECT * FROM  vista_alumno_x_grupo WHERE idgrupo_universitario = '$id'";
$resultadoIntegrantes = mysqli_query($db, $queryIntegrantes);

// echo '<pre>';

// echo '</pre>';



incluirTemplate('barra');
?>

<div class="contenedor-grupos">
    <div class="titulo-grup">
        <h2 class="no-margin"><?php echo $grupo['nombre_grupo'] ?></h2>
        <p><?php echo $grupo['nombre_tipo'] ?> </p>
    </div>

    <div class="acciones-grupo">
        <div class="buscar">
            <i class="fas fa-search"></i>
            <input type="text" placeholder="Buscar">
        </div>

        <div class="nuevo-grupo botones-grupo">
            <button type="button" class="boton-grupo" id="boton-agregar-evento" onclick="modal('modal-agregar', 'boton-agregar-evento', 'close')">
                <i class="fas fa-plus-circle"></i> Agregar Evento
            </button>

            <button type="button" class="boton-grupo" id="boton-agregar-integrante" onclick="modal('modal-agregar', 'boton-agregar-integrante', 'close')">
                <i class="fas fa-plus-circle"></i> Agregar Integrante
            </button>

            <button type="button" class="boton-grupo" id="boton-agregar-evento" onclick="modal('modal-agregar', 'boton-agregar-evento', 'close')">
                Editar Grupo
            </button>
        </div>
    </div>

    <div class="contenedor-tabla tab-integrantes">

        <table>
            <thead>
                <tr>
                    <th>DNI</th>
                    <th>Nombres</th>
                    <th>Codigo</th>
                    <th>Acciones</th>

                </tr>
            </thead>
            <tbody>
                <?php while ($integrantes = mysqli_fetch_assoc($resultadoIntegrantes)) : ?>
                    <tr>
                        <td><?php echo $integrantes['dni']; ?></td>
                        <td><?php echo $integrantes['nombre']; ?></td>
                        <td><?php echo $integrantes['codigo_alumno']; ?></td>
                        <td>
                            <form method="POST" class="w-100">
                                <input type="hidden" name="id" value="<?php echo $integrantes['dni']; ?>">
                                <input type="submit" class="boton-rojo-block" value="Eliminar">
                            </form>

                        </td>
                    </tr>
                <?php endwhile; ?>

            </tbody>
        </table>

        <div class="pie-tabla">

            <a href="">Ver Eventos</a>

        </div>



    </div>



</div>



</div>


</div>
</div>
<!--ventana modal-->


<div class="modal-agregar" id="modal-agregar">


    <div class="contenido-modal-grupo modal-usuarios">
        <div class="encabezado-modal">
            <h2>Nuevo Integrante</h2>
            <span class="close">&times;</span>

        </div>
        <form action="" class="formulario-grupo">

            <div class="buscar">
                <label for="nombre-evento">Buscar</label>
                <input type="text" name="nombre-evento" id="nombre-evento">
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

                    <button class="" type="submit">Aceptar</button>

                </div>

            </div>
        </form>
        <?php

        incluirTemplate('cierre');
