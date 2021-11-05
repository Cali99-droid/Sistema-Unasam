<?php

use App\Beneficio;
use App\Estudiante;
use App\Invitacion;

require 'includes/app.php';


$dni = $_GET['dni'];
$grupo = $_GET['tip'];
$idTipo = $_GET['idtipo'];
$integrante = Estudiante::find($dni);
$id = $integrante->getIdAlumnoGrupo();
//debugear($id['idAlumnoGrupo']);
$beneficioAsignados = Estudiante::getBeneficiosAsignados($integrante);

$beneficios = Beneficio::getBeneficiosPorTipo($idTipo);
$cantidadActivo = Estudiante::getNumBeneficiosAsignados($integrante)->cantidad;

$invitaciones = Invitacion::getInvitacionesPorGrupo($integrante->idgrupo_universitario);

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
        <div class="datos">
            <div class=" datos--general zoom">
                <p class="info"><strong> Total participaciones:</strong> 3</p>

            </div>
            <div class=" datos--general zoom">
                <p class="info"><strong> Total Beneficios Asignados Pendientes:</strong> <?php echo $cantidadActivo ?> </p>
            </div>
        </div>

    </div>
    <div class="hrh">
        <hr>
    </div>
    <div class="detalles-integrante">
        <div class="detalle">
            <h3 class="titulo_participacion">Participaciones</h3>
            <div class="contenedor-tabla contenedor-tabla__perfil">

                <table>
                    <thead>
                        <tr>
                            <th>Evento</th>
                            <th>Fecha y Hora de Invitacion</th>
                            <th>Estado</th>
                            <th>Observacion</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php foreach ($invitaciones as $invitacion) :  ?>
                            <?php



                            ?>
                            <tr>
                                <td><?php echo $invitacion->getEvento()['nombre_evento']; ?></td>
                                <td><?php echo $invitacion->fechaHoraInvitacion; ?></td>


                                <td><a class="<?php echo $invitacion->getEstado()->estado == 'VIGENTE' ? 'label-ok' : 'label' ?>"><?php echo  $invitacion->getEstado()->estado; ?></a></td>

                                <td><?php echo $invitacion->Observacion; ?></td>

                                <td><button class="boton-asignar"> <i class="fas fa-plus-circle"></i> Asignar Asistencia</button></td>

                            </tr>
                        <?php endforeach; ?>

                    </tbody>
                </table>
            </div>

        </div>
        <div class="hrh">
            <hr>
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

                                <td><button class="boton-asignar" onclick="asignarBeneficio(<?php echo $beneficio->idBeneficioxtipGrupo ?>, <?php echo $id['idAlumnoGrupo'] ?>)"> <i class="fas fa-plus-circle"></i> Asignar</button></td>
                            </tr>
                        <?php endforeach; ?>

                    </tbody>
                </table>
            </div>




        </div>
        <div class="hrh">
            <hr>
        </div>
        <div class="detalle">

            <h3 class="titulo_participacion">Beneficios Asignados</h3>

            <div class="contenedor-tabla contenedor-tabla__perfil">

                <table>
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Fecha de Asignación</th>
                            <th>Estado</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php while ($row = mysqli_fetch_object($beneficioAsignados)) : ?>


                            <tr>
                                <td><?php echo $row->nombre; ?></td>
                                <td><?php echo $row->fechefec; ?></td>

                                <td><a type="button" id="boton-activar" onclick="actualizarEstadoBeneficio(<?php echo  $row->idBeneficioalumno ?>)" class="<?php echo $row->EstadoBenAlum == 'CUMPLIDO' ? 'label-ok ' : 'label' ?>"><?php echo $row->EstadoBenAlum; ?></a></td>

                                <td><button>Quitar</button></td>
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
