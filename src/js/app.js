const tab = '';

document.addEventListener('DOMContentLoaded', function () {

    eventListeners();
    botonGrupo();
    toggleB();

});


function navegacion() {
    const contenedor = document.querySelector('.contenedor-barra');
    const logo = document.querySelector('.contenido-cabecera');
    const admin = document.querySelector('.sub-item');

    /*navegacion.classList.contains*/

    if (contenedor.classList.contains('ocultar')) {
        contenedor.classList.remove('ocultar');
        logo.classList.remove('mostrar-logo');
        admin.classList.remove('mostrar-sub');


    } else {
        contenedor.classList.add('ocultar');
        logo.classList.add('mostrar-logo');
        admin.classList.remove('mostrar-sub');
    }

}

function mostrarAdmin() {
    const contenedor = document.querySelector('.contenedor-barra');
    const logo = document.querySelector('.contenido-cabecera');
    if (contenedor.classList.contains('ocultar')) {
        document.getElementById("sub-item").classList.toggle("mostrar-sub");
    } else {
        contenedor.classList.add('ocultar');
        logo.classList.add('mostrar-logo');
        document.getElementById("sub-item").classList.add("mostrar-sub");
    }
}

function eventListeners() {

    const mobileMenu = document.querySelector('.openbtn');
    mobileMenu.addEventListener('click', navegacion);
    // const btn = document.querySelector('#btn_modal');
    // btn.addEventListener('click', llamar_modal);
    //busca beneficio
    const buscarBeneficio = document.getElementById('buscarBene');
    if (buscarBeneficio != null) {
        buscarBeneficio.addEventListener('keyup', buscarRegistro);
    }
    //busca integrante
    const busc = document.getElementById('buscarIntegrante');
    if (busc != null) {
        busc.addEventListener('keyup', buscarRegistro);
    }

    //busca tipo
    const buscaTipo = document.getElementById('buscarTipo');
    if (buscaTipo != null) {
        buscaTipo.addEventListener('keyup', buscarRegistro);
    }


    //busca ev
    const buscaEv = document.getElementById('buscarEv');
    if (buscaEv != null) {
        buscaEv.addEventListener('keyup', buscarEv);
    }

    const buscaUser = document.getElementById('buscar-user');
    if (buscaUser != null) {
        buscaUser.addEventListener('keyup', buscarRegistro);
    }

    const buscaRol = document.getElementById('buscar-rol');
    if (buscaRol != null) {
        buscaRol.addEventListener('keyup', buscarRegistro);
    }

    const buscaSemestre = document.getElementById('buscar-semestre');
    if (buscaSemestre != null) {
        buscaSemestre.addEventListener('keyup', buscarRegistro);
    }





    /*
        const ad = document.querySelector('.administrador');
        ad.addEventListener('click', navegacion);*/
}

function llamar_modal() {
    Swal.fire(
        'Good job!',
        'You clicked the button!',
        'info'
    )
}

function items() {
    const contenedor = document.querySelector('.contenedor-barra');
    const logo = document.querySelector('.contenido-cabecera');
    const admin = document.querySelector('.sub-item');
    const ad = document.querySelector('.administrador');
    //ad.addEventListener('click', navegacion);

    /*navegacion.classList.contains*/

    if (!contenedor.classList.contains('ocultar')) {
        contenedor.classList.remove('ocultar');
        logo.classList.remove('mostrar-logo');
        //  admin.classList.add('mostrar-sub');


    } else {
        contenedor.classList.add('ocultar');
        logo.classList.add('mostrar-logo');
        // admin.classList.remove('mostrar-sub');
    }

}




function modal(modal, boton, close) {

    var modal = document.getElementById(modal);
    var span = document.getElementsByClassName(close)[0];

    modal.style.display = "block";


    span.onclick = function () {
        modal.style.display = "none";
        window.location.reload();
    }

    window.onclick = function (event) {
        if (event.target == modal) {
            modal.style.display = "none";
            window.location.reload();

        }
    }
}

function modalS(modal, boton, close) {

    var modal = document.getElementById(modal);
    var span = document.getElementsByClassName(close)[0];

    modal.style.display = "block";


    span.onclick = function () {
        modal.style.display = "none";

    }

    window.onclick = function (event) {
        if (event.target == modal) {
            modal.style.display = "none";


        }
    }
}


/**AJAX */

function BuscarIntegrante(dni) {

    var param = { "dni": dni, "cod": 1 }

    $.ajax({
        type: "POST",
        data: param,
        url: "./obtenDatos.php",
        success: function (r) {
            alert(r);
            datos = jQuery.parseJSON(r); // vas a castear el array json uno a uno

            
            $('#dni').val(datos['dni']);
            $('#nombre').val(datos['nombre']);
            $('#apellido').val(datos['apellido']);
            $('#direccion').val(datos['direccion']);
            $('#email').val(datos['email']);
            $('#telefono').val(datos['telefono']);
            $('#codigo_alumno').val(datos['codigo_alumno']);
            $('#idEscuela').val(datos['idEscuela']);
            $('#nombre_procedencia').val(datos['nombre_procedencia']);
            $('#estado').val(datos['estado']);
            $('#idCondicionEconomica').val(datos['idCondicionEconomica']);
            $('#descripcion').val(datos['descripcion']);
            $('#idPersona').val(datos['idPersona']);

            var recepcionaDatos = datos['genero'];
            if (recepcionaDatos === 'Masculino') {
                $("#genero option[value='Masculino'").attr("selected", true);
            } else {
                $("#genero option[value='Femenino'").attr("selected", true);
            }
        }
    });

}

function actualizarIntegrante(dni, modal_integrante, boton, close) {


    modal(modal_integrante, boton, close);

    BuscarIntegrante(dni);

    $(document).ready(function () {

        $("#cont_buscar").hide();

        $("#titulo_integrante").text('Editar Integrante');
        $("#valor").val('1');

    });



}

async function actualizarTipo(id, nombre) {

    modal('modal-tipo', 'boton-actualizar-tipo', 'close-tipo');

    $("#idTipoGrupo").val(id);
    $("#nombre_tipo").val(nombre);


}

async function actualizarBeneficio(id) {

    modal('modal-agregar-bene', 'boton-agregar-beneficio', 'close');

    const datos = new FormData();
    datos.append('id', id);

    try {

        //Peticion hacia la api http://localhost:3000/
        const url = 'http://localhost:3000/beneficios/getBeneficio';
        const respuesta = await fetch(url, {
            method: 'POST',
            body: datos
        })
        const resultado = await respuesta.json();


        //console.log(resultado['estado']);
        $(document).ready(function () {

            $('#numero').val(resultado['numero_resolucion']);
            $('#nombre').val(resultado['nombre']);
            $('#fecha_emision').val(resultado['fecha_emision']);
            $('#estado').val(resultado['estado']);
            $('#idresolucion_x_beneficio').val(resultado['idres']);

            $('#idBeneficio').val(resultado['id']);
            $('#cod').val(2);



            if (resultado['estado'] === 'activo') {
                $("#estado option[value='activo'").attr("selected", true);
            } else {
                $("#estado option[value='inactivo'").attr("selected", true);
            }


        });


    } catch (error) {
        Swal.fire({
            icon: 'error',
            title: 'Error...',
            text: 'Hubo un error !',

        })
    }

}

//no usado 
function actualizarEvento(id) {

    modal('modal-agregar-ev', 'boton-agregar-evento', 'close-evento');

    var param = { "id": id, "cod": 4 }

    $.ajax({
        type: "POST",
        data: param,
        url: "obtenDatos.php",
        success: function (r) {


            datos = jQuery.parseJSON(r); // vas a castear el array json uno a uno

            $('#nombre_evento').val(datos['nombre_evento']);
            $('#fecha_inicio').val(datos['fecha_inicio']);
            $('#fecha_final').val(datos['fecha_final']);
            $("#valor").val('2');
            $('#idEventosrealizados').val(datos['idEventosrealizados']);
        }
    });

}


