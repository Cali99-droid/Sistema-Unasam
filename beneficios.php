<?php

require 'includes/app.php';

use App\Beneficio;

$beneficios = Beneficio::all();

//cargar tipos
$consulta = "SELECT * FROM tipo_grupo";
$tipos = mysqli_query($db, $consulta);

$bene = new Beneficio();

incluirTemplate('barra');
?>

<div class="contenedor-grupos">
    <div class="titulo-grupos">
        <h2 class="no-margin">Gestión de Beneficios</h2>
    </div>

    <div class="acciones-grupo">
        <div class="buscar">
            <i class="fas fa-search"></i>
            <input type="text" placeholder="Buscar">
        </div>

        <div class="nuevo-grupo">
            <button type="button" class="boton-grupo" id="boton-agregar-beneficio" onclick="modal('modal-agregar', 'boton-agregar-beneficio', 'close')">
                <i class="fas fa-plus-circle"></i> Agregar Beneficio
            </button>
        </div>
    </div>

    <div class="contenedor-tabla tab-beneficio">

        <table>
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>NºResolucion</th>
                    <th>Fecha de Emision</th>
                    <th>Estado</th>
                    <th>Acciones</th>

                </tr>
            </thead>
            <tbody>
                <?php foreach ($beneficios as $beneficio) : ?>
                    <tr>
                        <td><?php echo $beneficio->getBeneficio(); ?></td>
                        <td><?php echo $beneficio->numero; ?></td>
                        <td><?php echo  $beneficio->fecha_emision; ?></td>
                        <td><?php echo $beneficio->estado; ?></td>
                        <td>
                            <form method="POST" class="w-100">
                                <input type="hidden" name="id" value="<?php echo $beneficio->idBeneficio; ?>">
                                <input type="submit" class="boton-rojo-block" value="Eliminar">
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
<div class="modal-agregar" id="modal-agregar">


    <div class="modal-beneficio contenido-modal-grupo ">
        <div class="encabezado-modal">
            <h2>Nuevo Beneficio</h2>
            <span class="close">&times;</span>

        </div>
        <form action="" class="formulario-beneficio">

            <?php include 'includes/templates/modales/modBeneficio.php';

            ?>


        </form>

    </div>
</div>


<?php
//

incluirTemplate('cierre');
