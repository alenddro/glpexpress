<?php
session_start();
header('Content-Type: text/html; charset=ISO-8859-1');
require_once('conexion.php');

date_default_timezone_set("America/Santiago");
$hora = time();
$fec_sol = date('Y-m-d H:i:s',$hora);



$idgas=$_POST['idgas'];
//$terminos=$_POST['terminos'];
$idusu=$_POST['idusuario'];
$metodopago=$_POST['metodopago_cli'];


               $sqlSolicitarPedido="insert into solicitud (cliente_id_soli, fec_solicitud_soli, producto_id_soli, estado_solicitud_soli, metodo_pago_cli_soli) values ('$idusu','$fec_sol','$idgas','activo','$metodopago')"; 
               $ejecSolicitarPedido=mysql_query($sqlSolicitarPedido, $conexion);


?>
        <script>
           window.location.href = "listado.php";
        </script>