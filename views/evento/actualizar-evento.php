<?php

?>

<div class="contenedor-grupos">
    <div class="titulo-grupos">
        <h2 class="no-margin">Editar Evento</h2>
    </div>

    <?php include 'form.php' ?>
    <!---->
</div>


</div>
</div>

<div class="modal-agregar" id="modal-org">

    <div class="contenido-modal-grupo modal-org">
        <div class="encabezado-modal">
            <h2 id="titulo_integrante">Nuevo Organizador</h2>
            <span class=" close close-org">&times;</span>

        </div>
        <form class="formulario-grupo">

            <?php include 'formOrg.php';  ?>

        </form>
    </div>

</div>
<script>
    $(document).ready(function() {
        $('#idorganizador').select2();

    });
</script>