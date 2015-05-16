<?php
session_start();
header('Content-Type: text/html; charset=ISO-8859-1');
require_once('conexion.php');

date_default_timezone_set("America/Santiago");
$hora = time();
$fec_sol = date('Y-m-d H:i:s',$hora);

$id_trabajador=$_SESSION['id_usu'];

$id_soli=$_GET['l'];


               $sqlFinalizaPedido="update solicitud set estado_solicitud_soli='finalizado', finalizado_por_soli='$id_trabajador' where id_soli='$id_soli'";
               $ejecFinalizaPedido=mysql_query($sqlFinalizaPedido, $conexion);


?>
        <script>
           window.location.href = "listado.php";
        </script>