function buscarUsuario(dni) {

    var param = { "dni": dni, "cod": 5 }

    $.ajax({
        type: "POST",
        data: param,
        url: "obtenDatos.php",

        success: function (r) {

            datos = jQuery.parseJSON(r); // vas a castear el array json uno a uno


            $('#dni').val(datos['dni']);
            $('#nombre').val(datos['nombre']);
            $('#apellido').val(datos['apellido']);
            $('#direccion').val(datos['direccion']);
            $('#email').val(datos['email']);
            $('#telefono').val(datos['telefono']);
            $('#usuario').val(datos['usuario']);
            $('#password').val(datos['password']);
            // $('#estado').val(datos['estado']);
            $('#idPersona').val(datos['idPersona']);
            var val = datos['estado'];

            var recepcionaDatos = datos['genero'];
            if (recepcionaDatos === 'Masculino') {
                $("#genero option[value='Masculino'").attr("selected", true);
            } else {
                $("#genero option[value='Femenino'").attr("selected", true);
            }

            if (val === 'activo') {
                $("#estado").attr('checked', true);

            } else {
                $("#estado").attr('checked', false);
            }
        }
    });

}


async function actualizarUsuario(dni, modal_usu, boton_agregar_usu, close_usu) {

    modal(modal_usu, boton_agregar_usu, close_usu);
    $(document).ready(function () {
        $("#bus_user").hide();
        $("#titulo_user").text('Editar Usuario');
        $("#valor").val('2');
        $("")
    });


    dat = new FormData();
    dat.append('dni', dni);
    try {

        //Peticion hacia la api
        const url = 'http://localhost:3000/get-user';
        const respuesta = await fetch(url, {
            method: 'POST',
            body: dat
        })
        const datos = await respuesta.json();


        //console.log(resultado['estado']);
        $(document).ready(function () {

            $('#dni').val(datos['dni']);
            $('#nombre').val(datos['nombre']);
            $('#apellido').val(datos['apellido']);
            $('#direccion').val(datos['direccion']);
            $('#email').val(datos['email']);
            $('#telefono').val(datos['telefono']);
            $('#usuario').val(datos['usuario']);
            $('#password').val(datos['password']);
            $('#rol').val(datos['idTipoUsu']);
            $('#estado').val(datos['estado']);
            $('#idusu').val(datos['idUsuario']);
            $('#cod').val(2);
            var val = datos['estado'];
            var rol = datos['idTipoUsu'];



            var recepcionaDatos = datos['genero'];
            if (recepcionaDatos === 'Masculino') {
                $("#genero option[value='Masculino'").attr("selected", true);
            } else {
                $("#genero option[value='Femenino'").attr("selected", true);
            }



        });


    } catch (error) {
        Swal.fire({
            icon: 'error',
            title: 'Error...',
            text: 'Hubo un error !',

        })
    }







}

function actualizarSemestre(id, nombre, fecha_inicio, fecha_fin, estado) {
    modal('modal-agregar-semestre', 'boton', 'close');
    $('#nombre').val(nombre);
    $('#fecha_inicio').val(fecha_inicio);
    $('#fecha_final').val(fecha_fin);
    $('#estado').val(estado);
    $('#idSemestre').val(id);
}


function buscarRegistro() {

    $(document).ready(function () {
        $(".busqueda").keyup(function () {
            _this = this;
            // Show only matching TR, hide rest of them
            $.each($("#mytable tbody tr"), function () {
                if ($(this).text().toLowerCase().indexOf($(_this).val().toLowerCase()) === -1)
                    $(this).hide();
                else
                    $(this).show();
            });
        });
    });
}

function asignarBeneficio(idbeneficioXtipo, idAlumnoGrupo) {
    modalS('modal-asigBeneficio', 'btn', 'close-ben');
    $(document).ready(function () {
        $("#idbeneficioXtipo").val(idbeneficioXtipo);
    });
    const btn = document.querySelector('#btn_confirmarBen');
    btn.addEventListener('click', confirmarBeneficio);

}
async function confirmarBeneficio() {
    const close = document.getElementById('close-ben');
    const descripcion = document.querySelector('#descripcion');
    const estado = document.querySelector('#estado');
    const idbeneficioXtipo = document.querySelector('#idbeneficioXtipo');
    const idAlumnoGrupo = document.querySelector('#idAlumnoGrupo');

    datos = new FormData();
    datos.append('beneficio_x_tipo_grupo_id', idbeneficioXtipo.value);
    datos.append('alumno_x_grupo_id', idAlumnoGrupo.value);
    datos.append('descripcion', descripcion.value);
    datos.append('estado', estado.value);
    try {
        //Peticion hacia la api
        const url = 'http://localhost:3000/integrante/setBeneficio';
        const respuesta = await fetch(url, {
            method: 'POST',
            body: datos
        })
        const resultado = await respuesta.json();


        if (resultado.resultado) {

            Swal.fire({
                icon: 'success',
                title: 'MUY BIEN !',
                text: 'Beneficio asignado correctamente!'

            }).then(() => {

                // close.click();
                // document.getElementById("ben").click();
                //  mostrarBeneficios(idAlumnoGrupo.value);
                window.location.reload();
            })


        } else {
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'El Beneficio ya fue asignado!',

            })
        }
    } catch (error) {
        Swal.fire({
            icon: 'error',
            title: 'Error...',
            text: 'Hubo un error al guardar la beneficio!',

        })
    }

}

function toggleB() {
    //const id = document.querySelector('#idBene');

    const botones = document.querySelectorAll('.btn-toggle');
    botones.forEach(boton => {
        boton.onclick = function () {
            actualizarEstadoBeneficio(boton, this.id);
        };

    })
}
async function actualizarEstadoBeneficio(boton, id) {

    //console.log(id);
    //  const boton = document.getElementById('boton-activar' + id);
    // const boton = document.querySelector(`[data-id-ben="${id}"]`);
    datos = new FormData();
    datos.append('id', id);
    try {
        //Peticion hacia la api
        const url = 'http://localhost:3000/integrante/updBeneficioEst';
        const respuesta = await fetch(url, {
            method: 'POST',
            body: datos
        })
        const resultado = await respuesta.json();
        // console.log(resultado);

        if (resultado) {

            if (boton.classList.contains('label')) {
                boton.classList.remove('label')
                boton.classList.add('label-ok');
                boton.textContent = 'COMPLETADO';
                //  console.log(boton.classList);
            } else {
                boton.classList.remove('label-ok');
                boton.classList.add('label');
                boton.textContent = 'PENDIENTE';

            }
            Swal.fire({
                icon: 'success',
                title: 'MUY BIEN !',
                text: 'Estado actualizado correctamente!'

            }).then(() => {


            })


        }
    } catch (error) {
        Swal.fire({
            icon: 'error',
            title: 'Error...',
            text: 'Hubo un error al actualizar el estado !',

        })
    }

}

function modalAsignar(idbeneficio, nombre, modal_asigBen, boton_agregar_usu, close_usu) {

    modal(modal_asigBen, boton_agregar_usu, close_usu);
    $(document).ready(function () {

        $("#idbeneficio").val(idbeneficio);
        $("#nombreBeneficio").text(nombre);


    });

}
//TODO validar eso
async function asignarBeneficioGrupo() {
    var idbeneficio = document.getElementById('idbeneficio').value;
    var idTipoGrupo = document.getElementById('idTipoGrupo').value;
    var estado = document.getElementById('estadoGrupo').value;
    var id = document.getElementById('idBeneTipo').value;
    // var param = { "idbeneficio": idbeneficio, "idTipoGrupo": idTipoGrupo, "estado": estado, "cod": 3 }
    const datos = new FormData();
    datos.append("beneficio_id", idbeneficio);
    datos.append("tipo_grupo_id", idTipoGrupo);
    datos.append("estado", estado);
    datos.append("id", id);

    try {
        //Peticion hacia la api
        const url = 'http://localhost:3000/beneficios/asignar';
        const respuesta = await fetch(url, {
            method: 'POST',
            body: datos
        })
        const resultado = await respuesta.json();

        console.log(resultado);

        if (resultado) {
            Swal.fire({
                icon: 'success',
                title: 'MUY BIEN !',
                text: 'Beneficio Asignado Correctamente',
            }).then(() => {


            })
        } else {
            Swal.fire({
                icon: 'info',
                title: 'Mensaje...',
                text: 'El Beneficio ya esta asignado!',

            })
        }
    } catch (error) {
        Swal.fire({
            icon: 'error',
            title: 'Error...',
            text: 'Hubo un error al guardar la el Beneficio!',

        })
    }




}


function invitarGrupo(idevento, nombre_evento, modal_invi, boton_agregar_usu, close_usu) {

    modal(modal_invi, boton_agregar_usu, close_usu);
    $(document).ready(function () {

        $("#idevento").val(idevento);
        $("#nombreEvento").text(nombre_evento);


    });

}


