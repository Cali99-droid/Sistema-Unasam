<div class="contenedor-grupos">
    <div class="titulo-grupos">
        <h2 class="no-margin">Gestión de Beneficios</h2>
    </div>

    <div class="acciones-grupo">
        <div class="buscar">
            <i class="fas fa-search"></i>
            <input type="text" placeholder="Buscar" id="buscarBene" class="busqueda">
        </div>

        <div class="nuevo-grupo__mod">
            <a type="button" class="btn-asignar" id="boton-agregar-beneficio" onclick="modal('modal-agregar-bene', 'boton-agregar-beneficio', 'close')">
                <i class="fas fa-plus-circle"></i> Agregar Beneficio
            </a>

            <a href="/beneficiosTipo" class="btn-asignar"><i class="fas fa-tasks"></i> Gestion Asignaciones</a>
        </div>

    </div>

    <div class="contenedor-tabla tab-beneficio">

        <table id="mytable">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Resolución</th>
                    <th>Acciones</th>

                </tr>
            </thead>
            <tbody>
                <?php foreach ($beneficios as $beneficio) : ?>
                    <tr>
                        <td><?php echo $beneficio->nombre; ?></td>
                        <!--<td> <a class="btn-asignar" href="docs/<?php echo $beneficio->getDoc() == '#' ? 'noExiste' : $beneficio->getDoc() ?>" target="_blank"><i class=" fas fa-eye"></i> Ver Resolución</a></td>  -->
                        <?php 
                            if(($beneficio->getDoc() == '#') || ($beneficio->getDoc() == '') ){
                                ?>
                                <td> <a class="btn-asignar"  disabled ='true'><i class="fas fa-eye-slash"></i> Sin archivo</a></td>
                            <?php
                            }else{
                            ?>
                                <td> <a class="btn-asignar" href="docs/<?php echo $beneficio->getDoc() == '#' ? 'noExiste' : $beneficio->getDoc() ?>" target="_blank"><i class=" fas fa-eye"></i> Ver Resolución</a></td>
                                <?php
                            }
                        ?>
                        <td>
                            <button class="btn-asignar" onclick="modalAsignar(<?php echo $beneficio->id; ?>, '<?php echo $beneficio->nombre; ?>','modal-asignar-grupo', 'boton-agregar-beneficio', 'asig')"><i class="fas fa-plus-circle"></i> Asignar</button>
                            <button type="button" class="btn-asignar" onclick="actualizarBeneficio(<?php echo $beneficio->id; ?>)">
                                <i class=" fas fa-pencil-alt"></i> Editar</button>
                            <input type="hidden" name="id" value="<?php echo $beneficio->id; ?>">
                            <button type="button" class="btn-asignar"  onclick="borrarBen(<?php echo $beneficio->id; ?>)">
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
<div class="modal-agregar" id="modal-agregar-bene">


    <div class="modal-beneficio contenido-modal-grupo ">
        <div class="encabezado-modal">
            <h2>Nuevo Beneficio</h2>
            <span class="close">&times;</span>

        </div>
        <form method="POST" class="formulario-beneficio" enctype="multipart/form-data">

            <?php include_once "modBeneficio.php"; ?>


        </form>

    </div>
</div>

<div class="modal-agregar" id="modal-asignar-grupo">


    <div class="modal-beneficio contenido-modal-grupo ">
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