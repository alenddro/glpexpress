<?php
    session_start();
    require_once('conexion.php');

    $id_soli=$_GET['l'];
   
    $sqlActualizarEstadoSolicitud="update solicitud set estado_solicitud_soli='oculto' where id_soli='$id_soli'";
    $ejecActualizarEstadoSolicitud = mysql_query($sqlActualizarEstadoSolicitud, $conexion);
    header('Location: listado.php');

?>