async function asignarInvitacionGrupo() {
    const idevento = document.getElementById('idevento');
    const idGrupo = document.getElementById('idGrupo');
    const fechaHoraInvitacion = document.getElementById('fechaHoraInvitacion');
    const Observacion = document.getElementById('Observacion');
    const id = document.getElementById('idInvitacion');
    datos = new FormData();
    datos.append('evento_id', idevento.value);
    datos.append('grupo_universitario_id', idGrupo.value);
    datos.append('observacion', Observacion.value);
    datos.append('fecha_hora', fechaHoraInvitacion.value);
    datos.append('id', id.value);
    try {
        //Peticion hacia la api https://organizaciones.jymsystemsoft.com/
        const url = 'http://localhost:3000/eventos/invitar-grupo';
        const respuesta = await fetch(url, {
            method: 'POST',
            body: datos
        })
        const resultado = await respuesta.json();
        console.log(resultado);

        if (resultado.code) {
            Swal.fire({
                icon: 'info',
                title: 'MENSAJE ',
                text: 'La invitacion ya esta asignada',

            })
            return;
        }
        if (resultado.upt) {
            Swal.fire({
                icon: 'success',
                title: 'ACTUALIZADO ',
                text: 'Invitacion actualizada correctamente',

            })
            return;
        }

        if (resultado.upd) {
            Swal.fire({
                icon: 'info',
                title: 'Mensaje...',
                text: 'No puede editar una invitacion con participaciones!',
            })

            return;
        }



        if (resultado.resultado) {

            Swal.fire({
                icon: 'success',
                title: 'MUY BIEN !',
                text: 'Invitacion asignada correctamente!'

            }).then(() => {
                fechaHoraInvitacion.value = '';
                Observacion.value = '';

            })


        } else {
            Swal.fire({
                icon: 'error',
                title: 'ERROR !',
                text: 'La invitación no está en el rango de fechas del evento!',

            })
        }
    } catch (error) {
        Swal.fire({
            icon: 'error',
            title: 'Error...',
            text: 'Hubo un error al guardar la invitacion!',

        })
    }



}


async function crearOrganizador() {
    const nombre = document.getElementById('nombre_org');
    const contacto = document.getElementById('contacto');
    datos = new FormData();
    if (nombre.value === '') {
        Swal.fire({
            icon: 'error',
            title: 'ERROR !',
            text: 'El organizador es obligatorio!',

        })

        return;
    }
    datos.append('nombre', nombre.value);
    datos.append('contacto', contacto.value)
    try {
        //Peticion hacia la api
        const url = 'http://localhost:3000/crear-org';
        const respuesta = await fetch(url, {
            method: 'POST',
            body: datos
        })
        const resultado = await respuesta.json();


        if (resultado.resultado) {

            Swal.fire({
                icon: 'success',
                title: 'MUY BIEN !',
                text: 'Organizador creado correctamente!'

            }).then(() => {
                nombre.value = '';
                contacto.value = '';
                cargarOrg();
            })


        } else {
            Swal.fire({
                icon: 'error',
                title: 'ERROR !',
                text: 'Error al crear un organizador!',

            })
        }
    } catch (error) {
        Swal.fire({
            icon: 'error',
            title: 'Error...',
            text: 'Hubo un error al guardar el organizador!',

        })
    }
}
async function cargarOrg() {
    try {
        const url = 'http://localhost:3000/evento/orgs'
        const resultado = await fetch(url);
        const orgs = await resultado.json();
        mostrarComboOrg(orgs);
    } catch (error) {
        console.log(error);
    }
}

function mostrarComboOrg(orgs) {
    const combo = document.querySelector('#idorganizador');
    const ult = orgs[orgs.length - 1];
    const { id, nombre } = ult;
    const item = document.createElement('OPTION');
    item.value = id;
    item.textContent = nombre;
    combo.appendChild(item);
}
async function crearEvento() {
    const nombre = document.getElementById('nombre_evento');
    const fecha_inicio = document.getElementById('fecha_inicio');
    const fecha_fin = document.getElementById('fecha_fin');
    const organizador_id = document.getElementById('idorganizador');
    const id = document.getElementById('idevento');
    if (nombre.value.trim().length == 0) {
        nombre.value = "";
        nombre.focus();
        Swal.fire({
            icon: 'warning',
            title: 'ADVEVERTENCIA !',
            text: 'El nombre del evento es obligatorio'
        })
        return;
    }
    if (fecha_inicio.value.trim().length == 0) {
        fecha_inicio.value = "";
        fecha_inicio.focus();
        Swal.fire({
            icon: 'warning',
            title: 'ADVEVERTENCIA !',
            text: 'La fecha final es obligatoria es obligatoria'
        })
        return;
    }
    if (fecha_fin.value.trim().length == 0) {
        fecha_fin.value = "";
        fecha_fin.focus();
        Swal.fire({
            icon: 'warning',
            title: 'ADVEVERTENCIA !',
            text: 'La fecha final es obligatoria es obligatoria'
        })
        return;
    }
    datos = new FormData();
    datos.append('nombre', nombre.value);
    datos.append('fecha_inicio', fecha_inicio.value);
    datos.append('fecha_fin', fecha_fin.value);
    datos.append('organizador_id', organizador_id.value)
    datos.append('id', id.value);


    try {
        //Peticion hacia la api
        const url = 'http://localhost:3000/crear-evento';
        const respuesta = await fetch(url, {
            method: 'POST',
            body: datos
        })
        const resultado = await respuesta.json();
        console.log(resultado);

        if (resultado) {

            Swal.fire({
                icon: 'success',
                title: 'MUY BIEN !',
                text: 'Evento registrado correctamente!'

            }).then(() => {
                nombre.value = '';
                fecha_fin.value = '';
                fecha_inicio.value = '';
            })


        } else {
            Swal.fire({
                icon: 'error',
                title: 'ERROR !',
                text: 'Ya existe el nombre del evento!',

            })
        }
    } catch (error) {
        Swal.fire({
            icon: 'error',
            title: 'Error...',
            text: 'Hubo un error al guardar el evento!',

        })
    }

}


function asignarAsistencia(idinvitacion, idAlumnoGrupo, modal_asis, boton_agregar_usu, close_usu) {
    modalS(modal_asis, boton_agregar_usu, close_usu);

    $(document).ready(function () {

        $("#idinvitacion").val(idinvitacion);
        $("#idAlumnoGrupo").val(idAlumnoGrupo);


    });

}


async function confirmarAsistencia() {
    const close = document.getElementById('close-asis');
    const idinvitacion = document.getElementById("idinvitacion");
    const idAlumnoGrupo = document.getElementById("idAlumnoGrupo");
    const tipo = document.getElementById("tipo");

    datos = new FormData();
    datos.append('invitacion_id', idinvitacion.value);
    datos.append('alumno_x_grupo_id', idAlumnoGrupo.value);
    datos.append('tipo', tipo.value);

    try {
        //Peticion hacia la api
        const url = 'http://localhost:3000/integrante/setAsistencia';
        const respuesta = await fetch(url, {
            method: 'POST',
            body: datos
        })
        const resultado = await respuesta.json();
        console.log(resultado);
        if (resultado.resultado) {

            Swal.fire({
                icon: 'success',
                title: 'MUY BIEN !',
                text: 'Asistencia asignada correctamente!'

            }).then(() => {

                // close.click();
                // document.getElementById("participaciones").click();
                // mostrarParticipaciones(idAlumnoGrupo.value);

                window.location.reload();

            })


        } else {
            Swal.fire({
                icon: 'error',
                title: 'Error !',
                text: 'El Alumno ya participo en el evento!',

            })
        }
    } catch (error) {
        Swal.fire({
            icon: 'error',
            title: 'Error...',
            text: 'Hubo un error al guardar la asistencia!',

        })
    }
}
function crearBoton() {
    const boton = document.createElement('BUTTON');
    boton.classList.add('boton-asignar');

    const ic = document.createElement('I');
    ic.classList.add('fas');
    ic.classList.add('fa-minus-circle');

    boton.appendChild(ic);
    boton.textContent = 'Quitar ';
    return boton;

}
function crearBotonEstado(text) {
    const boton = document.createElement('BUTTON');


    //const ic = document.createElement('I');
    if (text === 'COMPLETADO') {
        boton.classList.add('label-ok');
    } else {
        boton.classList.add('label');
    }
    boton.textContent = text;
    //  boton.appendChild(ic);

    return boton;

}
async function mostrarParticipaciones(idAlumnoGrupo) {

    const datos = new FormData();
    datos.append('idAlumnoGrupo', idAlumnoGrupo);
    try {
        //Peticion hacia la api
        const url = 'http://localhost:3000/integrante/getParticipaciones';
        const respuesta = await fetch(url, {
            method: 'POST',
            body: datos
        })
        const ult = await respuesta.json();
        const cuerpo = document.getElementById('cuerpo');
        const fila = document.createElement('TR');
        // const boton = document.getElementById('accion-boton');
        for (let index = 0; index < 3; index++) {
            const col = document.createElement('TD');
            if (index === 2) {
                col.appendChild(crearBoton());
            } else {
                if (index === 1) {
                    col.textContent = ult.tipo;
                } else {
                    col.textContent = ult.nombreEvento;

                }

            }

            fila.appendChild(col);

        }
        cuerpo.appendChild(fila);


    } catch (error) {
        Swal.fire({
            icon: 'error',
            title: 'Error...',
            text: 'Hubo un error al guardar el tipo!',

        })
    }

}

