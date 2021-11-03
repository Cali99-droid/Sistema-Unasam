document.addEventListener('DOMContentLoaded', function(){

   eventListeners();
  
});





function navegacion(){
    const contenedor = document.querySelector('.contenedor-barra');
    const logo = document.querySelector('.contenido-cabecera');
    const admin = document.querySelector('.sub-item');

    /*navegacion.classList.contains*/ 

    if(contenedor.classList.contains('ocultar') ){
        contenedor.classList.remove('ocultar');
        logo.classList.remove('mostrar-logo');
        admin.classList.remove('mostrar-sub');
        
   
    }else{
        contenedor.classList.add('ocultar'); 
        logo.classList.add('mostrar-logo');
        admin.classList.remove('mostrar-sub');
    }

}

function mostrarAdmin(){
    const contenedor = document.querySelector('.contenedor-barra');
    const logo = document.querySelector('.contenido-cabecera');
    if(contenedor.classList.contains('ocultar')){
        document.getElementById("sub-item").classList.toggle("mostrar-sub"); 
    }else{
        contenedor.classList.add('ocultar');
        logo.classList.add('mostrar-logo');
        document.getElementById("sub-item").classList.add("mostrar-sub");
    }
}

function eventListeners(){
    const mobileMenu = document.querySelector('.openbtn');
    mobileMenu.addEventListener('click', navegacion);
    // const btn = document.querySelector('#btn_modal');
    // btn.addEventListener('click', llamar_modal);
    const busc = document.querySelector('.buscar-inte');
    busc.addEventListener('keyup',buscarRegistro);

   
/*
    const ad = document.querySelector('.administrador');
    ad.addEventListener('click', navegacion);*/
}

function llamar_modal(){
    Swal.fire(
        'Good job!',
        'You clicked the button!',
        'info'
      )
}

function items(){
    const contenedor = document.querySelector('.contenedor-barra');
    const logo =     document.querySelector('.contenido-cabecera');
    const admin = document.querySelector('.sub-item');
    const ad = document.querySelector('.administrador');
//ad.addEventListener('click', navegacion);

    /*navegacion.classList.contains*/ 

    if(!contenedor.classList.contains('ocultar') ){
        contenedor.classList.remove('ocultar');
        logo.classList.remove('mostrar-logo');
      //  admin.classList.add('mostrar-sub');
        
   
    }else{
        contenedor.classList.add('ocultar'); 
        logo.classList.add('mostrar-logo');
       // admin.classList.remove('mostrar-sub');
    }

}




function modal(modal, boton, close){
   
var modal = document.getElementById(modal);
var span = document.getElementsByClassName(close)[0];

  modal.style.display = "block";


span.onclick = function() {
  modal.style.display = "none";
  window.location.reload();
}

window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
    window.location.reload();

  }
}
}


/**AJAX */

