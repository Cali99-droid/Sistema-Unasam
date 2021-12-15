<div class="contenedor-grupos">
    <!-- <div class="alerta error">
        <?php //echo isset($_GET['mensaje']) ? $_GET['mensaje'] : ''; 
        ?> 
    </div> -->
    <?php
    $resultado = $_GET['resultado'] ?? '';
    if ($resultado) {
        $mensaje = mostrarNotificacion(intval($resultado));
        if ($mensaje) { ?>
            <p class="" id="men"> <?php //echo s($mensaje); 
                                    ?></p>

    <?php }
    } ?>
    <div class="titulo-grup">
        <h2 class="no-margin"><?php echo $grupo->nombre;  ?></h2>
        <p><?php echo  $grupo->getTipoGrupo() . ' - ' . $grupo->fecha_creacion ?> </p>

    </div>

    <div class="acciones-grupo">
        <div class="buscar">
            <i class="fas fa-search"></i>
            <input type="text" placeholder="Buscar" class="busqueda" id="buscarIntegrante">
        </div>

        <div class=" nuevo-grupo botones-grupo">

            <button class="btn-asignar" onclick="modal('modal-integrante-noapi', 'boton-agregar-integrante', 'close-integrante-s')">
                <i class="fas fa-user-plus"></i> Nuevo Integrante
            </button>

            <button type="submit" class="btn-asignar" id=" boton-agregar-integrante" onclick="modal('modal-integrante', 'boton-agregar-integrante', 'close-integrante')">
                <i class="fas fa-user-plus"></i> Nuevo Integrante API
            </button>

            <button class="btn-asignar" type="submit" id=" boton-agregar-grupo" onclick="modal('modal-grupo', 'boton-agregar-grupo', 'close-grupo')"">
            <i class=" fas fa-pencil-alt"></i> Editar Grupo
            </button>

        </div>
    </div>

    <div class="contenedor-tabla">

        <table id="mytable">
            <thead>
                <tr>
                    <th>DNI</th>
                    <th>Nombres</th>
                    <th>Codigo</th>
                    <th>Estado</th>
                    <th>Acciones</th>

                </tr>
            </thead>
            <tbody>
                <?php foreach ($integrantes as $integrante) :  ?>
                    <tr>
                        <td><?php echo $integrante->dni; ?></td>
                        <td><?php echo $integrante->nombre . " " . $integrante->apellido; ?></td>
                        <td><?php echo $integrante->codigo; ?></td>
                        <td><span class="<?php echo $integrante->estado == 'activo' ? 'label-ok' : 'label' ?>"><?php echo $integrante->estado; ?></span></td>
                        <td>
                            <form method="POST">

                                <button type="button" class="btn-asignar" onclick="getIntegrante(<?php echo $integrante->idPersona ?>)">
                                    <i class=" fas fa-pencil-alt"></i> Editar</button>

                                <button type="button" class="btn-asignar" onclick="preguntar(borrarIntegrante,<?php echo $integrante->idAlumnoGrupo; ?>)">
                                    <i class="fas fa-trash"></i> Borrar</button>


                                <a class="btn-asignar" href="/integrante?dni=<?php echo $integrante->dni . '&id=' . $grupo->id; ?>"><i class="fas fa-eye"></i> Ver Mas</a>

                            </form>

                        </td>
                    </tr>
                <?php endforeach; ?>

            </tbody>
        </table>
    </div>

</div>

</div>
</div>

<!--ventana modal-->
<div class="modal-agregar " id="modal-grupo">
    <div class="contenido-modal-grupo ">
        <div class="encabezado-modal">
            <h2>Editar Grupo</h2>
            <span class="close close-grupo">&times;</span>
        </div>
        <form class="formulario-grupo" method="POST" enctype="multipart/form-data">
            <?php include 'formulario.php'; ?>
            <input type="hidden" id="idgrupo" name="grupo[id]" value="<?php echo $grupo->id ?>">
            <button type="submit">Aceptar</button>

        </form>

    </div>
</div>


<div class="modal-agregar" id="modal-integrante">

    <div class="contenido-modal-grupo modal-usuarios">
        <div class="encabezado-modal">
            <h2 id="titulo_integrante">Nuevo Integrante</h2>
            <span class=" close close-integrante">&times;</span>

        </div>
        <form method="POST" class="formulario-grupo">
            <?php include_once __DIR__ . "/../templates/modal/modIntegrante.php" ?>
        </form>
    </div>

</div>

<div class="modal-agregar" id="modal-integrante-noapi">

    <div class="contenido-modal-grupo modal-usuarios">
        <div class="encabezado-modal">
            <h2 id="titulo_integrante">Nuevo Integrante</h2>
            <span class=" close close-integrante-s">&times;</span>

        </div>
        <form method="POST" class="formulario-grupo" id="formulario-grupo-s">

            <?php include_once 'form-api.php' ?>



        </form>
    </div>

</div>


<?php include_once __DIR__ . "/../templates/modal/nuevoTipo.php" ?>
<script>
    $(document).ready(function() {
        $('#option').select2();


        $('#mytable').stacktable();

    });

    const men = document.querySelector('#men');
    const id = document.querySelector('#idgrupo').value;
    //  console.log(men)
    if (men) {
        Swal.fire({
            title: 'Actualizado Correctamente',
            text: 'Los Datos del Grupo Fueron Actualizados',
            icon: 'success',
        }).then(() => {
            var newURL = location.href.split("?")[0] + '?id=' + id;
            window.history.pushState('object', document.title, newURL);
        })
    }
</script>