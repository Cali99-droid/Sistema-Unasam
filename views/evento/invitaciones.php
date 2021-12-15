<div class="contenedor-grupos">
    <div class="titulo-grupos con_accion">
        <a href="/eventos" class="btn-asignar"><i class="fas fa-arrow-circle-left"></i> Volver</a>
        <h2 class="no-margin">Gestión de Invitaciones</h2>
    </div>

    <div class="acciones-grupo">
        <div class="buscar">
            <i class="fas fa-search"></i>
            <input type="text" id="buscarEv" placeholder="Buscar" class="busqueda-ev">
        </div>
    </div>

    <div class="contenedor-tabla tab-beneficio">

        <table id="mytable-ev">
            <thead>
                <tr>
                    <th>Fecha Invitación</th>
                    <th>Evento</th>
                    <th>Grupo</th>
                    <th>Observación</th>
                    <th>Estado</th>
                    <th>Acciones</th>

                </tr>
            </thead>
            <tbody>
                <?php foreach ($invitaciones as $invitacion) : ?>
                    <tr>
                        <td><?php echo $invitacion->fecha_hora; ?></td>
                        <td><?php echo $invitacion->getEvento()->nombre; ?></td>
                        <td><?php echo $invitacion->getGrupo()->nombre; ?></td>
                        <td><?php echo $invitacion->observacion; ?></td>
                        <td><?php echo $invitacion->estado; ?></td>
                        <td>
                            <a class="btn-asignar" onclick="actualizarInvitacion('<?php echo $invitacion->fecha_hora; ?>', '<?php echo $invitacion->getGrupo()->id; ?>','<?php echo $invitacion->observacion; ?>',<?php echo $invitacion->getEvento()->id; ?>,'<?php echo $invitacion->id; ?>')"> <i class=" fas fa-pencil-alt"></i> Editar</a>
                            <button type="button" class="btn-asignar" onclick="borrarInv(<?php echo $invitacion->id; ?>)">
                                <i class="fas fa-trash"></i> Borrar</button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

    </div>


</div>


<div class="modal-agregar" id="modal_invitar">

    <div class="contenido-modal-grupo  contenedor-grupos modal-eventos">
        <div class="encabezado-modal">
            <h2 id="titulo_integrante">Invitar a:<span id="nombreEvento"></span></h2>
            <span class=" close inv">&times;</span>

        </div>
        <div>
            <form class="formulario-grupo">

                <?php include 'asignarInvitacion.php'; ?>
            </form>
        </div>

    </div>



</div>