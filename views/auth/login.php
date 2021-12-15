<div class="contenedor-principal--log">
    <div class="video">
        <div class="overlay">
            <div class=" contenido-video">
                <div class=" principal">
                    <div class="titulo--log">
                        <h1>Bienvenido al Sistema de Gestión de Organizaciones Estudiantiles</h1>

                        <button onclick="document.getElementById('id01').style.display='block'" class="boton-acceder">Acceder</button>
                    </div>
                </div>
            </div>
        </div>
        <video autoplay muted loop>
            <source src="/video/vd.mp4" type="video/mp4">
        </video>
    </div>
    <div>

        <div id="id01" class="modal">

            <form class="modal-content animate" action="/" method="POST">
                <div class="imgcontainer">
                    <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Cerrar">&times;</span>
                    <img src="build/img/profile.svg" alt="Avatar" class="avatar-log">
                </div>
                <?php include_once __DIR__ . "/../templates/alertas.php" ?>
                <div class="container">

                    <label for="usuario"><b>Usuario</b></label>
                    <input type="text" placeholder="Ingrese el usuario" name="usuario" class="login-text" requerid>

                    <label for="psw"><b>Contraseña</b></label>
                    <input type="password" placeholder="Ingrese su contraseña" name="pass" class="login-text" requerid>

                    <button type="submit" class="boton-acceder">Acceder</button>


                    <div class="container" style="background-color:#f1f1f1">
                        <button type="reset" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancelar</button>
                        <span class="psw">Olvidaste tu <a href="/olvide">contraseña?</a></span>
                    </div>


                </div>


            </form>
        </div>

        <div class="footer">
            <p> Copyright &copy 2021 Todos los Derechos Reservados - Universidad Nacional Santiago Antunez de Mayolo</p>
        </div>