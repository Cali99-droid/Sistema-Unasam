<div class="login-container">
    <div class="login-info-container">
        <h1 class="title">BIENVENIDO</h1>
        <div class="social-login">
            <?php include_once __DIR__ . "/../templates/alertas.php" ?>
        </div>
        <p>Ingrese sus credenciales </p>
        <form class="inputs-container" method="POST">
            <input class="input" type="text" placeholder="Usuario" name="usuario">
            <input class="input" type="password" placeholder="Password" name="pass">

            <button class="btn" type="submit">ACCEDER</button>
            <p>Olvidó su contraseña? <a href="/olvide"><span class="span">Click Aqui</span></a></p>
        </form>
    </div>
    <div class="image-container">
        <div class="contenido_lado">
            <img src="/../build/img/escudoUNASAM.png" alt="">

        </div>
        <p>SISTEMA DE GESTIÓN DE ORGANIZACIONES</p>
    </div>

</div>