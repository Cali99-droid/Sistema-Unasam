<?php

require 'includes/funciones.php';
incluirTemplate('barra');
?>

        <div class="contenedor-grupos">
            <div class="titulo-grupos">
                <h2 class="no-margin">Gestión de Grupos</h2>
            </div>

            <div class="acciones-grupo">
                <div class="buscar">
                    <i class="fas fa-search"></i>
                    <input type="text" placeholder="Buscar" >
                </div>
 
                <div class="nuevo-grupo">
                    <button type="button" class="boton-grupo" id="boton-agregar-grupo" 
                    onclick="modal('modal-grupo', 'boton-agregar-grupo', 'close-grupo')">
                        <i class="fas fa-plus-circle"></i>  Agregar Grupo </button>
                    
                </div>
            </div>

        <div class="grupos">

            <div class="contenido-grupos">

                <div class="grupo">
                    <a href="grupo.php">
                        <img src="build/img/grupo1.webp" alt="Avatar" class="grupo-imagen">
                        <div class="container">
                            <h4 class="no-margin">Tuna Unasam</h4> 
                            <p>Grupo que canta y baila</p> 
                        </div>
                    </a>
                </div>

                <div class="grupo">
                    <a href="grupo.php">
                        <img src="build/img/grupTuna.webp" alt="Avatar" class="grupo-imagen">
                        <div class="container">
                            <h4 class="no-margin">Tuna Femenina</h4> 
                            <p>Grupo que canta y baila</p> 
                        </div>
                    </a>
                </div>

                <div class="grupo">
                    <a href="grupo.php">
                        <img src="build/img/adusan.webp" alt="Avatar" class="grupo-imagen">
                        <div class="container">
                            <h4 class="no-margin">Adusam</h4> 
                            <p>Grupo de Deporte</p> 
                        </div>
                    </a>
                </div>

                <div class="grupo">
                    <a href="grupo.php">
                        <img src="build/img/grupo3.webp" alt="Avatar" class="grupo-imagen">
                        <div class="container">
                            <h4 class="no-margin">TUSAM</h4> 
                            <p>Grupo que Baila y actúa nomas</p> 
                        </div>
                    </a>
                </div>

                <div class="grupo">
                    <a href="grupo.php">
                        <img src="build/img/grupo4.webp" alt="Avatar" class="grupo-imagen">
                        <div class="container">
                            <h4 class="no-margin">Programadores</h4> 
                            <p>Grupo que Programa</p> 
                        </div>
                    </a>
                </div>

                <div class="grupo">
                    <a href="grupo.php">
                        <img src="build/img/grupo4.webp" alt="Avatar" class="grupo-imagen">
                        <div class="container">
                            <h4 class="no-margin">Programadores</h4> 
                            <p>Grupo que Programa</p> 
                        </div>
                    </a>
                </div>

                <div class="grupo">
                    <a href="grupo.php">
                        <img src="build/img/grupo4.webp" alt="Avatar" class="grupo-imagen">
                        <div class="container">
                            <h4 class="no-margin">Programadores</h4> 
                            <p>Grupo que Programa</p> 
                        </div>
                    </a>
                </div>

                <div class="grupo">
                    <a href="grupo.php">
                        <img src="build/img/grupo4.webp" alt="Avatar" class="grupo-imagen">
                        <div class="container">
                            <h4 class="no-margin">Programadores</h4> 
                            <p>Grupo que Programa</p> 
                        </div>
                    </a>
                </div>

                <div class="grupo">
                    <a href="grupo.php">
                        <img src="build/img/grupo4.webp" alt="Avatar" class="grupo-imagen">
                        <div class="container">
                            <h4 class="no-margin">Programadores</h4> 
                            <p>Grupo que Programa</p> 
                        </div>
                    </a>
                </div>

                <div class="grupo">
                    <a href="grupo.php">
                        <img src="build/img/grupo4.webp" alt="Avatar" class="grupo-imagen">
                        <div class="container">
                            <h4 class="no-margin">Programadores</h4> 
                            <p>Grupo que Programa</p> 
                        </div>
                    </a>
                </div>

            </div>  <!--Fin conteniodo grupos-->

        </div>

        </div>
    </div>
   </div>

   <div class="modal-agregar " id="modal-grupo">
       
   
       <div class="contenido-modal-grupo ">
        <div class="encabezado-modal">
            <h2>Nuevo Grupo</h2>
            <span class="close close-grupo">&times;</span>

        </div>
            <form action="" class="formulario-grupo">
                
                <label for="nombre-grupo">Nombre del grupo</label>
                <input type="text" name="nombre-grupo" id="nombre-grupo">
        
                <label for="resolucion">Resolucion</label>
                <input type="text" name="resolucion" id="resolucion">

                <div class="contenido-tipos">  
                    <div class="cont-tip">
                        <label for="tipo-grupo">Tipo de Grupo</label>
                        <select name="tipo-grupo" id="tipo-grupo">
                            <option value="">Academico</option>
                            <option value="">Artístico</option>
                        </select>
                    </div> 

                    <div class="cont-tip">
                        <button class="" type="button" id="boton-agregar-tipo" onclick="modal('modal-tipo', 'boton-agregar-tipo', 'close-tipo')">
                            <i class="fas fa-plus-circle" ></i> Nuevo tipo
                        </button>
 
                    </div>
                     
                </div>
        
                
                <div>
                    <label for="imagen-grupo">Imagen de Grupo</label>
                    <input type="file" name="imagen-grupo"> 
                </div>     

                    <button class="" type="submit">Aceptar</button>
              
            </form> 



<?php
incluirTemplate('modales/modalTipo');

incluirTemplate('cierre');