async function quitarParticipacion(id, idAlumno) {
    const datos = new FormData();
    datos.append('id', id);
    try {
        //Peticion hacia la api
        const url = 'http://localhost:3000/integrante/deleteAsistencia';
        const respuesta = await fetch(url, {
            method: 'POST',
            body: datos
        })
        const resultado = await respuesta.json();

        if (resultado) {
            Swal.fire({
                icon: 'success',
                title: 'Eliminado',
                text: 'La participacion fue Eliminada correctamente!',
            }).then(() => {
                window.location.reload();

            })
        }
    } catch (error) {
        Swal.fire({
            icon: 'error',
            title: 'Error...',
            text: 'Hubo un error al eliminar!',

        })
    }
}

async function mostrarBeneficios(idAlumnoGrupo) {

    const datos = new FormData();
    datos.append('idAlumnoGrupo', idAlumnoGrupo);
    try {
        //Peticion hacia la api
        const url = 'http://localhost:3000/integrante/getBeneficio';
        const respuesta = await fetch(url, {
            method: 'POST',
            body: datos
        })
        const ult = await respuesta.json();

        const cuerpo = document.getElementById('cuerpo-asig');
        const fila = document.createElement('TR');
        // const boton = document.getElementById('accion-boton');
        for (let index = 0; index < 4; index++) {
            const col = document.createElement('TD');
            if (index === 3) {
                col.appendChild(crearBotonEstado(ult.estado));
            } else {
                if (index === 2) {
                    col.textContent = ult.fecha_efectiva;
                } else {
                    if (index === 0) {
                        col.textContent = ult.nombreBeneficio;
                    } else {
                        col.textContent = ult.descripcion;
                    }

                }
            }

            fila.appendChild(col);

        }
        cuerpo.appendChild(fila);


    } catch (error) {
        Swal.fire({
            icon: 'error',
            title: 'Error...',
            text: 'Hubo un error al guardar el tipo!',

        })
    }

}
function openPage(pageName, elmnt, color, clase) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName(clase);
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablink");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].style.backgroundColor = "";
    }
    document.getElementById(pageName).style.display = "block";
    elmnt.style.backgroundColor = color;
}

function botonGrupo() {
    const crearTipo = document.querySelector('#crearTipo');
    if (crearTipo) {
        crearTipo.onclick = crearTipof;
    }

}

async function crearTipof() {
    const nombre_tipo = document.querySelector('#nombre_tipo');
    const id = document.querySelector('#idTipoGrupo');
    if (nombre_tipo.value.trim().length == 0) {
        nombre_tipo.value = "";
        nombre_tipo.focus();
        Swal.fire({
            icon: 'warning',
            title: 'ADVEVERTENCIA !',
            text: 'El nombre es obligatorio',
        })
        return;
    }


    const datos = new FormData();
    datos.append('nombre', nombre_tipo.value);
    datos.append('id', id.value);

    try {
        //Peticion hacia la api https://organizaciones.jymsystemsoft.com
        const url = 'http://localhost:3000/api/tipos';
        const respuesta = await fetch(url, {
            method: 'POST',
            body: datos
        })
        const resultado = await respuesta.json();

        if (resultado) {
            Swal.fire({
                icon: 'success',
                title: 'Tipo Creado',
                text: 'El tipo fue registrado correctamente!',
            }).then(() => {
                nombre_tipo.value = '';
                id.value = '';
                cargarTipos();
            })
        } else {
            Swal.fire({
                icon: 'error',
                title: 'Error...',
                text: 'Ya existe el nombre del el tipo!',

            })
        }
    } catch (error) {
        Swal.fire({
            icon: 'error',
            title: 'Error...',
            text: 'Hubo un error al guardar el tipo!',

        })
    }

}


async function cargarTipos() {
    try {
        const url = 'http://localhost:3000/api/tipos'
        const resultado = await fetch(url);
        const tipos = await resultado.json();
        mostrarComboTipos(tipos);
    } catch (error) {
        console.log(error);
    }
}

function mostrarComboTipos(tipos) {
    const combo = document.querySelector('#tipo_grupo_id');
    const ult = tipos[tipos.length - 1];
    const { id, nombre } = ult;
    const item = document.createElement('OPTION');
    item.value = id;
    item.textContent = nombre;
    combo.appendChild(item);
}

// function botonIntegrante() {
//     const boton = document.querySelector('#actualizarIntegrante');
//     boton.onclick = getIntegrante;
// }


async function getIntegrante(id) {

    const datos = new FormData();
    datos.append('id', id);
    try {
        //Peticion hacia la api 
        const url = 'http://localhost:3000/api/getIntegrante';
        const respuesta = await fetch(url, {
            method: 'POST',
            body: datos
        })
        const resultado = await respuesta.json();
        
        modal('modal-integrante', 'btn', 'close-integrante');
        //console.log('fewfwefew');
        //console.log(resultado);
        //return;
        $(document).ready(function () {
            //console.log(resultado['idCondicionEconomica']);
            
            $('#dni').val(resultado['dni']);
            $('#nombre').val(resultado['nombre'] + ' ' + resultado['apellido']);
            $('#apellido').val(resultado['apellido']);
            $('#direccion').val(resultado['direccion']);
            $('#email').val(resultado['email']);
            $('#telefono').val(resultado['telefono']);
            $('#codigo_alumno').val(resultado['codigo']);
            $('#idEscuela').val(resultado['idEscuela']);
            $('#nombre_procedencia').val(resultado['nombre_procedencia']);
            $('#estado').val(resultado['estado']);
            $('#idCondicionEconomica').val(resultado['idCondicionEconomica']);
            $('#descripcion').val(resultado['descripcion']);
            $('#idPersona').val(resultado['idPersona']);

            $('#cod').val(2);
            var recepcionaDatos = resultado['genero'];
            if (recepcionaDatos === 'Masculino') {
                $("#genero option[value='Masculino'").attr("selected", true);
            } else {
                $("#genero option[value='Femenino'").attr("selected", true);
            }

            if (resultado['estado'] === 'activo') {
                $("#estado option[value='activo'").attr("selected", true);
            } else {
                $("#estado option[value='inactivo'").attr("selected", true);
            }

            $('#cont_buscar').hide();
            $('#titulo_integrante').text('Editar Integrante');

        });


    } catch (error) {
        Swal.fire({
            icon: 'error',
            title: 'Error...',
            text: 'Hubo un error !',

        })
    }
}
//no usado
async function setIntegrante() {
    const nombre_tipo = document.querySelector('#nombre_tipo').value;
    const datos = new FormData();
    datos.append('nombre', nombre_tipo);
    try {
        //Peticion hacia la api
        const url = 'http://localhost:3000/api/tipos';
        const respuesta = await fetch(url, {
            method: 'POST',
            body: datos
        })
        const resultado = await respuesta.json();

        if (resultado.resultado) {
            Swal.fire({
                icon: 'success',
                title: 'Tipo Creado',
                text: 'El tipo fue creado correctamente!',
            }).then(() => {
                cargarTipos();


            })
        }
    } catch (error) {
        Swal.fire({
            icon: 'error',
            title: 'Error...',
            text: 'Hubo un error al guardar la cita!',

        })
    }
}
async function buscarAlumno(dni) {
    //validar DNI
    if (dni.length >= 9 || dni.length === 0) {
        Swal.fire({
            icon: 'error',
            title: 'Error...',
            text: 'El DNI Debe Tener 8 Dígitos',
        })
        return;
    }

    const datos = new FormData();
    datos.append('dni', dni);
    try {
        //Peticion hacia la api
        const url = 'http://localhost:3000/api/alumno';
        const respuesta = await fetch(url, {
            method: 'POST',
            body: datos
        })


        const resultado = await respuesta.json();

        if (resultado) {
            $(document).ready(function () {

                $('#dni').val(resultado['dni']);
                $('#nombre').val(resultado['nombre'] + ' ' + resultado['apellido']);
                $('#idCondicionEconomica').val(resultado['idCondicionEconomica']);
                $('#descripcion').val(resultado['descripcion']);
                $('#estado').val(resultado['estado']);
                $('#buscar').val('');
            });
        } else {
            Swal.fire({
                icon: 'info',
                title: 'Aviso!',
                text: 'No Existe El Alumno !',
            })

        }
    } catch (error) {
        Swal.fire({
            icon: 'error',
            title: 'Error...',
            text: 'Hubo un error !',

        })
    }
}

