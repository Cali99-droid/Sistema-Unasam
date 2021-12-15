<div class="contenedor-grupos">
    <div class="titulo-grupos">
        <h2 class="no-margin">Gestión de Eventos</h2>
    </div>

    <div class="acciones-grupo">
        <div class="buscar">
            <i class="fas fa-search"></i>
            <input type="text" id="buscarEv" placeholder="Buscar" class="busqueda-ev">
        </div>

        <div class="nuevo-grupo__mod">
            <a href="/nuevo-evento" class="btn-asignar" id="boton-agregar-evento">
                <i class="fas fa-plus-circle"></i> Agregar Evento
            </a>
            <a href="/evento-invitacion" class="btn-asignar" id="boton-agregar-evento">
                <i class="fas fa-eye"></i> Ver Invitaciones
            </a>
        </div>

    </div>

    <div class="contenedor-tabla tab-beneficio">

        <table id="mytable-ev">
            <thead>
                <tr>
                    <th>Evento</th>
                    <th>Fecha de Inicio</th>
                    <th>Fecha Final</th>
                    <th>Acciones</th>

                </tr>
            </thead>
            <tbody>
                <?php foreach ($eventos as $evento) : ?>
                    <tr>
                        <td><?php echo $evento->nombre; ?></td>
                        <td><?php echo $evento->fecha_inicio; ?></td>
                        <td><?php echo  $evento->fecha_fin; ?></td>
                        <td>
                            <button class="btn-asignar" onclick="invitarGrupo(
                                <?php echo $evento->id; ?>,
                               '<?php echo $evento->nombre; ?>',
                               'modal_invitar', 
                                'boton_agregar_usu', 
                                'inv')"> <i class="fas fa-user-plus"></i> Invitar</button>


                            <a class="btn-asignar" href="/actualizar-evento?id=<?php echo $evento->id ?>"> <i class=" fas fa-pencil-alt"></i> Editar</a>


                            <input type="hidden" name="id" value="<?php echo $evento->id; ?>">
                            <button type="button" class="btn-asignar" onclick="preguntar(borrarEvento,<?php echo $evento->id; ?>)">
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

<div class="modal-agregar" id="modal_invitar">

    <div class="contenido-modal-grupo  contenedor-grupos modal-eventos">
        <div class="encabezado-modal">
            <h2 id="titulo_integrante">Invitar Grupo al evento:<span id="nombreEvento"></span></h2>
            <span class=" close inv">&times;</span>

        </div>
        <div>
            <form class="formulario-grupo">

                <?php include 'asignarInvitacion.php'; ?>
            </form>
        </div>

    </div>



</div>
<script>
    $(document).ready(function() {
        $('#idGrupo').select2();
    });
</script>