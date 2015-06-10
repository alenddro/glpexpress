<?php
session_start();
header('Content-Type: text/html; charset=ISO-8859-1');
require_once('conexion.php');

date_default_timezone_set("America/Santiago");
$hora = time();
$fec_sol = date('Y-m-d H:i:s',$hora);

$id_trabajador=$_SESSION['id_usu'];
	$sqlNombreTrabajadorRechazoSolicitud="select * from usuario where id_usu='$id_trabajador'";
	$ejecNombreTrabajadorRechazoSolicitud=mysql_query($sqlNombreTrabajadorRechazoSolicitud,$conexion);
	$arrayNombreTrabajadorRechazoSolicitud=mysql_fetch_array($ejecNombreTrabajadorRechazoSolicitud);
	$nombreTrab=$arrayNombreTrabajadorRechazoSolicitud['nombre_usu'];
	$apellidoTrab=$arrayNombreTrabajadorRechazoSolicitud['apellido_usu'];
$motivorech=$_GET['motivorechazo'];
$id_soli=$_GET['l'];


               $sqlFinalizaPedido="update solicitud set asignado_a_soli='',motivo_rech_soli='$motivorech | rechazado por: $nombreTrab $apellidoTrab' where id_soli='$id_soli'";
               $ejecFinalizaPedido=mysql_query($sqlFinalizaPedido, $conexion);


?>
        <script>
           window.location.href = "listado.php";
        </script>