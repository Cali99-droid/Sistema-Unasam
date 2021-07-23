<?php

require 'includes/funciones.php';
incluirTemplate('barra');
?>

        <div class="contenedor-grupos">
            <div class="titulo-grupos">
                <h2 class="no-margin">Gestión de Tipos</h2>
            </div>

            <div class="acciones-grupo">
                <div class="buscar">
                    <i class="fas fa-search"></i>
                    <input type="text" placeholder="Buscar" >
                </div>

                <div class="nuevo-grupo">
                    <button type="button" class="boton-grupo" id="boton-agregar-tipo" 
                    onclick="modal('modal-tipo', 'boton-agregar-tipo', 'close-tipo')">
                        <i class="fas fa-plus-circle"></i>  Agregar Tipos</button>
                </div>
            </div>

            <div class="contenedor-tabla tab-beneficio">

                    <table>
                        <tr>
                          <th>Tipos</th>
                          <th>Acciones</th>
                          
                        </tr>
                        <tr>
                          <td>Jill</td>
                          <td class="acciones"><i class="far fa-edit"></i><i class="far fa-trash-alt"></i></td>
                          
                        </tr>
                        <tr>
                          <td>Eve</td>
                          <td class="acciones"><i class="far fa-edit"></i><i class="far fa-trash-alt"></i></td>
                          
                        </tr>
                        <tr>
                          <td>Adam</td>
                          <td class="acciones"><i class="far fa-edit"></i><i class="far fa-trash-alt"></i></td>
                          
                        </tr>
                      </table>
          
            </div>


        </div>

        </div>
       


    </div>
   </div>

   <!--ventana modal-->
         

<?php

incluirTemplate('modales/modalTipo');


incluirTemplate('cierre');