<?php

require 'includes/app.php';

use App\Beneficio;
use App\Grupo;
use App\TipoGrupo;

$beneficios = Beneficio::all();


//cargar tipos
$tipos = TipoGrupo::all();


$beneficio = new Beneficio();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {


    if ($_POST['cod'] == 1) {
        $beneficio = new Beneficio($_POST['beneficio']);

        $beneficio->crear();
    } elseif ($_POST['cod'] == 2) {

        $beneficio = new Beneficio($_POST['beneficio']);

        $beneficio->actualizar();
    }
}




incluirTemplate('barra');
?>

<div class="contenedor-grupos">
    <div class="titulo-grupos">
        <h2 class="no-margin">Gestión de Beneficios</h2>
    </div>

    <div class="acciones-grupo">
        <div class="buscar">
            <i class="fas fa-search"></i>
            <input type="text" placeholder="Buscar" id="buscarBene" class="busqueda">
        </div>

        <div class="nuevo-grupo">
            <button type="button" class="boton-grupo" id="boton-agregar-beneficio" onclick="modal('modal-agregar-bene', 'boton-agregar-beneficio', 'close')">
                <i class="fas fa-plus-circle"></i> Agregar Beneficio
            </button>
        </div>
    </div>

    <div class="contenedor-tabla tab-beneficio">

        <table id="mytable">
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
                        <td><?php echo $beneficio->nombre; ?></td>
                        <td><?php echo $beneficio->numero; ?></td>
                        <td><?php echo  $beneficio->fecha_emision; ?></td>
                        <td><?php echo $beneficio->estado; ?></td>
                        <td>



                            <button type="button" class="boton-acciones" onclick="actualizarBeneficio(   <?php echo $beneficio->idBeneficio; ?>, 'modal-agregar-bene', 'boton-agregar-beneficio', 'close')">
                                <i class=" fas fa-pencil-alt"></i> </button>


                            <input type="hidden" name="id" value="<?php echo $beneficio->idBeneficio; ?>">
                            <button type="button" class="boton-acciones borrar">
                                <i class="fas fa-trash"></i> </button>
                            <button onclick="modalAsignar(<?php echo $beneficio->idBeneficio; ?>, '<?php echo $beneficio->nombre; ?>','modal-asignar-grupo', 'boton-agregar-beneficio', 'asig')">Asignar a Grupos</button>
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
        <form method="POST" class="formulario-beneficio">

            <?php include 'includes/templates/modales/modBeneficio.php'; ?>


        </form>

    </div>
</div>

<div class="modal-agregar" id="modal-asignar-grupo">


    <div class="modal-beneficio contenido-modal-grupo ">
        <div class="encabezado-modal">
            <h2>Asignar Beneficio: <span id="nombreBeneficio"></span></h2>
            <span class="close asig">&times;</span>

        </div>
        <form class="asignar-grupo">

            <?php include 'includes/templates/modales/asignarGrupo.php'; ?>


        </form>

    </div>
</div>

<script>
    $(document).ready(function() {
        $('#idTipoGrupo').select2();

    });
</script>
<?php
//

incluirTemplate('cierre');
