<?php
    session_start();
    require_once('conexion.php');

    $id_soli=$_GET['l'];
    $comentario=$_GET['comentario_cli'];
    $tip_comentario=$_GET['tipo_comentario'];

    $sqlActualizarComentario="update solicitud set comentario_cli_soli='$comentario', tipo_comentario_cli_soli='$tip_comentario' where id_soli='$id_soli'";
    $ejecActualizarComentario = mysql_query($sqlActualizarComentario, $conexion);

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Comentario Enviado</title>
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="css/estilos.css">
        <script type="text/javascript" src="js/jquery.js"></script>
        <script type="text/javascript" src="js/bootstrap.min.js"></script>
    </head>
    <body>
    <div class="modal fade bs-example-modal-lg in" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="false" style="display: block;">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">

            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
              <h4 class="modal-title" id="myLargeModalLabel">Gracias por su preferencia <span class="nombreregistro"></span>Su Comentario ha sido enviado!!</h4>
            </div>
            <div class="modal-body">
                <img src="img/logo.gif" alt="">
            </div>
          </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>
    <script>
     setTimeout(function () {
       window.location.href = "listado.php";
    }, 3000);
    </script>
    </body>
</html>
