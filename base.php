<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema</title>
    <link rel="stylesheet" href="build/css/app.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
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

                    <a href="index.html"><i class='bx bxs-home' style='color:#e1e1e1'></i>Inicio</a>
                    <a href="grupos.html"><i class='bx bx-group'></i>Grupos</a>
                    <a href="beneficios.html"><i class='bx bx-medal'></i> Beneficios</a>
                    <a href="eventos.html"><i class='bx bxs-calendar'></i>Eventos</a>
                    <div class="item">
                        <a href="javascript:void(0)" class="administrador" onclick="mostrarAdmin()"><i class="fas fa-user-tie"></i>Administrador</a>
                        <div class="sub-item" id="sub-item">
                            <a href="tipos.html">Tipos de Grupos</a>
                            <a href="usuarios.html">Usuarios</a>
                            <a href="semestre.html">Semestres</a>
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
                    <h2>Semestre 2021 - I</h2>
                </div>

                <div class="perfil" id="perfil">
                    <div>
                        <button onclick="mostrarPerfil()" id="boton-perfil" class="boton-perfil" type="button">Usuario<i class='bx bxs-user-circle'></i></button>
                    </div>

                    <div class="contenido-perfil" id="contenido-perfil">
                        <button>Ver Perfil</button>
                        <a href="login.html"><button class="boton-salir">Salir</button></a>
                    </div>


                </div>
            </div>
            <div>
                <h3>Espacio para añadir contenido</h3>
            </div>

        </div>
    </div>
    <script src="build/js/bundle.min.js"></script>
</body>

</html>