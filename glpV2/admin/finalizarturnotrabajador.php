<?php 
session_start();
date_default_timezone_set('America/Argentina/Buenos_Aires');
require_once('../conexion.php');
$trabajador=$_GET['l'];

$stock5=$_GET['a'];
$stock15=$_GET['b'];
$stock45=$_GET['c'];

$dateFIN=date("Y-m-d H:i:s");

$stockcamionfinal= $stock5 + $stock15 + $stock45;

$stock_original_final="\n |Gas de 5Kg: ".$stock5."\n |Gas de 15Kg: ".$stock15. "\n |Gas de 45Kg: ".$stock45;

/*Estado del trabajador
    0.-Inactivo
    1.-Activo
    *2.-Inactivo*
*/
            $sqlFinTrabajadorActivo2="UPDATE registro_trab_activos SET estado_trab_activo_reg_activo=0, fec_asignacion_fin_trab_activo_reg_activo='$dateFIN', stock_original_final_camion_trab_activo_reg_activo='$stock_original_final', stock_final_camion_trab_activo_reg_activo=$stockcamionfinal WHERE id_trab_activo_reg_activo='$trabajador' AND estado_trab_activo_reg_activo=1  ORDER BY fec_asignacion_trab_activo_reg_activo desc LIMIT 1";
            $ejecFinTrabajadorActivo2=mysql_query($sqlFinTrabajadorActivo2,$conexion);

            //sumar a stock de gas de 5 kg
            $sqlSumarStock5kg= "SELECT stock_prod FROM producto WHERE kilos_prod ='5'";
            $ejecSumarStock5kg = mysql_query($sqlSumarStock5kg ,$conexion);
            $arrayGas5kg =mysql_fetch_array($ejecSumarStock5kg);
                $nuevoStock5kg=(int)$arrayGas5kg['stock_prod'] + (int)$stock5;
            //Actualizar nuevo stock
            $sqlActualizarNuevoStock5kg="UPDATE producto SET stock_prod='$nuevoStock5kg' WHERE kilos_prod ='5'";
            $ejecActualizarNuevoStock5kg = mysql_query($sqlActualizarNuevoStock5kg ,$conexion);


            //sumar a stock de gas de 15 kg
            $sqlSumarStock15kg= "SELECT stock_prod FROM producto WHERE kilos_prod ='15'";
            $ejecSumarStock15kg = mysql_query($sqlSumarStock15kg ,$conexion);
            $arrayGas15kg =mysql_fetch_array($ejecSumarStock15kg);
                $nuevoStock15kg=(int)$arrayGas15kg['stock_prod'] + (int)$stock15;
            //Actualizar nuevo stock
            $sqlActualizarNuevoStock15kg="UPDATE producto SET stock_prod='$nuevoStock15kg' WHERE kilos_prod ='15'";
            $ejecActualizarNuevoStock15kg = mysql_query($sqlActualizarNuevoStock15kg ,$conexion);



            //sumar a stock de gas de 45 kg
            $sqlSumarStock45kg= "SELECT stock_prod FROM producto WHERE kilos_prod ='45'";
            $ejecSumarStock45kg = mysql_query($sqlSumarStock45kg ,$conexion);
            $arrayGas45kg =mysql_fetch_array($ejecSumarStock45kg);
                $nuevoStock45kg=(int)$arrayGas45kg['stock_prod'] + (int)$stock45;
            //Actualizar nuevo stock
            $sqlActualizarNuevoStock45kg="UPDATE producto SET stock_prod='$nuevoStock45kg' WHERE kilos_prod ='45'";
            $ejecActualizarNuevoStock45kg = mysql_query($sqlActualizarNuevoStock45kg ,$conexion);


    $sqlFinTrabajadorActivo="delete from trabajadoractivo where id_trab_activo='$trabajador'";
    $ejecFinTrabajadorActivo=mysql_query($sqlFinTrabajadorActivo,$conexion);




    if ($ejecFinTrabajadorActivo AND $ejecFinTrabajadorActivo2) {

        ?>
        <script>
            setTimeout(function () {
               window.location.href = "listartrabajadoresactivos.php";
            }, 300);
        </script>
        <?php

    }else{
        echo "ocurrio un error en el proceso de insercion de datos";
    }

?>