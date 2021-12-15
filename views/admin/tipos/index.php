<div class="contenedor-grupos">
    <div class="titulo-grupos">
        <h2 class="no-margin">Gestión de Tipos</h2>
    </div>

    <div class="acciones-grupo">
        <div class="buscar">
            <i class="fas fa-search"></i>
            <input type="text" placeholder="Buscar" id="buscarTipo" class="busqueda">
        </div>

        <div class="nuevo-grupo__mod">
            <a type="button" class="btn-asignar" id="boton-agregar-tipo" onclick="modal( 'modal-tipo', 'boton-agregar-tipo', 'close-tipo', 'nuevo tipo')">
                <i class="fas fa-plus-circle"></i> Agregar Tipos</a>
        </div>
    </div>

    <div class="contenedor-tabla tab-beneficio">

        <table id="mytable">

            <thead>
                <tr>
                    <th>Tipos</th>
                    <th>Acciones</th>
                </tr>

            </thead>
            <tbody>

                <?php foreach ($tipos as $tipo) :  ?>
                    <tr>
                        <td><?php echo $tipo->nombre; ?></td>

                        <td>
                            <form method="GET" target="frame">


                                <button type="button" class="btn-asignar" onclick="actualizarTipo(<?php echo $tipo->id; ?>, '<?php echo $tipo->nombre; ?>')">
                                    <i class=" fas fa-pencil-alt"></i> Editar</button>


                                <input type="hidden" name="id" value="<?php echo $tipo->id; ?>">
                                <button type="button" class="btn-asignar" onclick="preguntar(borrarTipo,<?php echo $tipo->id; ?>)">
                                    <i class="fas fa-trash"></i> Borrar</button>



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
</div>

<!--ventana modal-->

<div class="modal-agregar" id="modal-tipo">


    <div class="contenido-modal-grupo">
        <div class="encabezado-modal">
            <h2 id="titulo_tipo">Ingrese nuevo tipo de grupo</h2>
            <span class="close close-tipo">&times;</span>

        </div>

        <form method="POST" class="formulario-grupo">

            <label for="nombre_tipo">Nombre del tipo</label>
            <input type="text" name="nombre_tipo" id="nombre_tipo">

            <input type="hidden" name="cod" value="1" id="valor">
            <input type="hidden" name="idTipoGrupo" value='' id="idTipoGrupo">
            <button type="button" id="crearTipo">Aceptar</button>

        </form>

    </div>

</div>