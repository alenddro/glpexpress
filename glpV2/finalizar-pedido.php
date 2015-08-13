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

               if ($ejecFinalizaPedido) {
               		$sqlBuscarStock="SELECT solicitud.producto_id_soli,producto.id_prod,producto.stock_prod,trabajadoractivo.id_gas_5_trab_activo,trabajadoractivo.id_gas_15_trab_activo,trabajadoractivo.id_gas_45_trab_activo,trabajadoractivo.stock_gas_5_trab_activo,trabajadoractivo.stock_gas_15_trab_activo,trabajadoractivo.stock_gas_45_trab_activo, trabajadoractivo.id_trab_activo FROM solicitud, producto, trabajadoractivo WHERE producto.id_prod=solicitud.producto_id_soli AND solicitud.id_soli='$id_soli' AND solicitud.asignado_a_soli=trabajadoractivo.id_trab_activo";
               		$ejecBuscarStock=mysql_query($sqlBuscarStock, $conexion);
               		$arrayBuscarStock=mysql_fetch_array($ejecBuscarStock);

               		$id_prod=$arrayBuscarStock['id_prod'];


                    if ($arrayBuscarStock['id_prod'] == $arrayBuscarStock['id_gas_5_trab_activo']) {
                        $nuevoStock = $arrayBuscarStock['stock_gas_5_trab_activo'] - 1;
                        $sqlDescontarStock="UPDATE trabajadoractivo SET stock_gas_5_trab_activo='$nuevoStock' WHERE id_gas_5_trab_activo='$id_prod'";
                   		$ejecDescontarStock=mysql_query($sqlDescontarStock, $conexion);
                    }

                    if ($arrayBuscarStock['id_prod'] == $arrayBuscarStock['id_gas_15_trab_activo']) {
                        $nuevoStock = $arrayBuscarStock['stock_gas_15_trab_activo'] - 1;
                        $sqlDescontarStock="UPDATE trabajadoractivo SET stock_gas_15_trab_activo='$nuevoStock' WHERE id_gas_15_trab_activo='$id_prod'";
                        $ejecDescontarStock=mysql_query($sqlDescontarStock, $conexion);
                    }

                    if ($arrayBuscarStock['id_prod'] == $arrayBuscarStock['id_gas_45_trab_activo']) {
                        $nuevoStock = $arrayBuscarStock['stock_gas_45_trab_activo'] - 1;
                        $sqlDescontarStock="UPDATE trabajadoractivo SET stock_gas_45_trab_activo='$nuevoStock' WHERE id_gas_45_trab_activo='$id_prod'";
                        $ejecDescontarStock=mysql_query($sqlDescontarStock, $conexion);
                    }


               }else{
               		echo "Ocurrio un error en el proceso";
               }
?>
       	<script>
            //window.location.href = "listado.php";
        </script>