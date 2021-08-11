<?php

require 'includes/funciones.php';
require 'includes/config/database.php';

$db = conectarDB();
$query = "SELECT * FROM grupo_universitario";

$resultado = mysqli_query($db, $query);

$consulta = "SELECT * FROM tipo_grupo";
$tipos = mysqli_query($db, $consulta);

// echo '<pre>';
// var_dump(mysqli_fetch_assoc($resultado));
// echo '</pre>';
// exit;

/**Insercion */
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $nombre_grupo = $_POST['nombre_grupo'];
    $fecha_creacion = $_POST['fecha_creacion'];
    $resolucion_creacion = $_POST['resolucion_creacion'];
    $idTipoGrupo = $_POST['idTipoGrupo'];
    $imagen = $_FILES['imagen'] ?? null;

    /**Subida de Imagenes */
    $carpetaImagenes = 'imagenes/';
    $rutaImagen = '';
    if (!is_dir($carpetaImagenes)) {
        mkdir($carpetaImagenes);
    }

    if ($imagen) {
        $imagePath = $carpetaImagenes . md5(uniqid(rand(), true))  . $imagen['name'];

        // var_dump($imagePath);

        // mkdir(dirname($imagePath));

        // var_dump($imagen);

        move_uploaded_file($imagen['tmp_name'], $imagePath);
        $rutaImagen = $imagePath;
    }




    // Insertar en la BD.
    //echo "No hay errores";

    $query = "INSERT INTO grupo_universitario ( nombre_grupo, fecha_creacion, resolucion_creacion, imagen, idtipogrupo) VALUES ( '$nombre_grupo', '$fecha_creacion','$resolucion_creacion', '$rutaImagen', '$idTipoGrupo')";

    // echo $query;

    mysqli_query($db, $query) or die(mysqli_error($db));
    // var_dump($resultado);
    // printf("Nuevo registro con el id %d.\n", mysqli_insert_id($db));
    header('Location: /grupos.php');
}




incluirTemplate('barra');
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

            <?php while ($grupo = mysqli_fetch_assoc($resultado)) : ?>

                <div class="grupo">
                    <a href="grupo.php">
                        <img src="<?php echo $grupo['imagen']; ?>" alt="Avatar" class="grupo-imagen">
                        <div class="container">
                            <h4 class="no-margin"><?php echo $grupo['nombre_grupo']; ?></h4>
                            <p>Creación: <?php echo $grupo['fecha_creacion']; ?></p>
                        </div>
                    </a>
                </div>

            <?php endwhile; ?>



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

            <label for="nombre_grupo">Nombre del grupo</label>
            <input type="text" name="nombre_grupo" id="nombre-grupo" require>

            <label for="fecha_creacion">Fecha de Creacion</label>
            <input type="date" name="fecha_creacion" id="nombre-grupo">

            <label for="resolucion_creacion">Resolucion</label>
            <input type="text" name="resolucion_creacion" id="resolucion">

            <div class="contenido-tipos">
                <div class="cont-tip">
                    <label for="idTipoGrupo">Tipo de Grupo</label>
                    <select name="idTipoGrupo" id="tipo-grupo">
                        <option value="" selected>--Seleccione--</option>
                        <?php while ($row = mysqli_fetch_assoc($tipos)) : ?>
                            <option value="<?php echo $row['idTipoGrupo']; ?>"><?php echo $row['nombre_tipo']; ?>
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



        <?php

        incluirTemplate('modales/modalTipo');

        incluirTemplate('cierre');
