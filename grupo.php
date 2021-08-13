<?php

require 'includes/app.php';

use App\Grupo;
use Intervention\Image\ImageManagerStatic as Image;

$id  = $_GET['id'];

$grupo = Grupo::getGrupo($id);
$integrantes = $grupo->getIntegrantes();


$consulta = "SELECT * FROM tipo_grupo";
$tipos = mysqli_query($db, $consulta);


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if ($_POST['cod'] == 1) {
        debugear('Asginando evento');
    } elseif ($_POST['cod'] == 2) {
        debugear('agreando integarante');
    } else {
        $arg = $_POST['grupo'];
        $grupo->sincronizar($arg);

        /**Generar nombre unico */
        $nombreImagen = md5(uniqid(rand(), true)) . ".jpg";

        /**Setear imagen */
        if ($_FILES['grupo']['tmp_name']['imagen']) {
            $image = Image::make($_FILES['grupo']['tmp_name']['imagen'])->fit(800, 600);
            $grupo->updImagen($nombreImagen);
        }


        /**Subida de Imagenes */

        //guarda la imagen en el servidor
        $image->save(CARPETA_IMAGENES . $nombreImagen);
        //guarda en la base de datos
        $resultado = $grupo->actualizar();

        //mensaje de exito o error
        if ($resultado) {
            header('Location: /grupos.php');
        }
    }
}

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

        <div class=" nuevo-grupo botones-grupo">


            <button type="submit" id="boton-agregar-evento" onclick="modal('modal-agregar', 'boton-agregar-evento', 'close-evento')">
                <i class="far fa-calendar-plus"></i> Asignar Evento
            </button>

            <button type="submit" n class="boton-grupo" id="boton-agregar-integrante" onclick="modal('modal-integrante', 'boton-agregar-integrante', 'close-integrante')">
                <i class="fas fa-user-plus"></i> Nuevo Integrante
            </button>

            <button type="submit" id=" boton-agregar-grupo" onclick="modal('modal-grupo', 'boton-agregar-grupo', 'close-grupo')"">
            <i class=" fas fa-pencil-alt"></i> Editar Grupo
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






<!--ventana modal-->
<div class="modal-agregar " id="modal-grupo">
    <div class="contenido-modal-grupo ">
        <div class="encabezado-modal">
            <h2>Editar Grupo</h2>
            <span class="close close-grupo">&times;</span>

        </div>
        <form class="formulario-grupo" method="POST" enctype="multipart/form-data">


            <?php include 'includes/templates/modales/formGrupo.php';  ?>

            <input type="hidden" name="cod" value="3">
            <button type="submit">Aceptar</button>


        </form>

    </div>
</div>


<?php


incluirTemplate('modales/modIntegrante');
incluirTemplate('modales/modEvento');

incluirTemplate('cierre');