function jsBuscar(){
    buscar=$("#dni_s").prop("value")
    encontradoResultado=false;
    //realizamos el recorrido solo por las celdas que contienen el código, que es la primera
    $("#mytable tr").find('td:eq(0)').each(function () {
   
          codigo = $(this).html();
           if(codigo==buscar){
                trDelResultado=$(this).parent();
                nombre=trDelResultado.find("td:eq(1)").html();
                encontradoResultado= true;
           }
           
    })
    return encontradoResultado;
    //si no se encontro resultado mostramos que no existe.
    /*if(encontradoResultado){
        Swal.fire({
            icon: 'warning',
            title: 'AVISO ...!',
            text: 'El alumno ya está en el grupo'
        });
           return ;
    }*/
}
       // Fin

// No usado
async function buscarAlumno2(dni,idGrupo) {
    

    const datos = new FormData();
    datos.append('dni', dni);
    datos.append('idGrupo', idGrupo);
    try {
        //Peticion hacia la api
        const url = 'http://localhost:3000/integrante/getAlumnoGrupo';
        const respuesta = await fetch(url, {
            method: 'POST',
            body: datos
        })


        const resultado = await respuesta.json();
        console.log(resultado['valor']);
        return;
        if (resultado != 0) { // No existe
            Swal.fire({
                icon: 'info',
                title: 'Aviso!',
                text: 'EL DNI YA EXISTE',
            });
            
            
        }
    } catch (error) {
        Swal.fire({
            icon: 'error',
            title: 'Error...',
            text: 'Hubo un error !',

        })
    }
}

async function crearBeneficio() {

    const numero = document.querySelector('#numero');
    const fecha_emision = document.querySelector('#fecha_emision');
    // const estado = document.querySelector('#estado');
    const nombre = document.querySelector('#nombre');
    const idbeneficio = document.querySelector('#idBeneficio');
    const idres = document.querySelector('#idresolucion_x_beneficio');
    const cod = document.querySelector('#cod');
    const doc = document.querySelector('#doc');



    if (nombre.value.trim().length === 0) {
        Swal.fire({
            icon: 'error',
            title: 'Error !',
            text: 'El nombre es obligatorio',
        })

        return;
    }

    const datos = new FormData();
    datos.append("resolucion_x_beneficio[numero_resolucion]", numero.value);
    datos.append("resolucion_x_beneficio[fecha_emision]", fecha_emision.value);
    // datos.append("resolucion_x_beneficio[estado]", estado.value);
    datos.append("resolucion_x_beneficio[id]", idres.value)
    datos.append("beneficio[nombre]", nombre.value);
    datos.append("beneficio[id]", idbeneficio.value);
    datos.append("doc", doc.files[0]);
    datos.append("cod", cod.value);

    try {
        //Peticion hacia la api
        const url = 'http://localhost:3000/beneficios/crear';
        const respuesta = await fetch(url, {
            method: 'POST',
            body: datos
        })
        const resultado = await respuesta.json();
        console.log(resultado);


        if (resultado) {
            if (cod.value == 1) {
                Swal.fire({
                    icon: 'success',
                    title: 'MUY BIEN !',
                    text: 'Beneficio Creado Correctamente',
                }).then(() => {
                    numero.value = '';
                    fecha_emision.value = '';
                    estado.value = '';
                    nombre.value = '';

                })
            } else {
                Swal.fire({
                    icon: 'success',
                    title: 'MUY BIEN !',
                    text: 'Beneficio Actualizado Correctamente',
                }).then(() => {
                    numero.value = '';
                    fecha_emision.value = '';
                    estado.value = '';
                    nombre.value = '';


                })
            }
        } else {
            Swal.fire({
                icon: 'error',
                title: 'Error...',
                text: 'El nombre del Beneficio ya existe!',

            })
        }
    } catch (error) {
        Swal.fire({
            icon: 'error',
            title: 'Error...',
            text: 'Hubo un error al guardar el Beneficio!',

        })
    }
}



async function guardarIntegrante() {

    const dni = document.querySelector('#dni');
    const nombre = document.querySelector('#nombre');
    const idCondicionEconomica = document.querySelector('#idCondicionEconomica');
    const descripcion = document.querySelector('#descripcion');
    const estado = document.querySelector('#estado');
    const cod = document.querySelector('#cod');
    const idgrupo = document.querySelector('#idgrupo');

    const datos = new FormData();
    datos.append('dni', dni.value);
    datos.append('idCondicionEconomica', idCondicionEconomica.value);
    datos.append('descripcion', descripcion.value);
    datos.append('estado', estado.value);
    datos.append('idgrupo', idgrupo.value);
    datos.append('cod', cod.value);

    try {
        //Peticion hacia la api
        const url = 'http://localhost:3000/api/crearAlumno';
        const respuesta = await fetch(url, {
            method: 'POST',
            body: datos
        })
        const resultado = await respuesta.json();
        console.log(resultado);

        if (resultado) {
            if (cod.value == 1) {
                Swal.fire({
                    icon: 'success',
                    title: 'MUY BIEN !',
                    text: 'Integrante Asignado Correctamente',
                }).then(() => {


                })
            } else {
                Swal.fire({
                    icon: 'success',
                    title: 'MUY BIEN !',
                    text: 'Integrante Actualizado Correctamente',
                }).then(() => {
                    numero.value = '';
                    fecha_emision.value = '';
                    estado.value = '';
                    nombre.value = '';


                })
            }
        } else {
            Swal.fire({
                icon: 'info',
                title: 'AVISO!',
                text: 'EL Alumno Ya Pertenece al Grupo !',
            })
        }
    } catch (error) {
        Swal.fire({
            icon: 'error',
            title: 'Error...',
            text: 'Hubo un error al guardar el integrante!',

        })
    }

}

async function actualizarRol(id) {
    modal('modal-agregar-rol', 'boton-agregar-beneficio', 'close-rol');

    const datos = new FormData();
    datos.append('id', id);

    try {

        //Peticion hacia la api
        const url = 'http://localhost:3000/get-rol';
        const respuesta = await fetch(url, {
            method: 'POST',
            body: datos
        })
        const resultado = await respuesta.json();
        const perm = resultado.permisos;
        console.log(perm);
        const checks = document.querySelectorAll('.chek');
        perm.forEach(element => {
            checks.forEach(el => {
                if (element.opciones_id == el.value) {
                    el.checked = true;
                }
            });

        });
        //console.log(resultado['estado']);
        $(document).ready(function () {


            $('#nombre').val(resultado['nombre']);
            $('#idRol').val(resultado['id']);
            $('#cod').val(2);

        });


    } catch (error) {
        Swal.fire({
            icon: 'error',
            title: 'Error...',
            text: 'Hubo un error !',

        })
    }



}

async function crearRol() {


    const nombre = document.getElementById('nombre');
    const cod = document.getElementById('cod');
    const id = document.getElementById('idRol');
    let valoresCheck = [];

    $("input[type=checkbox]:checked").each(function () {
        valoresCheck.push(this.value);
    });

    if (nombre.value.trim().length == 0) {
        nombre.value = "";
        nombre.focus();
        Swal.fire({
            icon: 'warning',
            title: 'ADVEVERTENCIA !',
            text: 'El nombre es obligatorio',
        })
        return;
    }
    datos = new FormData();
    datos.append('nombre', nombre.value);
    datos.append('cod', cod.value);
    datos.append('id', id.value);
    datos.append('ids', valoresCheck);

    try {
        //Peticion hacia la api
        const url = 'http://localhost:3000/crear-rol';
        const respuesta = await fetch(url, {
            method: 'POST',
            body: datos
        })

        const resultado = await respuesta.json();
        console.log(resultado);

        if (resultado.resultado) {

            Swal.fire({
                icon: 'success',
                title: 'MUY BIEN !',
                text: 'Rol Creado Correctamente',
            })

        } else {
            Swal.fire({
                icon: 'error',
                title: 'Error...',
                text: 'Ya existe el nombre del Rol!',

            })
        }
    } catch (error) {
        Swal.fire({
            icon: 'error',
            title: 'Error...',
            text: 'Hubo un error al guardar el Rol!',

        })
    }



}


