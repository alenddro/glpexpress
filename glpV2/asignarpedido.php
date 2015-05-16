<?php 
session_start();
require_once('conexion.php');

$asignar_a=$_GET['asignar_a'];
$id_soli=$_GET['id_soli'];

	//asignar pedido en tabla solicitud (update)
	$sqlAsignarSolicitud="update solicitud set asignado_a_soli='$asignar_a' where id_soli='$id_soli'";
	$ejecAsignarSolicitud=mysql_query($sqlAsignarSolicitud,$conexion);

if ($ejecAsignarSolicitud) {; ?>

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
              <h4 class="modal-title" id="myLargeModalLabel">Asignacion completada con exito <span class="nombreregistro"></span></h4>
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


<?php
}else{
	echo "Error al asignar pedido";
}
?>