function BuscarIntegrante(dni){

    var param = {"dni": dni, "cod": 1}

    $.ajax({
        type: "POST",
        data: param,
        url: "obtenDatos.php",
        success: function(r) {

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

function actualizarIntegrante(dni, modal_integrante, boton, close){

  
    modal(modal_integrante, boton, close);

     BuscarIntegrante(dni);

     $(document).ready(function(){

        $("#cont_buscar").hide();

        $("#titulo_integrante").text('Editar Integrante');
        $("#valor").val('1');
      
      });


    
}

function actualizarTipo(id, modal_tipo, boton_agregar_tipo, close_tipo){

    modal(modal_tipo, boton_agregar_tipo, close_tipo);

    
    var param = {"id": id, "cod": 2}

    $.ajax({
        type: "POST",
        data: param,
        url: "obtenDatos.php",
        success: function(r) {

            datos = jQuery.parseJSON(r); // vas a castear el array json uno a uno

            $('#nombre_tipo').val(datos['nombre_tipo']);
            $('#titulo_tipo').text('Actualizar Tipo');
            $('#idTipoGrupo').val(datos['idTipoGrupo']);
            $('#valor').val('2');
           
        }
    });

}

function actualizarBeneficio(id, modalben, boton_agregar_ben, close_ben){

    modal(modalben, boton_agregar_ben, close_ben);

    
    var param = {"id": id, "cod": 3}

    $.ajax({
        type: "POST",
        data: param,
        url: "obtenDatos.php",
        success: function(r) {

            datos = jQuery.parseJSON(r); // vas a castear el array json uno a uno

            $('#numero').val(datos['numero']);
            $("#fecha_emision").val(datos['fecha_emision']);
            $('#estadoresolucion').val(datos['estadoresolucion']);
            $('#nombre').val(datos['nombre']);
            $('#estado').val(datos['estado']);
            $('#idTipoGrupo').val(datos['idTipoGrupo']);
            $("#valor").val('2');
            $("#idBeneficio").val(datos['idBeneficio']);

            
            if (datos['estadoresolucion'] === 'COMPLETADO') {
                $("#estadoresolucion option[value='COMPLETADO'").attr("selected", true);
            } else {
                $("#estadoresolucion option[value='PENDIENTE'").attr("selected", true);
            }

            if (datos['estado'] === 'ACTIVO') {
                $("#estado option[value='ACTIVO'").attr("selected", true);
            } else {
                $("#estado option[value='INACTIVO'").attr("selected", true);
            }
            
         
     
     
           
        }
    });

}

function actualizarEvento(id, modal_ev, boton_agregar_ev, close_ev){

    modal(modal_ev, boton_agregar_ev, close_ev);

    var param = {"id": id, "cod": 4}

    $.ajax({
        type: "POST",
        data: param,
        url: "obtenDatos.php",
        success: function(r) {


            datos = jQuery.parseJSON(r); // vas a castear el array json uno a uno

            $('#nombre_evento').val(datos['nombre_evento']);
            $('#fecha_inicio').val(datos['fecha_inicio']);
            $('#fecha_final').val(datos['fecha_final']);
            $("#valor").val('2');
            $('#idEventosrealizados').val(datos['idEventosrealizados']);
        }
    });

}


function buscarUsuario(dni){

    var param = {"dni": dni, "cod": 5}

    $.ajax({
        type: "POST",
        data: param,
        url: "obtenDatos.php",

        success: function(r) {

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

            if(val === 'activo'){
                $("#estado").attr('checked', true);

            }else{
                $("#estado").attr('checked', false);
            }
        }
    });

}


function actualizarUsuario(dni, modal_usu, boton_agregar_usu, close_usu){

    modal(modal_usu, boton_agregar_usu, close_usu);
    buscarUsuario(dni);

    $(document).ready(function(){

        

        $("#bus_user").hide();
   
        $("#titulo_user").text('Editar Usuario');
        $("#valor").val('2');
        $("")
      });

}

function actualizarSemestre(id, modal_se, boton_se, close_se){
    modal(modal_se, boton_se, close_se);


}


function buscarRegistro(){

    $(document).ready(function(){
        $("#buscarRegistro").keyup(function(){
        _this = this;
        // Show only matching TR, hide rest of them
        $.each($("#mytable tbody tr"), function() {
            if($(this).text().toLowerCase().indexOf($(_this).val().toLowerCase()) === -1)
                $(this).hide();
            else
                $(this).show();
        });
        });
    });
}

function asignarBeneficio(idbeneficioXtipo, idAlumnoGrupo){
  
    var param = {"idbeneficioXtipo": idbeneficioXtipo, "idAlumnoGrupo": idAlumnoGrupo,"cod": 1}
    $.ajax({
        type: "POST",
        data: param,
        url: "setDatos.php",

        success: function(r) {

           if(r == 0){
      
              // Swal.fire('ERORR !!', 'EL BENEFICIO YA ESTA ASIGNADO ', 'error');
               Swal.fire({
                title: 'ERROR',
                text: 'EL BENEFICIO YA ESTA ASIGNADO!',
                icon: 'error',
                showDenyButton: false,
                showCancelButton: false,
                confirmButtonText: 'Aceptar',
               // denyButtonText: `Don't save`,
              }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                  window.location.reload();
                }
              })
               
           }else{
            Swal.fire({
                title: 'EXITO',
                text: 'BENEFICIO ASIGNADO CORRECTAMENTE!',
                icon: 'success',
                showDenyButton: false,
                showCancelButton: false,
                confirmButtonText: 'Aceptar',
               // denyButtonText: `Don't save`,
              }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                  window.location.reload();
                }
              })
           
            
           }
           
        
        }
    });
   
}


function actualizarEstadoBeneficio($id){
    var param = {"id": $id,"cod": 2};
    $.ajax({
        type: "POST",
        data: param,
        url: "setDatos.php",

        success: function(r) {
            Swal.fire({
                title: 'EXITO',
                text: 'ESTADO MODIFICADO CON ÉXITO !',
                icon: 'success',
                showDenyButton: false,
                showCancelButton: false,
                confirmButtonText: 'Aceptar',
               // denyButtonText: `Don't save`,
              }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                  window.location.reload();
                }
              })
           
          
        
        }
    });

}



 


