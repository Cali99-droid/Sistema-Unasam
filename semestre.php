<?php

require 'includes/app.php';

use App\Semestre;


$semestres = Semestre::all();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $arg = $_POST['semestre'];
  $semestre = new Semestre($arg);
  $semestre->crear();
}

incluirTemplate('barra');
?>

<div class="contenedor-grupos">
  <div class="titulo-grupos">
    <h2 class="no-margin">Gestión de Semestres</h2>
  </div>

  <div class="acciones-grupo">
    <div class="buscar">
      <i class="fas fa-search"></i>
      <input type="text" placeholder="Buscar">
    </div>

    <div class="nuevo-grupo">
      <button type="button" class="boton-grupo" id="boton-agregar-semestre" onclick="modal('modal-agregar-semestre', 'boton-agregar-semestre', 'close')">
        <i class=" fas fa-plus-circle"></i> Agregar Semestre</button>
    </div>
  </div>

  <div class="contenedor-tabla tab-beneficio">

    <table>
      <tr>
        <th>Nombre</th>
        <th>Fecha de inicio</th>
        <th>Fecha Final</th>
        <th>Estado</th>
        <th>Acciones</th>
      </tr>

      <?php foreach ($semestres as $semestre) :  ?>
        <tr>
          <td><?php echo $semestre->nombre; ?></td>
          <td><?php echo $semestre->fecha_inicio ?></td>
          <td><?php echo $semestre->fecha_final; ?></td>
          <td><?php echo $semestre->estado; ?></td>
          <td>


            <button type="button" class="boton-acciones" onclick="actualizarSemestre(<?php echo $semestre->idSemestre; ?>,'modal-agregar-semestre', 'boton', 'close')">
              <i class=" fas fa-pencil-alt"></i> </button>


            <input type="hidden" name="id" value="<?php echo $semestre->idSemestre; ?>">
            <button type="button" class="boton-acciones borrar">
              <i class="fas fa-trash"></i> </button>



          </td>
        </tr>
      <?php endforeach; ?>

    </table>

  </div>


</div>

</div>



</div>
</div>

<!--ventana modal-->
<div class="modal-agregar" id="modal-agregar-semestre">


  <div class="contenido-modal-grupo">
    <div class="encabezado-modal">
      <h2>Nuevo Semestre</h2>
      <span class="close">&times;</span>

    </div>
    <form method="POST" class="formulario-grupo">

      <label for="nombre">Nombre del Semestre</label>
      <input type="text" name="semestre[nombre]" id="nombre">

      <label for="fecha_inicio">Fecha inicio</label>
      <input type="date" name="semestre[fecha_inicio]" id="fecha_inicio">

      <label for="fecha_final">Fecha fin</label>
      <input type="date" name="semestre[fecha_final]" id="fecha_final">

      <div class="estado">
        <label for="estado">Estado</label>
        <input type="checkbox" name="semestre[estado]" id="estado" value="activo" <?php echo $semestre->estado == 'activo' ? 'checked' : '' ?>>

      </div>

      <button class="" type="submit">Aceptar</button>

    </form>

    <?php
    incluirTemplate('cierre');
