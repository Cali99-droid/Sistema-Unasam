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
    if(!contenedor.classList.contains('ocultar')){
        document.getElementById("sub-item").classList.toggle("mostrar-sub"); 
    }else{
        contenedor.classList.remove('ocultar');
        logo.classList.remove('mostrar-logo');
        document.getElementById("sub-item").classList.add("mostrar-sub");
    }


      


}

function eventListeners(){
    const mobileMenu = document.querySelector('.openbtn');

    mobileMenu.addEventListener('click', navegacion);
/*
    const ad = document.querySelector('.administrador');
    ad.addEventListener('click', navegacion);*/
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

var btn = document.getElementById(boton);

var span = document.getElementsByClassName(close)[0];

  modal.style.display = "block";
  console.log('dieste click ' + modal);


span.onclick = function() {
  modal.style.display = "none";
}

window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
    console.log('click ventana')
  }
}
}
