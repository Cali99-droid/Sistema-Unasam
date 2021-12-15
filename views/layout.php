<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema</title>
    <link rel="stylesheet" href="../build/css/app.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="../build/js/stacktable.js"></script>
    <link href="../build/css/stacktable.css" rel="stylesheet">
</head>

<body>

    <div class="contenedor-todo">
        <div class="contenedor-barra" id="cont-barra">
            <nav class="navegacion ">
                <div class="contenido-cabecera">

                    <div class="contenedor-logo">
                        <img src="build/img/escudoUNASAM.webp" alt="escudo unasam" class="logo-unasam">

                    </div>

                    <div class="texto-unasam">
                        <h3>UNASAM</h3>
                    </div>
                </div>
                <div class="items">

                    <a href="/inicio" title="Inicio"><i class='bx bxs-home' style='color:#e1e1e1'></i>Inicio</a>
                    <a href="/grupos" title="Grupos"><i class='bx bx-group'></i>Grupos</a>
                    <a href="/beneficios" title="Beneficios"><i class='bx bx-medal'></i>Beneficios</a>
                    <a href="/eventos" title="Eventos"><i class='bx bxs-calendar'></i>Eventos</a>
                    <a href="/reporte" title="Reportes"><i class="bx bxs-file"></i>Reportes</a>
                    <a href="/desercion" title="Deserción"><i class="fas fa-user-graduate"></i>Deserción</a>
                    <div class="item">
                        <a href="javascript:void(0)" class="administrador" onclick="mostrarAdmin()"><i class="fas fa-user-tie" title="Administrador"></i>Administrador</a>
                        <div class="sub-item " id="sub-item">
                            <a href="/tipos">Tipos de Grupos</a>
                            <a href="/usuarios">Usuarios</a>
                            <a href="/roles">Roles</a>
                            <a href="/semestres">Semestres</a>
                        </div>
                    </div>

                </div>
            </nav>

        </div>

        <div class="contenedor-principal" id="cont-prin">
            <div class="encabezado">
                <div class="semestre">
                    <button type="button" class="openbtn">☰</button>
                    <!--onclick="openNav()"-->
                    <h2></h2>
                </div>

                <div class="perfil" id="perfil">

                    <div>

                        <button onclick="mostrarPerfil()" id="boton-perfil" class="boton-perfil" type="button"><?php echo $_SESSION['username']; ?><i class='bx bxs-user-circle'></i></button>
                    </div>

                    <div class="contenido-perfil" id="contenido-perfil">
                        <a href="/perfil"><button>Ver Perfil</button></a>
                        <a href="/logout"><button class="boton-salir">Salir</button></a>
                    </div>


                </div>
            </div>
            <div>
                <?php echo $contenido; ?>

            </div>

        </div>
    </div>
    <script src="../build/js/app.js"></script>

</body>

</html>