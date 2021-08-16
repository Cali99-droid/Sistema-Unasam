<?php
require 'includes/app.php';

use App\TipoGrupo;







$tipos = TipoGrupo::all();

$tip = new TipoGrupo();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  debugear($_GET);
  $tipo = new TipoGrupo($_POST);
  debugear($tipo);
}



incluirTemplate('barra');
?>

<div class="contenedor-grupos">
  <div class="titulo-grupos">
    <h2 class="no-margin">Gestión de Tipos</h2>
  </div>

  <div class="acciones-grupo">
    <div class="buscar">
      <i class="fas fa-search"></i>
      <input type="text" placeholder="Buscar">
    </div>

    <div class="nuevo-grupo">
      <button type="button" class="boton-grupo" id="boton-agregar-tipo" onclick="modal('modal-tipo', 'boton-agregar-tipo', 'close-tipo')">
        <i class="fas fa-plus-circle"></i> Agregar Tipos</button>
    </div>
  </div>

  <div class="contenedor-tabla tab-beneficio">

    <table>
      <tr>
        <thead>
          <tr>
            <th>Tipos</th>
            <th>Acciones</th>
          </tr>

        </thead>

        <?php foreach ($tipos as $tipo) :  ?>
      <tr>
        <td><?php echo $tipo->nombre_tipo; ?></td>

        <td>
          <form method="GET" target="frame">

            <input type="hidden" name="id" value="<?php echo $tipo->idTipoGrupo; ?>">
            <input type="submit" class="boton-rojo-block" value="Eliminar">

            <button value="<?php echo $tipo->idTipoGrupo; ?>" type="button" class="boton-grupo" id="boton-agregar-tipo" onclick="modal('modal-tipo', 'boton-agregar-tipo', 'close-tipo')">
              <i class="fas fa-plus-circle"></i> Actuaizar</button>


          </form>

        </td>
      </tr>
    <?php endforeach; ?>

    </tbody>



    </table>

  </div>


</div>

</div>



</div>
</div>

<!--ventana modal-->
<div class="modal-agregar " id="modal-tipo">


  <div class="contenido-modal-grupo">
    <div class="encabezado-modal">
      <h2>Nuevo Tipo de Grupo</h2>
      <span class="close close-tipo">&times;</span>

    </div>

    <form method="POST" class="formulario-grupo">

      <?php   ?>

      <label for="nombre_tipo">Nombre del tipo</label>
      <input type="text" name="nombre_tipo" id="nombre-tipo" value="<?php $tip->nombre_tipo ?>">

      <button type="submit">Aceptar</button>

    </form>

  </div>

</div>

<iframe name="frame"></iframe>

<?php




incluirTemplate('cierre');