async function crearUser() {

    const dni = document.getElementById('dni');
    const nombre = document.getElementById('nombre');
    const apellido = document.getElementById('apellido');
    const genero = document.getElementById('genero');
    const direccion = document.getElementById('direccion');
    const email = document.getElementById('email');
    const telefono = document.getElementById('telefono');
    const usuario = document.getElementById('usuario');
    //const pass = document.getElementById('password');
    const estado = document.getElementById('estado');
    const rol = document.getElementById('rol');
    const idUsuario = document.getElementById('idusu');
    const cod = document.getElementById('cod');

    if (dni.value.trim().length == 0) {
        dni.value = "";
        dni.focus();
        Swal.fire({
            icon: 'warning',
            title: 'ADVERTENCIA !',
            text: 'El DNI es obligatorio'
        })
        return;
    }

    if (nombre.value.trim().length == 0) {
        nombre.value = "";
        nombre.focus();
        Swal.fire({
            icon: 'warning',
            title: 'ADVERTENCIA !',
            text: 'El nombre del usuario es obligatorio'
        })
        return;
    }

    if (apellido.value.trim().length == 0) {
        apellido.value = "";
        apellido.focus();
        Swal.fire({
            icon: 'warning',
            title: 'ADVERTENCIA !',
            text: 'El apellido del usuario es obligatorio'
        })
        return;
    }

    if (genero.value.trim().length == 0) {
        //apellido.value="";
        //apellido.focus();
        Swal.fire({
            icon: 'warning',
            title: 'ADVERTENCIA !',
            text: 'Seleccione el genero del usuario'
        })
        return;
    }

    if (direccion.value.trim().length == 0) {
        direccion.value = "";
        direccion.focus();
        Swal.fire({
            icon: 'warning',
            title: 'ADVERTENCIA !',
            text: 'La dirección del usuario es obligatorio'
        })
        return;
    }

    if (email.value.trim().length == 0) {
        email.value = "";
        email.focus();
        Swal.fire({
            icon: 'warning',
            title: 'ADVERTENCIA !',
            text: 'El email del usuario es obligatorio'
        })
        return;
    }

    if (telefono.value.trim().length == 0) {
        telefono.value = "";
        telefono.focus();
        Swal.fire({
            icon: 'warning',
            title: 'ADVERTENCIA !',
            text: 'El teléfono del usuario es obligatorio'
        })
        return;
    }
    if (usuario.value.trim().length == 0) {
        usuario.value = "";
        usuario.focus();
        Swal.fire({
            icon: 'warning',
            title: 'ADVERTENCIA !',
            text: 'El nombre de usuario es obligatorio'
        })
        return;
    }

    if (estado.value.trim().length == 0) {
        //estado.value="";
        //estado.focus();
        Swal.fire({
            icon: 'warning',
            title: 'ADVERTENCIA !',
            text: 'El estado del usuario es obligatorio'
        })
        return;
    }
    if (rol.value.trim().length == 0) {
        //rol.value="";
        //rol.focus();
        Swal.fire({
            icon: 'warning',
            title: 'ADVERTENCIA !',
            text: 'El rol del usuario es obligatorio'
        })
        return;
    }


    datos = new FormData();
    datos.append('dni', dni.value);
    datos.append('nombre', nombre.value);
    datos.append('apellido', apellido.value);
    datos.append('genero', genero.value);
    datos.append('direccion', direccion.value);
    datos.append('usuario', usuario.value);
    //datos.append('pass', pass.value);
    datos.append('idTipoUsu', rol.value);
    datos.append('estado', estado.value);
    datos.append('email', email.value);
    datos.append('telefono', telefono.value);
    datos.append('idUsuario', idUsuario.value);
    datos.append('cod', cod.value);

    //console.log(datos);

    try {
        //Peticion hacia la api
        const url = 'http://localhost:3000/crear-user';
        const respuesta = await fetch(url, {
            method: 'POST',
            body: datos
        })
        const resultado = await respuesta.json();
        console.log(resultado);


        if (resultado == 1) {
            document.getElementById("form-user").reset();
            Swal.fire({
                icon: 'success',
                title: 'MUY BIEN !',
                text: 'Usuario creado correctamente!'

            }).then(() => {
                //limpiar campos


            })


        } else {
            if (resultado == 2) {
                Swal.fire({
                    icon: 'success',
                    title: 'MUY BIEN !',
                    text: 'Usuario actualizado correctamente!'

                }).then(() => {
                    //limpiar campos


                })
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'ERROR !',
                    text: 'El usuario ya existe!',
                })
            }

        }
    } catch (error) {
        Swal.fire({
            icon: 'error',
            title: 'Error...',
            text: 'Hubo un error al guardar el organizador!',

        })
    }



}

async function crearSemestre() {
    const nombre = document.querySelector('#nombre');
    const fecha_inicio = document.querySelector('#fecha_inicio');
    const fecha_final = document.querySelector('#fecha_final');
    const estado = document.querySelector('#estado');
    const id = document.querySelector('#idSemestre');

    if (nombre.value.trim().length == 0) {
        nombre.value = "";
        nombre.focus();
        Swal.fire({
            icon: 'warning',
            title: 'ADVERTENCIA !',
            text: 'El nombre del semestre es obligatorio'
        })
        return;
    }

    if (fecha_inicio.value.trim().length == 0) {
        fecha_inicio.value = "";
        fecha_inicio.focus();
        Swal.fire({
            icon: 'warning',
            title: 'ADVERTENCIA !',
            text: 'La fecha de inicio es obligatorio'
        })
        return;
    }

    if (fecha_final.value.trim().length == 0) {
        fecha_final.value = "";
        fecha_final.focus();
        Swal.fire({
            icon: 'warning',
            title: 'ADVERTENCIA !',
            text: 'La fecha final es obligatorio'
        })
        return;
    }

    if (estado.value.trim().length == 0) {
        estado.value = "";
        estado.focus();
        Swal.fire({
            icon: 'warning',
            title: 'ADVERTENCIA !',
            text: 'Seleccione el estado'
        })
        return;
    }

    const datos = new FormData();
    datos.append('nombre', nombre.value);
    datos.append('fecha_inicio', fecha_inicio.value);
    datos.append('fecha_fin', fecha_final.value);
    datos.append('estado', estado.value);
    datos.append('id', id.value);
    try {
        //Peticion hacia la api
        const url = 'http://localhost:3000/semestres';
        const respuesta = await fetch(url, {
            method: 'POST',
            body: datos
        })
        const resultado = await respuesta.json();
        console.log(resultado);

        if (resultado) {
            Swal.fire({
                icon: 'success',
                title: 'MUY BIEN ',
                text: 'El semestre fue registrado correctamente!',
            }).then(() => {
                $('#nombre').val('');
                $('#fecha_inicio').val('');
                $('#fecha_final').val('');
                $('#idSemestre').val('');


            })
        } else {
            Swal.fire({
                icon: 'error',
                title: 'ERORR ',
                text: 'Ya existe el nombre del semestre !',
            })
        }
    } catch (error) {
        Swal.fire({
            icon: 'error',
            title: 'Error...',
            text: 'Hubo un error al guardar el semestre!',

        })
    }

}


async function crearItemDesercion() {

    const nombre = document.querySelector('#nombre');
    const id = document.querySelector('#idDesercion');

    if (nombre.value.trim().length == 0) {
        nombre.value = "";
        nombre.focus();
        Swal.fire({
            icon: 'warning',
            title: 'ADVERTENCIA !',
            text: 'El nombre del semestre es obligatorio'
        })
        return;
    }



    const datos = new FormData();
    datos.append('descripcion', nombre.value);
    datos.append('id', id.value);
    try {
        //Peticion hacia la api
        const url = 'http://localhost:3000/desercion';
        const respuesta = await fetch(url, {
            method: 'POST',
            body: datos
        })
        const resultado = await respuesta.json();
        console.log(resultado);
        alert(resultado);
        if (resultado) {
            Swal.fire({
                icon: 'success',
                title: 'MUY BIEN ',
                text: 'El indicador fue registrado correctamente!',
            }).then(() => {
                $('#nombre').val('');
                $('#idDesercion').val('');


            })
        } else {
            Swal.fire({
                icon: 'error',
                title: 'ERORR! ',
                text: 'Ya existe el nombre del indicador !',
            })
        }
    } catch (error) {
        Swal.fire({
            icon: 'error',
            title: 'Error...',
            text: 'Hubo un error al guardar el indicador!',

        })
    }

}

