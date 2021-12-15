<div class="contenedor-grupos">
    <div class="titulo-grupos">
        <h2 class="no-margin">Gestión de Deserciones Estudiantiles</h2>
    </div>

    <div class="acciones-grupo">
        <div class="buscar">
            <i class="fas fa-search"></i>
            <input type="text" placeholder="Buscar" id="buscarBene" class="busqueda">
        </div>

        <div class="nuevo-grupo__mod">
            <a type="button" class="btn-asignar" id="boton-agregar-beneficio" onclick="modal('modal-agregar-desercion', 'boton-agregar-beneficio', 'close')">
                <i class="fas fa-plus-circle"></i> Agregar Ítem
            </a>

           <!-- <a href="/beneficiosTipo" class="btn-asignar"><i class="fas fa-tasks"></i> Gestion Asignaciones</a> -->
        </div>

    </div>

    <div class="contenedor-tabla tab-beneficio">

        <table id="mytable">
            <thead>
                <tr>
                    <th>Ítem</th>
                    
                    <th>Acciones</th>

                </tr>
            </thead>
            <tbody>
                <?php foreach ($descripcion as $beneficio) : ?>
                    <tr>
                        <td><?php echo $beneficio->descripcion; ?></td>
                        <td>
                           <!-- <button class="btn-asignar" onclick="modalAsignar(<?php echo $beneficio->id; ?>, '<?php echo $beneficio->nombre; ?>','modal-asignar-grupo', 'boton-agregar-beneficio', 'asig')"><i class="fas fa-plus-circle"></i> Asignar</button>
                -->
                           <button type="button" class="btn-asignar" onclick="actualizarDesercionA(<?php echo $beneficio->id; ?>,'<?php echo $beneficio->descripcion; ?>')">
                                <i class=" fas fa-pencil-alt"></i> Editar</button>
                            <input type="hidden" name="id" value="<?php echo $beneficio->id; ?>">
                            <button type="button" class="btn-asignar"  onclick="eliminarDesercion(<?php echo $beneficio->id; ?>)">
                                <i class="fas fa-trash"></i> Borrar</button>

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
<div class="modal-agregar" id="modal-agregar-desercion">


    <div class="modal-beneficio contenido-modal-grupo ">
        <div class="encabezado-modal">
            <h2 id="TituloCabeceraModal">Nueva Deserción</h2>
            <span class="close">&times;</span>

        </div>
        <form method="POST" class="formulario-grupo">

            <?php include_once "modDesercion.php"; ?>


        </form>

    </div>
</div>

<div class="modal-agregar" id="modal-asignar-grupo">


    <div class="contenido-modal-grupo ">
        <div class="encabezado-modal">
            <h2>Asignar Beneficio: <span id="nombreBeneficio"></span></h2>
            <span class="close asig">&times;</span>

        </div>
        <div>
            <form class="formulario-grupo">

                <?php include 'asignarGrupo.php';
                ?>
            </form>
        </div>


    </div>
</div>

<script>
    $(document).ready(function() {
        $('#idTipoGrupo').select2();

        $('#mytable').stacktable();
    });
</script>