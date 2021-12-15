<div class="login-container">


    <form class="modal-content animate" action="/olvide" method="POST">
        <div class="container">

            <label for="email"><b>Restablece tu password escribiendo tu email a continuación </b></label> <?php include_once __DIR__ . "/../templates/alertas.php" ?>
            <input type="email" placeholder="Ingrese tu correo" name="email" class="login-text" required>
            <button type="submit" class="boton-acceder">Enviar Instrucciones</button>
        </div>
    </form>





</div>
<div class="footer">
    <p> Copyright &copy 2021 Todos los Derechos Reservados - Universidad Nacional Santiago Antunez de Mayolo</p>
</div>