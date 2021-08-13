<?php

require 'includes/funciones.php';
require 'includes/config/database.php';

$db = conectarDB();

$query = 'SELECT * FROM eventos_realizados ';
$resultado = mysqli_query($db, $query);
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
            <button type="button" class="boton-grupo" id="boton-agregar-evento" onclick="modal('modal-agregar', 'boton-agregar-evento', 'close-evento')">
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
                <?php while ($eventos = mysqli_fetch_assoc($resultado)) : ?>
                    <tr>
                        <td><?php echo $eventos['nombre_evento']; ?></td>
                        <td><?php echo $eventos['fecha_inicio']; ?></td>
                        <td><?php echo  $eventos['fecha_final']; ?></td>
                        <td>
                            <form method="POST" class="w-100">
                                <input type="hidden" name="id" value="<?php echo $beneficios['idBeneficio']; ?>">
                                <input type="submit" class="boton-rojo-block" value="Eliminar">
                            </form>

                        </td>
                    </tr>
                <?php endwhile; ?>
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
