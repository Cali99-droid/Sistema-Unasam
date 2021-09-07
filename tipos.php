<?php
require 'includes/app.php';

use App\TipoGrupo;


$tipos = TipoGrupo::all();

$tip = new TipoGrupo();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  if ($_POST['cod'] == 1) {
    $tipo = new TipoGrupo($_POST);
    $resultado = $tipo->crear();
    if ($resultado) {
      header('Location: /tipos.php');
    }
  } elseif ($_POST['cod'] == 2) {
    $tipo = new TipoGrupo($_POST);
    $resultado = $tipo->actualizar();
    if ($resultado) {
      header('Location: /tipos.php');
    }
  }
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
      <button type="button" class="boton-grupo" id="boton-agregar-tipo" onclick="modal( 'modal-tipo', 'boton-agregar-tipo', 'close-tipo', 'nuevo tipo')">
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


            <button type="button" class="boton-acciones" onclick="actualizarTipo(<?php echo $tipo->idTipoGrupo; ?>, 'modal-tipo', 'boton-actualizar-tipo', 'close-tipo')">
              <i class=" fas fa-pencil-alt"></i> </button>


            <input type="hidden" name="id" value="<?php echo $tipo->idTipoGrupo; ?>">
            <button type="button" class="boton-acciones borrar">
              <i class="fas fa-trash"></i> </button>



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
<div class="modal-agregar" id="modal-tipo">


  <div class="contenido-modal-grupo">
    <div class="encabezado-modal">
      <h2 id="titulo_tipo">Ingrese nuevo tipo de grupo</h2>
      <span class="close close-tipo">&times;</span>

    </div>

    <form method="POST" class="formulario-grupo">

      <label for="nombre_tipo">Nombre del tipo</label>
      <input type="text" name="nombre_tipo" id="nombre_tipo" value="<?php $tip->nombre_tipo ?>">

      <input type="hidden" name="cod" value="1" id="valor">
      <input type="hidden" name="idTipoGrupo" value='' id="idTipoGrupo">
      <button type="submit">Aceptar</button>

    </form>

  </div>

</div>

<?php




incluirTemplate('cierre');
