<?php

require 'includes/app.php';

use App\Estudiante;
use App\Grupo;
use Intervention\Image\ImageManagerStatic as Image;

//obtener todos los grupos
$grupos = Grupo::all();

$grupo = new Grupo();


$consulta = "SELECT * FROM tipo_grupo";
$tipos = mysqli_query($db, $consulta);

/**Insercion */
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //instancia de grupo
    $grupo = new Grupo($_POST['grupo']);

    /**Generar nombre unico */
    $nombreImagen = md5(uniqid(rand(), true)) . ".jpg";

    /**Setear imagen */
    if ($_FILES['grupo']['tmp_name']['imagen']) {
        $image = Image::make($_FILES['grupo']['tmp_name']['imagen'])->fit(800, 600);
        $grupo->setImagen($nombreImagen);
    }


    /**Subida de Imagenes */
    //crear carpeta
    if (!is_dir(CARPETA_IMAGENES)) {
        mkdir(CARPETA_IMAGENES);
    }

    //guarda la imagen en el servidor
    $image->save(CARPETA_IMAGENES . $nombreImagen);

    //guarda en la base de datos
    $resultado = $grupo->crear();
    //mensaje de exito o error
    if ($resultado) {
        header('Location: ./grupos.php?estado=ok');
    }
}

incluirTemplate('barra');
?>

<?php
$resul = $_GET['estado'] ?? null;
if ($resul) {
    if ($resul === 'ok') {
?>

        <div class="alert">
            <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
            <strong>Éxito!</strong> Grupo insertado correctamente
        </div>
<?php
    }
}

?>
<div class="contenedor-grupos">
    <div class="titulo-grupos">
        <h2 class="no-margin">Gestión de Grupos</h2>
    </div>

    <div class="acciones-grupo">
        <div class="buscar">
            <i class="fas fa-search"></i>
            <input type="text" placeholder="Buscar">
        </div>

        <div class="nuevo-grupo">
            <button type="button" class="boton-grupo" id="boton-agregar-grupo" onclick="modal('modal-grupo', 'boton-agregar-grupo', 'close-grupo')">
                <i class="fas fa-plus-circle"></i> Agregar Grupo </button>


        </div>
    </div>

    <div class="grupos">

        <div class="contenido-grupos">

            <?php foreach ($grupos as $grup) : ?>

                <div class="grupo">
                    <a href="grupo.php?id=<?php echo $grup->idgrupo_universitario ?>">
                        <img src="./imagenes/<?php echo  $grup->imagen; ?>" alt="Avatar" class="grupo-imagen">
                        <div class="container">
                            <h4 class="no-margin"><?php echo $grup->nombre_grupo; ?></h4>
                            <p> <?php echo $grup->getTipo(); ?></p>
                            <p>Nº Integrantes: <?php echo count(Estudiante::getIntegrantes($grup->idgrupo_universitario)) ?></p>
                        </div>

                    </a>
                </div>

            <?php endforeach; ?>
        </div>
        <!--Fin conteniodo grupos-->

    </div>

</div>
</div>
</div>

<div class="modal-agregar " id="modal-grupo">
    <div class="contenido-modal-grupo ">
        <div class="encabezado-modal">
            <h2>Nuevo Grupo</h2>
            <span class="close close-grupo">&times;</span>

        </div>
        <form class="formulario-grupo" method="POST" enctype="multipart/form-data">

            <?php include 'includes/templates/modales/formGrupo.php';
            ?>

            <button type="submit">Aceptar</button>

        </form>

    </div>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        setTimeout(function() {
            $(".alert").fadeOut(1500);
        }, 3000);
    });
</script>
<?php


incluirTemplate('modales/modalTipo');

incluirTemplate('cierre');


?>