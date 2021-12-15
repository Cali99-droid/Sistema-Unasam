<?php

?>
<div class="contenedor-grupos">

    <div class="datos-integrante">
        <div class="datos datos--ava">
            <img src="build/img/profile.svg" alt="Avatar" class="avatar-int">
        </div>

        <div class="datos datos--text">
            <span class="datos__nombre"><?php echo $datos->nombre . ' ' . $datos->apellido ?></span>
            <p>ROL: <?php echo $datos->tipo ?> </p>
            <p>DNI: <?php echo $datos->dni ?></p>
            <p>Usuario: <?php echo  $_SESSION['username']; ?> </p>


        </div>
        <div class="datos">
            <div class=" datos--general zoom">
                <p class="info"><strong> AVISO! Usted está modificando su contraseña, por lo cual usted deberá de tener en cuenta que al iniciar sesión sus datos se actualizan.</strong></p>

            </div>

        </div>

    </div>
    <HR>
    </HR>





    <?php include_once __DIR__ . "/../templates/alertas.php" ?>
    <div class="contenido-form-per">
        <h3>Cambiar Contraseña</h3>
        <form class="formulario-perfil" method="POST" action="/perfil">
            <?php include_once __DIR__ . "/../templates/recuperacion.php" ?>
        </form>
    </div>




    <script type="text/javascript">
        $(document).ready(function() {
            setTimeout(function() {
                $(".alerta").fadeOut(1500);
            }, 3000);
        });
    </script>