function actualizarDesercionA(id, nombre) {
    modal('modal-agregar-desercion', 'boton', 'close');
    $('#TituloCabeceraModal').text('Editar Deserción');
    $('#nombre').val(nombre);
    $('#idDesercion').val(id);
}

async function eliminarDesercion(id) {
    const datos = new FormData();
    datos.append('id', id);
    console.log(id);
    try {
        //Peticion hacia la api
        const url = 'http://localhost:3000/desercion-eliminar';
        const respuesta = await fetch(url, {
            method: 'POST',
            body: datos
        })
        const resultado = await respuesta.json();

        if (resultado) {
            Swal.fire({
                icon: 'success',
                title: 'MUY BIEN ! :)',
                text: 'Se Eliminó la deserción!',

            }).then(() => {
                window.location.reload();
            })


        }

    } catch (error) {
        Swal.fire({
            icon: 'error',
            title: 'ERROR :(',
            text: 'Hubo un error al eliminar la deserción!',

        })
    }

}

// No usado
async function actualizarDesercion(id) {

    modal('modal-agregar-desercion', 'boton-agregar-beneficio', 'close');

    const datos = new FormData();
    datos.append('id', id);

    try {

        //Peticion hacia la api http://localhost:3000/
        const url = 'http://localhost:3000/beneficios/desercion-actualizar';
        const respuesta = await fetch(url, {
            method: 'POST',
            body: datos
        })
        const resultado = await respuesta.json();


        //console.log(resultado['estado']);
        $(document).ready(function () {
            alert(resultado);
            return;
            $('#numero').val(resultado['numero_resolucion']);
            $('#nombre').val(resultado['nombre']);
            $('#fecha_emision').val(resultado['fecha_emision']);
            $('#estado').val(resultado['estado']);
            $('#idresolucion_x_beneficio').val(resultado['idres']);

            $('#idBeneficio').val(resultado['id']);
            $('#cod').val(2);



            if (resultado['estado'] === 'activo') {
                $("#estado option[value='activo'").attr("selected", true);
            } else {
                $("#estado option[value='inactivo'").attr("selected", true);
            }


        });


    } catch (error) {
        Swal.fire({
            icon: 'error',
            title: 'Error...',
            text: 'Hubo un error !',

        })
    }

}





//sin api
async function crearIntegrante() {
    const dni = document.querySelector('#dni_s');
    const nombre = document.querySelector('#nombre_s');
    const apellido = document.querySelector('#apellido_s');//
    const genero = document.querySelector('#genero_s');//
    const direccion = document.querySelector('#direccion_s');//
    const email = document.querySelector('#email_s');//
    const telefono = document.querySelector('#telefono_s');//
    const codigo = document.querySelector('#codigo_alumno_s');//
    const escuela = document.querySelector('#idEscuela_s');// nombre_procedencia
    const procedencia = document.querySelector('#nombre_procedencia_s');//
    const idCondicionEconomica = document.querySelector('#idCondicionEconomica_s');
    const descripcion = document.querySelector('#descripcion_s');
    const estado = document.querySelector('#estado_s');
    const condicionSocioeconomica = document.querySelector('#idCondicionEconomica_s'); //
    //const cod = document.querySelector('#cod_s');
    const idgrupo = document.querySelector('#idgrupo');
    const idPersona = document.querySelector('#idPersona_s');// idPersona

    const datos = new FormData();
    datos.append('dni', dni.value);
    datos.append('nombre', nombre.value);//
    datos.append('apellido', apellido.value);//
    datos.append('genero', genero.value);//
    datos.append('direccion', direccion.value);//
    datos.append('email', email.value);//
    datos.append('telefono', telefono.value);//
    datos.append('codigo', codigo.value);//
    datos.append('idEscuela', escuela.value);//
    datos.append('nombre_procedencia', procedencia.value);//
    datos.append('idCondicionEconomica', idCondicionEconomica.value);
    datos.append('condicionSocioeconomica', condicionSocioeconomica.value);//
    datos.append('descripcion', descripcion.value);
    datos.append('estado', estado.value);
    datos.append('idgrupo_universitario', idgrupo.value);
    //datos.append('cod', cod.value); //
    datos.append('idPersona', idPersona.value);

    try {
        //Peticion hacia la api
        const url = 'http://localhost:3000/integrante/crearIntegrante';
        const respuesta = await fetch(url, {
            method: 'POST',
            body: datos
        })
        const resultado = await respuesta.json();
        if (resultado) {
            Swal.fire({
                icon: 'success',
                title: 'MUY BIEN !',
                text: 'Integrante Asignado Correctamente',
            });
        }
    } catch (error) {

        Swal.fire({
            icon: 'error',
            title: 'ERROR...',
            text: 'Ocurrió un error!',
        })
    }

}

function buscarEv() {

    $(document).ready(function () {
        $(".busqueda-ev").keyup(function () {
            _this = this;
            // Show only matching TR, hide rest of them
            $.each($("#mytable-ev tbody tr"), function () {
                if ($(this).text().toLowerCase().indexOf($(_this).val().toLowerCase()) === -1)
                    $(this).hide();
                else
                    $(this).show();
            });
        });
    });
}



function actualizarBenTipo(tipoGrupo, beneficio, estado, id) {

    modal('modal-asignar-editar', 'boton-actualizar-tipo', 'asig-edit');
    $("#idbeneficio").val(beneficio);
    $("#idTipoGrupo").val(tipoGrupo);
    $("#estado").val(estado);
    $("#idBeneTipo").val(id);

}


async function borrar(id) {
    Swal.fire({
        title: 'Esta seguro de eliminar?',
        text: "No podra revertir los cambios!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, Borrar!'
    }).then((result) => {
        if (result.isConfirmed) {
            eliminarBeneficioTipo(id);
        }
    })
}

async function eliminarBeneficioTipo(id) {
    const datos = new FormData();
    datos.append('id', id);
    console.log(id);
    try {
        //Peticion hacia la api
        const url = 'http://localhost:3000/tipoBeneficios/eliminar';
        const respuesta = await fetch(url, {
            method: 'POST',
            body: datos
        })
        const resultado = await respuesta.json();

        if (resultado) {
            Swal.fire({
                icon: 'success',
                title: 'Muy bien...',
                text: 'Se Eliminó !',

            }).then(() => {
                window.location.reload();
            })


        } else {
            Swal.fire({
                icon: 'info',
                title: 'Mensaje...',
                text: 'El beneficio ya fue asignado y no puede eliminarse!',

            })
        }

    } catch (error) {
        Swal.fire({
            icon: 'error',
            title: 'Error...',
            text: 'Hubo un error al eliminar la el Beneficio!',

        })
    }

}



function actualizarInvitacion(fecha, idGrupo, obser, idevento, id) {

    modal('modal_invitar', 'boton-actualizar-tipo', 'inv');
    $('#titulo_integrante').text('Editar invitacion');
    $("#fechaHoraInvitacion").val(fecha);
    $("#Observacion").val(obser);
    $("#idGrupo").val(idGrupo);
    $("#idInvitacion").val(id);
    $("#idevento").val(idevento);

}




async function borrarInv(id) {
    Swal.fire({
        title: 'Esta seguro de eliminar?',
        text: "No podra revertir los cambios!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, Borrar!'
    }).then((result) => {
        if (result.isConfirmed) {
            eliminarInvitacion(id);
        }
    })
}

async function eliminarInvitacion(id) {
    const datos = new FormData();
    datos.append('id', id);

    try {
        //Peticion hacia la api
        const url = 'http://localhost:3000/invitacion-eliminar';
        const respuesta = await fetch(url, {
            method: 'POST',
            body: datos
        })
        const resultado = await respuesta.json();

        if (resultado) {
            Swal.fire({
                icon: 'success',
                title: 'Muy bien...',
                text: 'Se Eliminó !',

            }).then(() => {
                window.location.reload();
            })


        } else {
            Swal.fire({
                icon: 'info',
                title: 'Mensaje...',
                text: 'La invitacion ya fue asignada y no puede eliminarse!',

            })
        }

    } catch (error) {
        Swal.fire({
            icon: 'error',
            title: 'Error...',
            text: 'Hubo un error al eliminar la la invitacion!',

        })
    }

}


