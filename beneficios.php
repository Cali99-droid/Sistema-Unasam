<?php

require 'includes/funciones.php';
incluirTemplate('barra');
?>

        <div class="contenedor-grupos">
            <div class="titulo-grupos">
                <h2 class="no-margin">Gestión de Beneficios</h2>
            </div>

            <div class="acciones-grupo">
                <div class="buscar">
                    <i class="fas fa-search"></i>
                    <input type="text" placeholder="Buscar" >
                </div>

                <div class="nuevo-grupo">
                    <button type="button" class="boton-grupo"  id="boton-agregar-beneficio"
                    onclick="modal('modal-agregar', 'boton-agregar-beneficio', 'close')">
                        <i class="fas fa-plus-circle"></i>  Agregar Beneficio
                    </button>
                </div>
            </div>

            <div class="contenedor-tabla tab-beneficio">

                    <table>
                        <tr>
                          <th>Beneficio</th>
                          <th>Resolucion</th>
                          <th>Fecha de Emision</th>
                          <th>Estado</th>
                          <th>Acciones</th>
                          
                        </tr>
                        <tr>
                          <td>Jill</td>
                          <td>Smith</td>
                          <td>50</td>
                          <td><input type="checkbox"></td>
                          <td class="acciones"><i class="far fa-edit"></i><i class="far fa-trash-alt"></i></td>
                          
                        </tr>
                        <tr>
                          <td>Eve</td>
                          <td>Jackson</td>
                          <td>94</td>
                          <td><input type="checkbox"</td>
                          <td class="acciones"><i class="far fa-edit"></i><i class="far fa-trash-alt"></i></td>
                          
                        </tr>
                        <tr>
                          <td>Adam</td>
                          <td>Johnson</td>
                          <td>67</td>
                          <td><input type="checkbox"</td>
                          <td class="acciones"><i class="far fa-edit"></i><i class="far fa-trash-alt"></i></td>
                          
                        </tr>
                      </table>
          
            </div>


        </div>

        </div>
       


    </div>
   </div>


   <div class="modal-agregar" id="modal-agregar">
       
   
    <div class="modal-beneficio contenido-modal-grupo ">
     <div class="encabezado-modal">
         <h2>Nuevo Beneficio</h2>
         <span class="close">&times;</span>

     </div>
         <form action="" class="formulario-beneficio">

            <div class="columna-beneficio">
                <label for="inputEmail">Nombre del Beneficio</label>
                <input type="text"  id="inputEmai"
                    placeholder="Ingrese el Beneficio">

                <label for="inputEmail4">Noº de Resolución</label>
                <input type="text"  id="inputEmail4"
                    placeholder="Ingrese el Nº de Resolución de Beneficio">

                <label for="">Fecha de Emisión</label>
                <input type="date" style="margin: .4rem 0;" class="form-control" placeholder="First name">

            </div>

            <div class="columna-beneficio">
                <label for="">Estado</label>
                <select  
                    name="Estado" id="Estado">

                    <option value="1">ACTIVO</option>
                    <option value="2">INACTIVO</option>
                </select>

                <label for="inputEmai">Seleccione Tipo de Grupos a Asignar</label>
                <select 
                    name="EstadoU" id="EstadoU">
                    <option value="1">DANZA</option>
                    <option value="2">MÚSICA</option>
                    <option value="3">CANTO</option>
                </select> 

                <button class="" type="submit">Aceptar</button>

            </div>
             
            

            
           
         </form> 
         <?php

incluirTemplate('cierre');