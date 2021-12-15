<?php //debuguear($privilegios);
?>

<div class="contenedor-grupos">
    <div class="titulo-grupos">
        <h2 class="no-margin">Gestión de Roles</h2>
    </div>

    <div class="acciones-grupo">
        <div class="buscar">
            <i class="fas fa-search"></i>
            <input type="text" placeholder="Buscar" id="buscar-rol" class="busqueda">
        </div>

        <div class="nuevo-grupo__mod">
            <a class="btn-asignar" onclick=" modal('modal-agregar-rol', 'boton-agregar-beneficio', 'close-rol');"><i class="fas fa-plus-circle"></i> Nuevo Rol</a>
        </div>
    </div>

    <div class="contenedor-tabla tab-beneficio">

        <table id="mytable">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>ROL</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($roles as $rol) : ?>
                    <tr>
                        <td><?php echo $rol->id; ?></td>
                        <td><?php echo $rol->nombre; ?></td>
                        <td> <button class="btn-asignar" onclick="actualizarRol(<?php echo $rol->id;  ?>)" type="button" class="boton-acciones">
                                <i class="fas fa-pen"></i> Editar</button></td>
                    </tr>

                <?php endforeach; ?>

            </tbody>

        </table>

    </div>


</div>

<div class="modal-agregar" id="modal-agregar-rol">


    <div class="modal-beneficio contenido-modal-grupo ">
        <div class="encabezado-modal">
            <h2>Crear Rol: <span id="nombreRol"></span></h2>
            <span class="close close-rol">&times;</span>

        </div>
        <div>
            <form class="formulario-grupo" method="POST">

                <?php include 'form.php'; ?>

            </form>
        </div>


    </div>
</div>