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



<script type="text/javascript">
    google.charts.load('current', {
        'packages': ['corechart']
    });
    google.charts.load('current', {
        'packages': ['bar']
    });
    google.charts.load('current', {
        'packages': ['bar']
    });
    google.charts.load("current", {
        packages: ["corechart"]
    });
    google.charts.load("current", {
        packages: ["corechart"]
    });
    google.charts.load("current", {
        packages: ["corechart"]
    });

    google.charts.setOnLoadCallback(dibujaBeneficiosPen);
    google.charts.setOnLoadCallback(dibujaEstadoBeneficios);
    google.charts.setOnLoadCallback(dibujaFecha);
    google.charts.setOnLoadCallback(dibujaTop);
    google.charts.setOnLoadCallback(drawStuff);
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {

        var data = google.visualization.arrayToDataTable([
            ['Facultad', 'Participaciones'],
            <?php
            while ($fila = $participantes->fetch_assoc()) {
                echo "['" . $fila["nombre"] . "'," . $fila["cantidad"] . "],";
            }
            ?>
        ]);

        var options = {
            title: 'Participantes por Grupo'
        };
        var chart = new google.visualization.PieChart(document.getElementById('piechart'));
        chart.draw(data, options);

    }


    function drawStuff() {
        var data = new google.visualization.arrayToDataTable([
            ['Grupo', 'Cantidad de Invitaciones'],
            <?php
            while ($fila = $invitaciones->fetch_assoc()) {
                echo "['" . $fila["nombre_grupo"] . "'," . $fila["CantidadInvitaciones"] . "],";
            }
            ?>

        ]);

        var options = {
            width: 350,
            legend: {
                position: 'none'
            },
            chart: {
                title: 'Invitaciones por Grupo',
                subtitle: 'Cantidad de Invitaciones'
            },
            axes: {
                x: {
                    0: {

                    } // Top x-axis.
                }
            },
            bar: {
                groupWidth: "90%"
            }
        };

        var chart2 = new google.charts.Bar(document.getElementById('piechart1'));
        // Convert the Classic options to Material options.
        chart2.draw(data, google.charts.Bar.convertOptions(options));
    };

    function dibujaTop() {
        var data = new google.visualization.arrayToDataTable([
            ['Escuelas', 'Cantidad de Participaciones', {
                role: 'style'
            }],
            <?php
            while ($fila = $top->fetch_assoc()) {
                echo "['" . $fila["nombre_escuela"] . "'," . $fila["cantidad"] . ",'random_color()'],";
            }
            ?>

        ]);

        var options = {
            title: 'Chess opening moves',
            width: 300,
            legend: {
                position: 'none'
            },
            chart: {
                title: 'Participaciones',
                subtitle: 'Cantidad de Participación por escuelas'
            },
            bars: 'horizontal', // Required for Material Bar Charts.
            axes: {
                x: {
                    0: {
                        side: 'top',
                        label: 'Porcentaje'
                    } // Top x-axis.
                }
            },
            bar: {
                groupWidth: "90%"
            }
        };

        var chart = new google.charts.Bar(document.getElementById('piechart2'));
        chart.draw(data, options);
    };

    function dibujaFecha() {
        var data = google.visualization.arrayToDataTable([
            ['X', 'Cantidad de Participaciones'],
            <?php
            while ($fila = $particionesFecha->fetch_assoc()) {
                echo "['" . $fila["Inicio"] . "'," . $fila["Cantidad"] . "],";
            }
            ?>

        ]);

        var options = {
            legend: 'none',
            colors: ['#15A0C8'],
            pointSize: 30,
            pointShape: {
                type: 'circle',
                rotation: 180
            }
        };

        var chart = new google.visualization.AreaChart(document.getElementById('piechart3'));
        chart.draw(data, options);
    }

    function dibujaEstadoBeneficios() {
        var data = google.visualization.arrayToDataTable([
            ['Beneficios', 'Catidad de Completados'],
            <?php
            while ($fila = $estadoBeneficios->fetch_assoc()) {
                echo "['" . $fila["nombre"] . "'," . $fila["cantidad"] . "],";
            }
            ?>

        ]);

        var options = {
            title: 'Beneficios Cumplidos',
            pieHole: 0.4,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart4'));
        chart.draw(data, options);
    }


    function dibujaBeneficiosPen() {
        var data = google.visualization.arrayToDataTable([
            ['Beneficios', 'Catidad de Completados'],
            <?php
            while ($fila = $beneficiosPendientes->fetch_assoc()) {
                echo "['" . $fila["nombre"] . "'," . $fila["cantidad"] . "],";
            }
            ?>

        ]);

        var options = {
            title: 'Beneficios Pendientes',
            pieHole: 0.4,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart5'));
        chart.draw(data, options);
    }
</script>