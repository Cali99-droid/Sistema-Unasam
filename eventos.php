<?php

require 'includes/funciones.php';
incluirTemplate('barra');
?>


        <div class="contenedor-grupos">
            <div class="titulo-grupos">
                <h2 class="no-margin">Gestión de Eventos</h2>
            </div>

            <div class="acciones-grupo">
                <div class="buscar">
                    <i class="fas fa-search"></i>
                    <input type="text" placeholder="Buscar" >
                </div>

                <div class="nuevo-grupo">
                    <button type="button" class="boton-grupo" id="boton-agregar-evento" 
                    onclick="modal('modal-agregar', 'boton-agregar-evento', 'close')">
                        <i class="fas fa-plus-circle"></i>  Agregar Evento
                    </button>
                </div>
            </div>

            <div class="contenedor-tabla tab-beneficio">

                    <table>
                        <tr>
                          <th>Evento</th>
                          <th>Fecha de Inicio</th>
                          <th>Fecha Final</th>
                          <th>Acciones</th>
                          
                        </tr>
                        <tr>
                          <td>Jill</td>
                          <td>Smith</td>
                          <td>50</td>
                          <td class="acciones"><i class="far fa-edit"></i><i class="far fa-trash-alt"></i></td>
                          
                        </tr>
                        <tr>
                          <td>Eve</td>
                          <td>Jackson</td>
                          <td>94</td>
                          <td class="acciones"><i class="far fa-edit"></i><i class="far fa-trash-alt"></i></td>
                          
                        </tr>
                        <tr>
                          <td>Adam</td>
                          <td>Johnson</td>
                          <td>67</td>

                          <td class="acciones"><i class="far fa-edit"></i><i class="far fa-trash-alt"></i></td>
                          
                        </tr>
                      </table>
          
            </div>


        </div>

        </div>

    </div>
   </div>
<!--ventana modal-->
   <div class="modal-agregar" id="modal-agregar">
       
   
    <div class="contenido-modal-grupo">
     <div class="encabezado-modal">
         <h2>Nuevo Evento</h2>
         <span class="close">&times;</span>

     </div>
         <form action="" class="formulario-grupo">
             
             <label for="nombre-evento">Nombre del Evento</label>
             <input type="text" name="nombre-evento" id="nombre-evento">
     
             <label for="fecha-inicio">Fecha inicio</label>
             <input type="date" name="fecha-inicio" id="fecha-inicio">

             <label for="fecha-fin">Fecha fin</label>
             <input type="date" name="fecha-fin" id="fecha-fin">

             <button class="" type="submit">Aceptar</button>
   
         </form> 

         <?php

incluirTemplate('cierre');