async function agregarRend() {
    const semestre = document.getElementById('semestre');
    const estado = document.getElementById('estado');
    const alumno = document.getElementById('idAlumno');
    const id = document.getElementById('idRendimiento');
    const datos = new FormData();
    datos.append('id', id.value);
    datos.append('semestre_id', semestre.value);
    datos.append('alumno_id', alumno.value);
    datos.append('estado', estado.value);

    try {
        //Peticion hacia la api
        const url = 'http://localhost:3000/rendimiento';
        const respuesta = await fetch(url, {
            method: 'POST',
            body: datos
        })
        const resultado = await respuesta.json();
        console.log(resultado);
        if (resultado.existe) {
            Swal.fire({
                icon: 'info',
                title: 'Mensaje...',
                text: 'EL Semestre ya tiene un estado!',

            })
            return;
        }
        if (resultado) {
            Swal.fire({
                icon: 'success',
                title: 'Muy bien !',
                text: 'Registrado Correctamente  !',

            })


        } else {
            Swal.fire({
                icon: 'error',
                title: 'Error...',
                text: 'No se pudo crear!',

            })
        }

    } catch (error) {
        Swal.fire({
            icon: 'error',
            title: 'Error...',
            text: 'Hubo un error al crear!',

        })
    }
}

function actualizarRend(semes, estado, id) {

    modal('modal_rend', 'boton-agregar-integrante', 'close-rend')
    $('#semestre').val(semes);
    $("#estado").val(estado);
    // $("#Observacion").val(obser);
    $("#idRendimiento").val(id);
    // $("#idInvitacion").val(id);
    // $("#idevento").val(idevento);

}

async function eliminarRend(id) {
    datos = new FormData();
    datos.append('id', id);

    try {
        //Peticion hacia la api
        const url = 'http://localhost:3000/rendimiento/eliminar';
        const respuesta = await fetch(url, {
            method: 'POST',
            body: datos
        })
        const resultado = await respuesta.json();
        console.log(resultado);


        if (resultado) {
            Swal.fire({
                icon: 'success',
                title: 'Muy bien...',
                text: 'Se Eliminó !',

            }).then(() => {
                window.location.reload();
            })


        } else {
            Swal.fire({
                icon: 'error',
                title: 'Error...',
                text: 'No se pudo eliminar!',

            })
        }

    } catch (error) {
        Swal.fire({
            icon: 'error',
            title: 'Error...',
            text: 'Hubo un error al eliminar!',

        })
    }
}
/*************Inicio*********/
async function borrarBen(id) {
    Swal.fire({
        title: 'Esta seguro de eliminar?',
        text: "No podra revertir los cambios!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, Borrar!'
    }).then((result) => {
        if (result.isConfirmed) {
            eliminarBeneficio(id);
        }
    })
}

async function eliminarBeneficio(id) {
    const datos = new FormData();
    datos.append('id', id);

    try {
        //Peticion hacia la api
        const url = 'http://localhost:3000/beneficios-eliminar';
        const respuesta = await fetch(url, {
            method: 'POST',
            body: datos
        })
        const resultado = await respuesta.json();

        if (resultado) {
            Swal.fire({
                icon: 'success',
                title: 'Muy bien...',
                text: 'Se Eliminó !',

            }).then(() => {
                window.location.reload();
            })


        } else {
            Swal.fire({
                icon: 'info',
                title: 'Mensaje...',
                text: 'El beneficio ya fue asignada y no puede eliminarse!',

            })
        }

    } catch (error) {
        Swal.fire({
            icon: 'error',
            title: 'Error...',
            text: 'Hubo un error al eliminar la la invitacion!',

        })
    }

}
/************FIN**************/

//DELETE's
const preguntar = function (callback, id) {
    Swal.fire({
        title: 'Esta seguro de eliminar?',
        text: "No podra revertir los cambios!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, Borrar!'
    }).then((result) => {
        if (result.isConfirmed) {
            callback(id);
        }
    })
}

async function borrarIntegrante(id) {
    datos = new FormData();
    datos.append('id', id);

    try {
        //Peticion hacia la api
        const url = 'http://localhost:3000/integrante-eliminar';
        const respuesta = await fetch(url, {
            method: 'POST',
            body: datos
        })
        const resultado = await respuesta.json();


        if (resultado) {
            Swal.fire({
                icon: 'success',
                title: 'Muy bien...',
                text: 'Se Eliminó !',

            }).then(() => {
                window.location.reload();
            })


        } else {
            Swal.fire({
                icon: 'info',
                title: 'Mensaje !',
                text: 'El estudiante tiene participaciones o beneficios asignados, no puede eliminarse',

            })
        }

    } catch (error) {
        Swal.fire({
            icon: 'error',
            title: 'Error...',
            text: 'Hubo un error al eliminar!',

        })
    }
}


async function borrarEvento(id) {
    datos = new FormData();
    datos.append('id', id);

    try {
        //Peticion hacia la api
        const url = 'http://localhost:3000/eventos-eliminar';
        const respuesta = await fetch(url, {
            method: 'POST',
            body: datos
        })
        const resultado = await respuesta.json();

        console.log(resultado);

        if (resultado) {
            Swal.fire({
                icon: 'success',
                title: 'Muy bien...',
                text: 'Se Eliminó !',

            }).then(() => {
                window.location.reload();
            })


        } else {
            Swal.fire({
                icon: 'info',
                title: 'Mensaje !',
                text: 'Existen invitaciones al evento y no puede eliminarse',

            })
        }

    } catch (error) {
        Swal.fire({
            icon: 'error',
            title: 'Error...',
            text: 'Hubo un error al eliminar!',

        })
    }
}

async function borrarTipo(id) {
    datos = new FormData();
    datos.append('id', id);

    try {
        //Peticion hacia la api
        const url = 'http://localhost:3000/api/tipos-eliminar';
        const respuesta = await fetch(url, {
            method: 'POST',
            body: datos
        })
        const resultado = await respuesta.json();

        console.log(resultado);

        if (resultado) {
            Swal.fire({
                icon: 'success',
                title: 'Muy bien...',
                text: 'Se Eliminó !',

            }).then(() => {
                window.location.reload();
            })


        } else {
            Swal.fire({
                icon: 'info',
                title: 'Mensaje !',
                text: 'Existen grupos de este tipo y no puede eliminarse',

            })
        }

    } catch (error) {
        Swal.fire({
            icon: 'error',
            title: 'Error...',
            text: 'Hubo un error al eliminar!',

        })
    }
}


async function borrarUser(id) {
    datos = new FormData();
    datos.append('id', id);

    try {
        //Peticion hacia la api
        const url = 'http://localhost:3000/usuarios-eliminar';
        const respuesta = await fetch(url, {
            method: 'POST',
            body: datos
        })
        const resultado = await respuesta.json();

        console.log(resultado);

        if (resultado) {
            Swal.fire({
                icon: 'success',
                title: 'Muy bien...',
                text: 'Se Eliminó !',

            }).then(() => {
                window.location.reload();
            })


        } else {
            Swal.fire({
                icon: 'info',
                title: 'Mensaje !',
                text: 'El usuario tiene acciones realizadas y no puede eliminarse',

            })
        }

    } catch (error) {
        Swal.fire({
            icon: 'error',
            title: 'Error...',
            text: 'Hubo un error al eliminar!',

        })
    }
}


async function borrarSemestre(id) {
    datos = new FormData();
    datos.append('id', id);

    try {
        //Peticion hacia la api
        const url = 'http://localhost:3000/semestres-eliminar';
        const respuesta = await fetch(url, {
            method: 'POST',
            body: datos
        })
        const resultado = await respuesta.json();

        console.log(resultado);

        if (resultado) {
            Swal.fire({
                icon: 'success',
                title: 'Muy bien...',
                text: 'Se Eliminó !',

            }).then(() => {
                window.location.reload();
            })


        } else {
            Swal.fire({
                icon: 'info',
                title: 'Mensaje !',
                text: 'El semestre tiene datos y no puede eliminarse',

            })
        }

    } catch (error) {
        Swal.fire({
            icon: 'error',
            title: 'Error...',
            text: 'Hubo un error al eliminar!',

        })
    }
}

















if (document.getElementById("participaciones")) {
    document.getElementById("participaciones").click();
}
if (document.getElementById('mytable')) {
    $('#mytable').stacktable();
}


if (document.getElementById('mytable-ev')) {
    $('#mytable-ev').stacktable();
}

if (document.querySelectorAll('table_res')) {
    $('.table_res').stacktable();
}




