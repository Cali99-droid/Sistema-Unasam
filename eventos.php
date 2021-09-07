<?php

require 'includes/app.php';

use App\Evento;


$eventos = Evento::all();


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //instancia de grupo
    if ($_POST['cod'] == 1) {
        $evento = new Evento($_POST);
        $resultado = $evento->crear();

        if ($resultado) {
            header('Location: /eventos.php');
        }
    } elseif ($_POST['cod'] == 2) {
        $evento = new Evento($_POST);
        $resultado = $evento->actualizar();

        if ($resultado) {
            header('Location: /eventos.php');
        }
    }
}

incluirTemplate('barra');
?>



<div class="contenedor-grupos">
    <div class="titulo-grupos">
        <h2 class="no-margin">Gestión de Eventos</h2>
    </div>

    <div class="acciones-grupo">
        <div class="buscar">
            <i class="fas fa-search"></i>
            <input type="text" placeholder="Buscar">
        </div>

        <div class="nuevo-grupo">
            <button type="button" class="boton-grupo" id="boton-agregar-evento" onclick="modal('modal-agregar-ev', 'boton-agregar-evento', 'close-evento')">
                <i class="fas fa-plus-circle"></i> Agregar Evento
            </button>
        </div>
    </div>

    <div class="contenedor-tabla tab-beneficio">

        <table>
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
                        <td><?php echo $evento->nombre_evento; ?></td>
                        <td><?php echo $evento->fecha_inicio; ?></td>
                        <td><?php echo  $evento->fecha_final; ?></td>
                        <td>

                            <button type="button" class="boton-acciones" onclick="actualizarEvento(<?php echo $evento->idEventosrealizados; ?>,'modal-agregar-ev', 'boton-agregar-evento', 'close-evento')">
                                <i class=" fas fa-pencil-alt"></i> </button>


                            <input type="hidden" name="id" value="<?php echo $evento->idEventosrealizados; ?>">
                            <button type="button" class="boton-acciones borrar">
                                <i class="fas fa-trash"></i> </button>


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


<?php

incluirTemplate('modales/modEvento');

incluirTemplate('cierre');
