document.addEventListener('DOMContentLoaded', function(){
    eventListeners();


});


function mostrarPerfil(){
    document.getElementById("contenido-perfil").classList.toggle("mostrar");   
}

function navegacion(){
    const contenedor = document.querySelector('.contenedor-barra');
    const logo = document.querySelector('.contenido-cabecera');
    const admin = document.querySelector('.sub-item');

    /*navegacion.classList.contains*/ 

    if(contenedor.classList.contains('ocultar')){
        contenedor.classList.remove('ocultar');
        logo.classList.remove('mostrar-logo');
        admin.classList.add('mostrar-sub');
        
   
    }else{
        contenedor.classList.add('ocultar'); 
        logo.classList.add('mostrar-logo');
        admin.classList.remove('mostrar-sub');
    }

}

function mostrarAdmin(){

    document.getElementById("sub-item").classList.toggle("mostrar-sub");   


}

function eventListeners(){
    const mobileMenu = document.querySelector('.openbtn');
    mobileMenu.addEventListener('click', navegacion);

    const ad = document.querySelector('.administrador');
    ad.addEventListener('click', navegacion);
}

function items(){
    const contenedor = document.querySelector('.contenedor-barra');
    const logo =     document.querySelector('.contenido-cabecera');
    const admin = document.querySelector('.sub-item');
    const ad = document.querySelector('.administrador');
    ad.addEventListener('click', navegacion);

    /*navegacion.classList.contains*/ 

    if(!contenedor.classList.contains('ocultar') && ad.querySelector('click')){
        contenedor.classList.remove('ocultar');
        logo.classList.remove('mostrar-logo');
        admin.classList.add('mostrar-sub');
        
   
    }else{
        contenedor.classList.add('ocultar'); 
        logo.classList.add('mostrar-logo');
        admin.classList.remove('mostrar-sub');
    }

}
