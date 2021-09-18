<?php

require 'includes/app.php';

use App\Estudiante;
use App\Grupo;
use Intervention\Image\ImageManagerStatic as Image;

$id  = $_GET['id'];

$grupo = Grupo::getGrupo($id);
$integrantes = Estudiante::getIntegrantes($id);
$errores = Estudiante::getErrores();



$estudiante = new Estudiante();


$consulta = "SELECT * FROM tipo_grupo";
$tipos = mysqli_query($db, $consulta);

$consultaEsc = "SELECT * FROM escuela";
$escuelas = mysqli_query($db, $consultaEsc);

$consultaCondi = "SELECT * FROM condicion_economica";
$condiciones = mysqli_query($db, $consultaCondi);


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if ($_POST['cod'] == 1) {

        $arg = $_POST['integrante'];
        $arg['idgrupo_universitario'] = $grupo->idgrupo_universitario;

        $alumno = new Estudiante($arg);

        $alumno->actualizar($id);
    } elseif ($_POST['cod'] == 2) {
        $arg = $_POST['integrante'];

        $arg['idgrupo_universitario'] = $grupo->idgrupo_universitario;

        $alumno = new Estudiante($arg);
        $grupo->setIntegrante($alumno);
    } else {
        $arg = $_POST['grupo'];
        $grupo->sincronizar($arg);

        /**Generar nombre unico */
        $nombreImagen = md5(uniqid(rand(), true)) . ".jpg";

        /**Setear imagen */
        if ($_FILES['grupo']['tmp_name']['imagen']) {
            $image = Image::make($_FILES['grupo']['tmp_name']['imagen'])->fit(800, 600);
            $grupo->setImagen($nombreImagen);
        }


        /**Subida de Imagenes */

        //guarda la imagen en el servidor
        $image->save(CARPETA_IMAGENES . $nombreImagen);
        //guarda en la base de datos
        $resultado = $grupo->actualizar();

        //mensaje de exito o error
        if ($resultado) {
            header('Location: ./grupos.php');
        }
    }
}

incluirTemplate('barra');
?>

<div class="contenedor-grupos">
    <!-- <div class="alerta error">
        <?php //echo isset($_GET['mensaje']) ? $_GET['mensaje'] : ''; 
        ?> 
    </div> -->
    <div class="titulo-grup">
        <h2 class="no-margin"><?php echo $grupo->nombre_grupo;  ?></h2>
        <p><?php echo  $grupo->getTipo() . ' - ' . $grupo->fecha_creacion ?> </p>

    </div>

    <div class="acciones-grupo">
        <div class="buscar">
            <i class="fas fa-search"></i>
            <input type="text" placeholder="Buscar" class="buscar-inte" id="buscarRegistro">
        </div>

        <div class=" nuevo-grupo botones-grupo">


            <button type="submit" id="boton-agregar-evento" onclick="modal('modal-agregar', 'boton-agregar-evento', 'close-evento')">
                <i class="far fa-calendar-plus"></i> Asignar Evento
            </button>

            <button type="submit" class="boton-grupo" id="boton-agregar-integrante" onclick="modal('modal-integrante', 'boton-agregar-integrante', 'close-integrante')">
                <i class="fas fa-user-plus"></i> Nuevo Integrante
            </button>

            <button type="submit" id=" boton-agregar-grupo" onclick="modal('modal-grupo', 'boton-agregar-grupo', 'close-grupo')"">
            <i class=" fas fa-pencil-alt"></i> Editar Grupo
            </button>

        </div>
    </div>

    <div class=" contenedor-tabla tab-integrantes">

        <table id="mytable">
            <thead>
                <tr>
                    <th>DNI</th>
                    <th>Nombres</th>
                    <th>Codigo</th>
                    <th>Acciones</th>

                </tr>
            </thead>
            <tbody>
                <?php foreach ($integrantes as $integrante) :  ?>
                    <tr>
                        <td><?php echo $integrante->dni; ?></td>
                        <td><?php echo $integrante->nombre . " " . $integrante->apellido; ?></td>
                        <td><?php echo $integrante->codigo_alumno; ?></td>
                        <td>
                            <form method="POST" class="w-100">


                                <button type="button" class="boton-acciones" onclick="actualizarIntegrante(<?php echo $integrante->dni; ?>,'modal-integrante', 'btn', 'close-integrante')">
                                    <i class=" fas fa-pencil-alt"></i> </button>

                                <button type="button" class="boton-acciones borrar">
                                    <i class="fas fa-trash"></i> </button>


                                <a class="enlace" href="integrante.php?id=<?php  echo $integrante->codigo_alumno;?> &&tip=<?php  echo $grupo->idTipoGrupo;?>">Ver Mas</a>

                            </form>

                        </td>
                    </tr>
                <?php endforeach; ?>

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


<div class="modal-agregar" id="modal-integrante">

    <div class="contenido-modal-grupo modal-usuarios">
        <div class="encabezado-modal">
            <h2 id="titulo_integrante">Nuevo Integrante</h2>
            <span class=" close close-integrante">&times;</span>

        </div>
        <form method="POST" class="formulario-grupo">

            <?php include 'includes/templates/modales/modIntegrante.php';  ?>



        </form>
    </div>

</div>



<?php

incluirTemplate('modales/modEvento');

incluirTemplate('cierre');
