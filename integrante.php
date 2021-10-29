<?php
require 'includes/app.php';


incluirTemplate('barra');
?>


<div class="contenedor-grupos">



    <div class="datos-integrante">
        <div class="datos datos--ava">
            <img src="build/img/profile.svg" alt="Avatar" class="avatar-int">
        </div>

        <div class="datos datos--text">
            <span class="datos__nombre">Carlos Alvarado Robles</span>
            <p><?php echo $_GET['id'] ?></p>
            <p>Ing. sistemas</p>
            <p>Grupo al que pertecnece</p>

        </div>

        <div class="datos datos--general">
            <p class="info"><strong> Total participaciones:</strong> 10</p>
            <p class="info"><strong> Total Beneficios:</strong> 10</p>
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
            <h3 class="titulo_participacion">Beneficios</h3>

            <div class="contenedor-tabla contenedor-tabla__perfil">

                <table>
                    <thead>
                        <tr>
                            <th>Beneficoio</th>
                            <th>Estado</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Alfreds Futterkiste</td>
                            <td>Maria Anders</td>
                        </tr>
                        <tr>
                            <td>Alfreds Futterkiste</td>
                            <td>Maria Anders</td>

                        </tr>
                        <tr>
                            <td>Berglunds snabbköp</td>
                            <td>Christina Berglund</td>

                        </tr>
                    </tbody>
                </table>
            </div>




        </div>

    </div>


</div>

<?php

incluirTemplate('cierre');
