<div class="contenedor-grupos">

    <div class="titulo-grupos">
        <h2 class="no-margin">Gestión de Grupos</h2>
    </div>

    <div class="acciones-grupo">
        <div class="buscar">
            <form method="POST">
                <i class="fas fa-search"></i>
                <input type="text" name="valor" placeholder="Ingrese el nombre del grupo">
                <input type="hidden" value="2" id="codB" name="codB">
                <button type="submit" class="btn-asignar ">Buscar</button>
            </form>

        </div>

        <div class="nuevo-grupo__mod">
            <a type="button" class="btn-asignar" id="boton-agregar-grupo" onclick="modal('modal-grupo', 'boton-agregar-grupo', 'close-grupo')">
                <i class="fas fa-plus-circle"></i> Agregar Grupo </a>
        </div>
    </div>

    <div class="grupos">

        <div class="contenido-grupos">

            <?php foreach ($grupos as $grup) : ?>

                <div class="grupo">
                    <a href="/grupo?id=<?php echo $grup->id ?>">
                        <img src="/imagenes/<?php echo  $grup->imagen; ?>" alt="Imagen Grupo" class="grupo-imagen">
                        <div class="container">
                            <h4 class="no-margin"><?php echo $grup->nombre; ?></h4>
                            <p><?php echo $grup->getTipoGrupo(); ?></p>
                            <p>Nº Integrantes: <?php echo $grup->getCantidadIntegrantes();
                                                ?></p>
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
        <form class="formulario-grupo" method="POST" action="/grupos" enctype="multipart/form-data">

            <?php include 'formulario.php'; ?>

            <button type="submit" id="crearGrupo">Aceptar</button>
        </form>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        setTimeout(function() {
            $(".alerta").fadeOut(1500);
        }, 3000);
    });
</script>

<?php include_once __DIR__ . "/../templates/modal/nuevoTipo.php" ?>