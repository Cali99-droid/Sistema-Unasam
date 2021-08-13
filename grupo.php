<?php

require 'includes/app.php';

use App\Grupo;

$id  = $_GET['id'];

$grupo = Grupo::getGrupo($id);

$integrantes = $grupo->getIntegrantes();


$consulta = "SELECT * FROM tipo_grupo";
$tipos = mysqli_query($db, $consulta);



incluirTemplate('barra');
?>

<div class="contenedor-grupos">
    <div class="titulo-grup">
        <h2 class="no-margin"><?php echo $grupo->nombre_grupo;  ?></h2>
        <p><?php echo  $grupo->getTipo() . ' - ' . $grupo->fecha_creacion ?> </p>
    </div>

    <div class="acciones-grupo">
        <div class="buscar">
            <i class="fas fa-search"></i>
            <input type="text" placeholder="Buscar">
        </div>

        <div class="nuevo-grupo botones-grupo">
            <button type="button" class="boton-grupo" id="boton-agregar-evento" onclick="modal('modal-agregar', 'boton-agregar-evento', 'close-evento')">
                <i class="fas fa-plus-circle"></i> Asignar Evento
            </button>

            <button type="button" class="boton-grupo" id="boton-agregar-integrante" onclick="modal('modal-integrante', 'boton-agregar-integrante', 'close-integrante')">
                <i class="fas fa-plus-circle"></i> Agregar Integrante
            </button>

            <button type="button" class="boton-grupo" id="boton-agregar-grupo" onclick="modal('modal-grupo', 'boton-agregar-grupo', 'close-grupo')"">
                Editar Grupo
            </button>
        </div>
    </div>

    <div class=" contenedor-tabla tab-integrantes">

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
                        <?php while ($integrante = $integrantes->fetch_assoc()) : ?>
                            <tr>
                                <td><?php echo $integrante['dni']; ?></td>
                                <td><?php echo $integrante['nombre']; ?></td>
                                <td><?php echo $integrante['codigo_alumno']; ?></td>
                                <td>
                                    <form method="POST" class="w-100">
                                        <input type="hidden" name="id" value="<?php echo $integrante['dni']; ?>">
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
<div class="modal-agregar " id="modal-grupo">
    <div class="contenido-modal-grupo ">
        <div class="encabezado-modal">
            <h2>Editar Grupo</h2>
            <span class="close close-grupo">&times;</span>

        </div>
        <form class="formulario-grupo" method="POST" enctype="multipart/form-data">

            <label for="nombre_grupo">Nombre del grupo</label>
            <input type="text" name="nombre_grupo" id="nombre-grupo" value="<?php echo $grupo->nombre_grupo;  ?>" required>

            <label for="fecha_creacion">Fecha de Creacion</label>
            <input type="date" name="fecha_creacion" id="fecha_creacion" value="<?php echo $grupo->fecha_creacion;  ?>">

            <label for="resolucion_creacion">Resolucion</label>
            <input type="text" name="resolucion_creacion" id="resolucion" value="<?php echo $grupo->resolucion_creacion;  ?>">

            <div class="contenido-tipos">
                <div class="cont-tip">
                    <label for="idTipoGrupo">Tipo de Grupo</label>
                    <select name="idTipoGrupo" id="tipo-grupo">
                        <option value="" selected>--Seleccione--</option>

                        <?php while ($row = mysqli_fetch_assoc($tipos)) : ?>
                            <option <?php echo $grupo->idTipoGrupo == $row['idTipoGrupo'] ? 'selected' : '' ?> value="<?php echo $row['idTipoGrupo']; ?>"><?php echo $row['nombre_tipo']; ?>
                            <?php endwhile; ?>
                            <!--  <? //php echo $tipo === $row['idTipoGrupo'] ? 'selected' : '' 
                                    ?>-->

                    </select>
                </div>

                <div class="cont-tip">
                    <button class="" type="button" id="boton-agregar-tipo" onclick="modal('modal-tipo', 'boton-agregar-tipo', 'close-tipo')">
                        <i class="fas fa-plus-circle"></i> Nuevo tipo
                    </button>

                </div>

            </div>


            <div>
                <label for="imagen">Imagen de Grupo</label>
                <input type="file" name="imagen">
            </div>

            <button type="submit">Aceptar</button>

        </form>

    </div>
</div>



<?php


incluirTemplate('modales/modIntegrante');
incluirTemplate('modales/modEvento');

incluirTemplate('cierre');
