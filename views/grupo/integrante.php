<?php
?>
<div class="contenedor-grupos">
    <div class="con_accion">

        <a href="/grupo?id=<?php echo $grupo->id ?>" class="btn-asignar"><i class="fas fa-arrow-circle-left"></i> Volver</a>

    </div>

    <div class="datos-integrante">
        <div class="datos datos--ava">
            <img src="build/img/profile.svg" alt="Avatar" class="avatar-int">
        </div>

        <div class="datos datos--text">
            <span class="datos__nombre"><?php echo $integrante->nombre . " " . $integrante->apellido ?></span>

            <p><?php echo $integrante->codigo ?> </p>
            <p><?php echo $grupo->nombre ?></p>

        </div>
        <div class="datos">
            <div class=" datos--general zoom">

                <p class="info"><strong> NOTA: Las información que a continuación se visualiza, se puede manipular de acuerdo a las necesidades
                        de la actividad del alumno en el el grupo </strong> </p>


            </div>

        </div>
        <div class="rendimiento">
            <a href="/rendimiento?id=<?php echo  $integrante->idAlumno ?>" class="btn-asignar"><i class="fas fa-eye"></i> Ver Rendimiento</a>
        </div>

    </div>

    <div class="detalles-integrante">
        <div class="tabs">
            <button id="defaultOpen" class="tablink" onclick="openPage('invitacion', this, ' #0055a1', 'tabcontent')">Invitaciones</button>
            <button id="participaciones" class="tablink" onclick="openPage('participacion', this, ' #0055a1', 'tabcontent')">Participaciones</button>
            <button class="tablink" id="benDer" onclick="openPage('beneficiosDerecho', this, '#0055a1', 'tabcontent')">Derechos</button>
            <button id="ben" class="tablink" onclick="openPage('beneficiosAsig', this, ' #0055a1', 'tabcontent')">Beneficios</button>
        </div>


        <div id="invitacion" class="tabcontent">
            <div class="detalle">

                <div class="contenedor-tabla contenedor-tabla__perfil">

                    <table class="table_res">
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

                                <tr>
                                    <td><?php echo $invitacion->getEvento()->nombre; ?></td>
                                    <td><?php echo $invitacion->fecha_hora; ?></td>


                                    <td><a class="<?php echo $invitacion->getEstado() == 'CUMPLIDA' ? 'label-ok' : 'label' ?>"><?php echo $invitacion->getEstado();  ?></a></td>

                                    <td><?php echo $invitacion->observacion; ?></td>

                                    <td><button id="asignar-asistencia" class="boton-asignar" onclick="asignarAsistencia('<?php echo $invitacion->id; ?>',
                                '<?php echo $integrante->idAlumnoGrupo; ?>','modal-asistencia', 'btn', 'close-asis' )"><i class="fas fa-plus-circle"></i> Asignar Asistencia</button>
                                        <button class="boton-asignar quitar oculto" id="quitar"><i class="fas fa-minus-circle"></i> Quitar</button>
                                        <!--<button class="boton-asignar quitar oculto" id="quitar"><i class="fas fa-minus-circle"></i> Quitar</button>  -->

                                    </td>

                                </tr>
                            <?php endforeach; ?>

                        </tbody>
                    </table>
                </div>

            </div>
        </div>

        <div id="participacion" class="tabcontent">
            <div class="detalle">

                <div class="contenedor-tabla contenedor-tabla__perfil">

                    <table class="table_res">
                        <thead>
                            <tr>


                                <th>Evento</th>
                                <th>Tipo de Participacion</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody id="cuerpo">

                            <?php foreach ($participaciones as $participacion) : ?>

                                <tr>
                                    <td><?php echo $participacion->getEvento(); ?></td>
                                    <td><?php echo $participacion->tipo; ?></td>

                                    <td><button onclick="quitarParticipacion(<?php echo $participacion->id ?>, <?php echo $integrante->idAlumnoGrupo; ?>)" class="boton-asignar"><i class="fas fa-minus-circle"></i> Quitar</button></td>

                                </tr>
                            <?php endforeach; ?>

                        </tbody>
                    </table>
                </div>

            </div>
        </div>

        <div id="beneficiosDerecho" class="tabcontent">
            <div class="detalle">


                <div class="contenedor-tabla contenedor-tabla__perfil">

                    <table class="table_res">
                        <thead>
                            <tr>
                                <th>Beneficio</th>

                                <th>Estado</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php foreach ($beneficios as $beneficio) :  ?>

                                <tr>
                                    <td><?php echo $beneficio->getNombreBeneficio(); ?></td>

                                    <td><a class="<?php echo $beneficio->estado == 'ACTIVO' ? 'label-ok' : 'label' ?>"><?php echo $beneficio->estado; ?></a></td>

                                    <td><button class="boton-asignar" onclick="asignarBeneficio(<?php echo $beneficio->id ?> , <?php echo $integrante->idAlumnoGrupo ?>)"> <i class="fas fa-plus-circle"></i> Asignar</button></td>
                                </tr>
                            <?php endforeach; ?>

                        </tbody>
                    </table>
                </div>




            </div>
        </div>

        <div id="beneficiosAsig" class="tabcontent">
            <div class="detalle">



                <div class="contenedor-tabla contenedor-tabla__perfil">

                    <table id="mytable">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Descripcion</th>
                                <th>Fecha de Asignación</th>
                                <th>Estado</th>

                            </tr>
                        </thead>
                        <tbody>

                            <?php foreach ($beneficioAsignados as $bena) : ?>


                                <tr>
                                    <td><?php echo $bena->getNombreBeneficio(); ?></td>
                                    <td><?php echo $bena->descripcion; ?></td>
                                    <td><?php echo $bena->fecha_efectiva; ?></td>

                                    <td>
                                        <input type="hidden" id="idBene" value="<?php echo  $bena->id ?>">
                                        <button id="<?php echo  $bena->id ?>" class="<?php echo  $bena->estado == 'COMPLETADO' ? 'label-ok' : 'label' ?> btn-toggle bt<?php echo  $bena->id ?>"><?php echo $bena->estado; ?></button>
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


