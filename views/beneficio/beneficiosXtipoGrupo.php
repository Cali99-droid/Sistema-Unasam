<div class="contenedor-grupos">
    <div class="titulo-grupos con_accion">
        <a href="/beneficios" class="btn-asignar"><i class="fas fa-arrow-circle-left"></i> Volver</a>
        <h2 class="no-margin">Gestion de Beneficios por tipo de grupo</h2>
    </div>

    <div class="acciones-grupo">
        <div class="buscar">
            <i class="fas fa-search"></i>
            <input type="text" placeholder="Buscar" id="buscarBene" class="busqueda">
        </div>


    </div>

    <div class="contenedor-tabla tab-beneficio">

        <table id="mytable">
            <thead>
                <tr>
                    <th>Tipo</th>
                    <th>Beneficio</th>
                    <th>Estado</th>
                    <th>Acciones</th>

                </tr>
            </thead>
            <tbody>
                <?php foreach ($beneficiosTipo as $beneficio) : ?>
                    <tr>
                        <td><?php echo $beneficio->TipoGrupo; ?></td>
                        <td><?php echo $beneficio->Beneficio; ?></td>
                        <td><?php echo $beneficio->estado; ?></td>
                        <td>

                            <button type="button" class="btn-asignar" onclick="actualizarBenTipo(<?php echo $beneficio->idTipoGrupo; ?>,<?php echo $beneficio->idbeneficio; ?>,'<?php echo $beneficio->estado; ?>', <?php echo $beneficio->id; ?> )">
                                <i class=" fas fa-pencil-alt"></i> Editar</button>
                            <input type="hidden" name="id" value="">
                            <button type="button" class="btn-asignar" onclick="borrar(<?php echo $beneficio->id; ?>)">
                                <i class="fas fa-trash"></i> Borrar</button>

                        </td>
                    </tr>
                <?php endforeach; ?>

            </tbody>

        </table>

    </div>


</div>

<div class="modal-agregar" id="modal-asignar-editar">


    <div class="modal-beneficio contenido-modal-grupo ">
        <div class="encabezado-modal">
            <h2>Asignar Beneficio: <span id="nombreBeneficio"></span></h2>
            <span class="close asig-edit">&times;</span>

        </div>
        <div>
            <form class="formulario-grupo">

                <?php include 'editar-bene-tipo.php';
                ?>
            </form>
        </div>


    </div>
</div>