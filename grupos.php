<?php

require 'includes/app.php';

use App\Grupo;
use Intervention\Image\ImageManagerStatic as Image;

//obtener todos los grupos
$grupos = Grupo::all();


$consulta = "SELECT * FROM tipo_grupo";
$tipos = mysqli_query($db, $consulta);

/**Insercion */
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //instancia de grupo
    $grupo = new Grupo($_POST);

    /**Generar nombre unico */
    $nombreImagen = md5(uniqid(rand(), true)) . ".jpg";

    /**Setear imagen */
    if ($_FILES['imagen']['tmp_name']) {
        $image = Image::make($_FILES['imagen']['tmp_name'])->fit(800, 600);
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
    $resultado = $grupo->guardar();

    //mensaje de exito o error
    if ($resultado) {
        header('Location: /grupos.php');
    }
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

            <?php foreach ($grupos as $grupo) : ?>

                <div class="grupo">
                    <a href="grupo.php?id=<?php echo $grupo->idgrupo_universitario ?>">
                        <img src="/imagenes/<?php echo  $grupo->imagen; ?>" alt="Avatar" class="grupo-imagen">
                        <div class="container">
                            <h4 class="no-margin"><?php echo $grupo->nombre_grupo; ?></h4>
                            <p> <?php echo $grupo->getTipo(); ?></p>
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

            <label for="nombre_grupo">Nombre del grupo</label>
            <input type="text" name="nombre_grupo" id="nombre-grupo" required>

            <label for="fecha_creacion">Fecha de Creacion</label>
            <input type="date" name="fecha_creacion" id="fecha_creacion">

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

    </div>
</div>

<?php


incluirTemplate('modales/modalTipo');

incluirTemplate('cierre');

?>