<?php

use App\Beneficio;
use App\Estudiante;

require 'includes/app.php';


$dni = $_GET['dni'];
$grupo = $_GET['tip'];
$idTipo = $_GET['idtipo'];
$integrante = Estudiante::find($dni);
$beneficioAsignados = Estudiante::getBeneficiosAsignados($integrante);





$beneficios = Beneficio::getBeneficiosPorTipo($idTipo);

$cantidadActivo = 0;
foreach ($beneficios as $beneficio) {
    if ($beneficio->estado === "ACTIVO") {
        $cantidadActivo++;
    }
}

incluirTemplate('barra');
?>


<div class="contenedor-grupos">



    <div class="datos-integrante">
        <div class="datos datos--ava">
            <img src="build/img/profile.svg" alt="Avatar" class="avatar-int">
        </div>

        <div class="datos datos--text">
            <span class="datos__nombre"><?php echo $integrante->nombre . " " . $integrante->apellido ?></span>
            <p>DNI: <?php echo $integrante->dni ?></p>
            <p><?php echo $integrante->dni ?> </p>
            <p><?php echo $grupo ?></p>

        </div>

        <div class="datos datos--general">
            <p class="info"><strong> Total participaciones:</strong> 3</p>
            <p class="info"><strong> Total Beneficios Activos:</strong> <?php echo $cantidadActivo ?> </p>
        </div>
    </div>

    <div class="detalles-integrante">
        <div class="detalle">
            <h3 class="titulo_participacion">Participaciones</h3>
            <div class="contenedor-tabla contenedor-tabla__perfil">

                <table>
                    <thead>
                        <tr>
                            <th>Evento</th>
                            <th>Fecha de Inicio</th>
                            <th>Fecha Final</th>
                            <th>Estado</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Alfreds Futterkiste</td>
                            <td>Maria Anders</td>
                            <td>Germany</td>
                            <td>Germany</td>
                        </tr>
                        <tr>
                            <td>Berglunds snabbköp</td>
                            <td>Christina Berglund</td>
                            <td>Sweden</td>
                            <td>Germany</td>
                        </tr>
                        <tr>
                            <td>Centro comercial Moctezuma</td>
                            <td>Francisco Chang</td>
                            <td>Mexico</td>
                            <td>Germany</td>
                        </tr>
                    </tbody>
                </table>
            </div>

        </div>

        <div class="detalle">
            <h3 class="titulo_participacion">Beneficios a los que tiene derecho</h3>

            <div class="contenedor-tabla contenedor-tabla__perfil">

                <table>
                    <thead>
                        <tr>
                            <th>Beneficio</th>
                            <th>Estado</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php foreach ($beneficios as $beneficio) :  ?>
                            <?php




                            ?>
                            <tr>
                                <td><?php echo $beneficio->nombre; ?></td>

                                <td><a class="<?php echo $beneficio->estado == 'ACTIVO' ? 'label-ok' : 'label' ?>"><?php echo $beneficio->estado; ?></a></td>

                                <td><button>Asignar</button></td>
                            </tr>
                        <?php endforeach; ?>

                    </tbody>
                </table>
            </div>




        </div>

        <div class="detalle">
            <h3 class="titulo_participacion">Beneficios Asignados</h3>

            <div class="contenedor-tabla contenedor-tabla__perfil">

                <table>
                    <thead>
                        <tr>
                            <th>Fecha de Asignación</th>
                            <th>Estado</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php while ($row = mysqli_fetch_object($beneficioAsignados)) : ?>


                            <tr>
                                <td><?php echo $row->fechefec; ?></td>

                                <td><a href="#" class="<?php echo $row->estado == 'ACTIVO' ? 'label-ok' : 'label' ?>"><?php echo $row->estado; ?></a></td>
                            </tr>
                        <?php endwhile; ?>

                    </tbody>
                </table>
            </div>




        </div>

    </div>


</div>

<?php

incluirTemplate('cierre');
