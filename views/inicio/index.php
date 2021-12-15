<div class="contenedor-grupos">
    <div class="titulo-ana">
        <h3 class="no-margin">Análisis Gráfico</h3>
    </div>
    <div class="contenido-dashboard">
  


        <div class="contenido-dash">
            <div class="dash" id="piechart"></div>
            <div class="dash" id="piechart1"></div>
            <div class="dash" id="piechart2"></div>
            <div class="dash" id="piechart3"></div>
            <div class="dash" id="piechart4"></div>
            <div class="dash" id="piechart5"></div>
            <div class="dash" id="piechart6"></div>
            <div class="dash" id="piechart7"></div>
            <div class="dash" id="piechart8"></div>
        </div>
    </div>


</div>

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
    google.charts.load('current', {
        'packages': ['line']
    });
    google.charts.load('current', {
        'packages': ['line']
    });
    google.charts.load('current', {
        'packages': ['line']
    });

    google.charts.setOnLoadCallback(dibujaBeneficiosPen);
    google.charts.setOnLoadCallback(dibujaEstadoBeneficios);
    google.charts.setOnLoadCallback(dibujaFecha);
    google.charts.setOnLoadCallback(dibujaTop);
    google.charts.setOnLoadCallback(drawStuff);
    google.charts.setOnLoadCallback(drawChart);
    google.charts.setOnLoadCallback(dibujaTendencia);
    google.charts.setOnLoadCallback(dibujaTendenciaRegulares);
    google.charts.setOnLoadCallback(dibujaTendenciaIrregulares);
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
            width: 1000,
            heigth: 1000,
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
            width: 1000,
            heigth: 1000,
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
            width: 1000,
            heigth: 1000,
            legend: {
                position: 'none'
            },
            chart: {
                title: 'TOP 5 ESCUELAS',
                subtitle: 'Mayor de Participación por escuelas'
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
            width: 1000,
            heigth: 1000,
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
            width: 1000,
            heigth: 1000,
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
            width: 1000,
            heigth: 1000,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart5'));
        chart.draw(data, options);
    }
    /* INICIO*/

    function dibujaTendencia() {
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'MESES');
        <?php while ($fila = $escuelas->fetch_assoc()) {
        ?>
            data.addColumn('number',
                <?php
                echo " '" . $fila["nombre"] . "'";
                ?>);
        <?php
        } ?>
        <?php echo $muestraDash; ?>

        var options = {
            chart: {
                title: 'Tendencia de participaciones por escuelas',
                subtitle: 'cantidad de estudiantes'
            },
            width: 1000,
            heigth: 1000,
            axes: {
                x: {
                    0: {
                        side: 'bot'
                    }
                }
            }
        };
        var chart = new google.charts.Line(document.getElementById('piechart6'));
        chart.draw(data, google.charts.Line.convertOptions(options));

    }

    /* FIN*/
    
    /* TENDENCIA DE REPORTES POR SEMESTRE DE ALUMNOS REGULARES */
    function dibujaTendenciaRegulares() {
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Tipo Grupos');
        <?php while ($fila = $getSemestre->fetch_assoc()) {
        ?>
            data.addColumn('number',
                <?php
                echo " '" . $fila["nombre"] . "'";
                ?>);
        <?php
        } ?>
           <?php echo $tendenciaRegulares; ?>

        var options = {
            chart: {
                title: 'Tendencia de Cantidad de Regulares por Grupo',
                subtitle: 'cantidad de estudiantes'
            },
            width: 1000,
            heigth: 1000,
            axes: {
                x: {
                    0: {
                        side: 'bot'
                    }
                }
            }
        };
        var chart7 = new google.charts.Line(document.getElementById('piechart7'));
        chart7.draw(data, google.charts.Line.convertOptions(options));

    }

    /* FIN */
    /* TENDENCIA DE REPORTES POR SEMESTRE DE ALUMNOS IRREGULARES */
    function dibujaTendenciaIrregulares() {
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Tipos Grupos');
        <?php while ($fila = $getSemestre2->fetch_assoc()) {
        ?>
            data.addColumn('number',
                <?php
                echo " '" . $fila["nombre"] . "'";
                ?>);
        <?php
        } ?>
            <?php echo $tendenciaIrregulares; ?>

        var options = {
            chart: {
                title: 'Tendencia de Cantidad de Irregulares por Grupo',
                subtitle: 'cantidad de estudiantes'
            },
            width: 1000,
            heigth: 1000,
            axes: {
                x: {
                    0: {
                        side: 'bot'
                    }
                }
            }
        };
        var chart7 = new google.charts.Line(document.getElementById('piechart8'));
        chart7.draw(data, google.charts.Line.convertOptions(options));

    }

    /* FIN */
</script>