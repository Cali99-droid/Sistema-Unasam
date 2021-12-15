<!--
<div class="buscar" id="cont_buscar">
    <label for="buscar" id="lbBuscar">Buscar</label>
    <input type="text" name="buscar" id="buscar" placeholder="Buscar por DNI">
    <button type="button" id="btnBuscarDNI" name="btnBuscarDNI" onclick="BuscarIntegrante($('#buscar').val())">Buscar</button>
</div>
-->

<!--  MODAL PAA REGISTRAR NUEVO INTEGRANTE -->

<div class="contenedor-al ">
    <div class="columna-al">
        <div>
            <label for="dni">DNI</label>
            <input type="text" name="integrante[dni]" id="dni_s" maxlength="8">
        </div>
        <div>
            <label for="nombre">Nombre</label>
            <input type="text" name="integrante[nombre]" class="devuelveDNIValidado" id="nombre_s">
        </div>
        <div>
            <label for="apellido">Apellido</label>
            <input type="text" name="integrante[apellido]" class="devuelveDNIValidado" id="apellido_s">
        </div>


        <div>
            <label for="genero">Género</label>
            <select name="integrante[genero]" id="genero_s">
                <option value="" disabled selected>--Seleccione--</option>
                <option value="Masculino">Masculino</option>
                <option value="Femenino">Femenino</option>
            </select>

        </div>

        <div>
            <label for="direccion">Dirección</label>
            <input type="text" name="integrante[direccion]" class="devuelveDNIValidado" id="direccion_s">
            <!-- HIIDEN PARA CAPTURAR EL ID DEL GRUPO -->
            <input type="hidden" id="idGrupo" value="<?php echo $grupo->id; ?>">
        </div>


    </div>


    <div class="columna-al">
        <div>
            <label for="email">Email</label>
            <input type="email" name="integrante[email]" class="devuelveDNIValidado" id="email_s">
        </div>

        <div>
            <label for="telefono">Teléfono</label>
            <input type="text" name="integrante[telefono]" maxlength="9" class="devuelveDNIValidado" id="telefono_s" placeholder="Ingrese teléfono">
        </div>

        <div>
            <label for="codigo_alumno">Código</label>
            <input type="text" name="integrante[codigo_alumno]" class="devuelveDNIValidado" id="codigo_alumno_s">
        </div>

        <div>
            <label for="idEscuela" nombre-usu>Escuela</label>
            <select name="integrante[idEscuela]" id="idEscuela_s" class="esc-sel">
                <option value="" selected disabled>--Seleccione--</option>
                <?php while ($row = mysqli_fetch_assoc($escuelas)) : ?>
                    <option value="<?php echo $row['id']; ?>"><?php echo $row['nombre']; ?>
                    <?php endwhile; ?></option>

            </select>
        </div>


        <div>
            <label for="nombre_procedencia">Procedencia</label>
            <input type="text" name="integrante[nombre_procedencia]" class="devuelveDNIValidado" id="nombre_procedencia_s">

        </div>





    </div>



    <div class="columna-al">
        <div>
            <label for="estado">Estado</label>
            <select name="integrante[estado]" id="estado_s">
                <option value="" disabled selected>--Seleccione--</option>
                <option value="activo">Activo</option>
                <option value="inactivo">Inactivo</option>
            </select>
        </div>


        <div>
            <label for="idCondicionEconomica">Condición Socioeconomica</label>
            <select name="integrante[idCondicionEconomica]" id="idCondicionEconomica_s" required>
                <option value="" selected disabled>--Seleccione--</option>
                <?php foreach ($condiciones as $condicion) : ?>
                    <option value="<?php echo $condicion->id; ?>"><?php echo $condicion->nombre; ?>
                    <?php endforeach; ?></option>
            </select>
        </div>

        <div>

            <label for="descripcion">Descripción</label>
            <textarea name="integrante[descripcion]" class="devuelveDNIValidado" id="descripcion_s" cols="30" rows="4"></textarea>
        </div>
        <div>
            <input type="hidden" name="cod" value="2" id="valor">
            <input type="hidden" name="integrante[idPersona]" value='' id="idPersona_s">
            <button type="button" onclick="crearIntegrante()">Aceptar</button>
        </div>

    </div>



</div>

<script>
    $(document).ready(function() {
        $('#dni_s').on('input', function() {

            this.value = this.value.replace(/[^0-9]/g, '');

        });
        $('#telefono_s').on('input', function() {

            this.value = this.value.replace(/[^0-9]/g, '');

        });

        $('#dni_s').keyup('input',function () {
            if (this.value.length == 8) {
                //jsBuscar();
                if(jsBuscar()==true){
                    Mensaje();
                }   
            }
        });
        // Clase que devuelve al DNI en caso este esté repetido en un mismo grupo
        $('.devuelveDNIValidado').keyup('input',function () {
            if(jsBuscar()==true){
                //document.getElementById("miInput").focus();
                //$("#dni_s").focus();
                $('#dni_s').select();
                Mensaje();
                
            }
        });



        function Mensaje(){
            Swal.fire({
                        icon: 'warning',
                        title: 'AVISO ...!',
                        text: 'El alumno ya está en el grupo, corrija el Nº de DNI'
                    });
        }
    })
</script>