<div class="modal-agregar" id="modal-asistencia">

    <div class="contenido-modal-grupo   modal-eventos">
        <div class="encabezado-modal">
            <h2 id="titulo_integrante">Asignar Asistencia</h2>
            <span class=" close close-asis" id="close-asis">&times;</span>
        </div>

        <div>
            <form class="formulario-grupo">
                <label for="tipo">Tipo de participación</label>
                <input type="text" name="tipo" id="tipo">
                <input type="hidden" value="" name="idinvitacion" id="idinvitacion">
                <input type="hidden" value="<?php echo $integrante->idAlumnoGrupo; ?>" name="idAlumnoGrupo" id="idAlumnoGrupo">
                <button type="reset" onclick="confirmarAsistencia()" class="btn-asignar">Aceptar</button>
            </form>

        </div>


    </div>

</div>



<div class="modal-agregar" id="modal-asigBeneficio">

    <div class="contenido-modal-grupo   modal-eventos">
        <div class="encabezado-modal">
            <h2 id="titulo_integrante">Asignar Beneficio</h2>
            <span class=" close close-ben" id="close-ben">&times;</span>
        </div>

        <div>
            <form class="formulario-grupo">
                <label for="tipo">Descripcion</label>
                <input type="text" name="descripcion" id="descripcion">

                <label for="estado">Estado</label>
                <select name="estado" id="estado">
                    <option value="COMPLETADO">COMPLETADO</option>
                    <option value="PENDIENTE">PENDIENTE</option>
                </select>
                <input type="hidden" id="idbeneficioXtipo">

                <button id="btn_confirmarBen" type="reset" class="btn-asignar">Aceptar</button>
            </form>
        </div>


    </div>

</div>