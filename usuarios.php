<?php

require 'includes/funciones.php';
incluirTemplate('barra');
?>

        <div class="contenedor-grupos">
            <div class="titulo-grupos">
                <h2 class="no-margin">Gestión de Usuarios</h2>
            </div>

            <div class="acciones-grupo">
                <div class="buscar">
                    <i class="fas fa-search"></i>
                    <input type="text" placeholder="Buscar" >
                </div>

                <div class="nuevo-grupo">
                    <button type="button" class="boton-grupo" id="boton-agregar-usuario" 
                    onclick="modal('modal-agregar', 'boton-agregar-usuario', 'close')">
                        <i class="fas fa-plus-circle"></i>  Agregar Usuario</button>
                </div>
            </div>

            <div class="contenedor-tabla tab-beneficio">

                    <table>
                        <tr>
                          <th>Nombre</th>
                          <th>Usuario</th>
                          <th>Cargo</th>
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

   <!--ventana modal-->
   <div class="modal-agregar" id="modal-agregar">
       
   
    <div class="contenido-modal-grupo modal-usuarios">
     <div class="encabezado-modal">
         <h2>Nuevo Usuario</h2>
         <span class="close">&times;</span>

     </div>
         <form action="" class="formulario-grupo">

            <div class="buscar">
                <label for="nombre-evento">Buscar</label>
                <input type="text" name="nombre-evento" id="nombre-evento">
            </div>

            <div class="contenedor-usuario">
                <div class="columna-usuario">
                    <label for="nombre-usuario">Nombre</label>
                    <input type="text" name="nombre-usuario" id="nombre-usuario">
            
                    <label for="apellido-usuario">Apellido</label>
                    <input type="text" name="apellido-usuario" id="apellido-usuario">


                    <label for="genero">Genero</label>
                    <select name="genero" id="">
                        <option value="">Masculino</option>
                        <option value="">Femenino</option>
                    </select>

                    <label for="direccion">Direccion</label>
                    <input type="text" name="direccion" id="direccion">

                    <label for="email-usuario">Email</label>
                    <input type="email" name="email-usuario" id="email-usuario">

                    
                </div>

                <div class="columna-usuario">
                

                    <label for="telefono">Teléfono</label>
                    <input type="number" name="telefono" id="telefono" placeholder="Ingrese teléfono">

                    <label for="nombre-usu"nombre-usu>Nombre de Usuario</label>
                    <input type="text" name="nombre-usu" placeholder="Ingrese nombre de Usuario">

                    <label for="pass-usuario">Clave de Usuario</label>
                    <input type="password"  name="pass-usuario" placeholder="Ingrese Password de Usuario">
                    <div class="estado">
                        <label for="estado">Estado</label>
                        <input type="checkbox" name="estado">

                    </div>
                   
                    <button class="" type="submit">Aceptar</button>

                </div>

            </div>
             
             

             
   
         </form> 

         <?php

incluirTemplate('cierre');