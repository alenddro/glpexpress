<?php 
session_start();
date_default_timezone_set('America/Argentina/Buenos_Aires');
require_once('conexion.php');
$trabajador=$_POST['trabajador'];

$sqlDatosTrabajador ="select * from usuario where id_usu='$trabajador'";
$ejecDatosTrabajador =mysql_query($sqlDatosTrabajador,$conexion);
$arrayDatosTrabajador=mysql_fetch_array($ejecDatosTrabajador);
	$nombre=$arrayDatosTrabajador['nombre_usu'];
	$apellido=$arrayDatosTrabajador['apellido_usu'];

$camion=$_POST['camion'];

$asignado_por= $_SESSION['nombre_usu']." ".$_SESSION['apellido_usu'];


$fec_subida= date("Y-m-d H:i:s");


$stock5=$_POST['gas5'];
$id5=$_POST['id_produ5'];
$stock15=$_POST['gas15'];
$id15=$_POST['id_produ15'];
$stock45=$_POST['gas45'];
$id45=$_POST['id_produ45'];

$stockcamion= $stock5 + $stock15 + $stock45;
/*Estado del trabajador
	1.-Activo
	2.-Inactivo
*/
$stock_original="\n |Gas de 5Kg: ".$stock5."\n |Gas de 15Kg: ".$stock15. "\n |Gas de 45Kg: ".$stock45;

	$sqlInsertarTrabajadorActivo="insert into trabajadoractivo (id_trab_activo,nombre_trab_activo,apellido_trab_activo,id_camion_trab_activo,stock_camion_trab_activo,fec_asignacion_trab_activo,estado_trab_activo,id_gas_5_trab_activo,stock_gas_5_trab_activo,id_gas_15_trab_activo,stock_gas_15_trab_activo,id_gas_45_trab_activo,stock_gas_45_trab_activo,stock_gas_original_trab_activo,asignado_por_trab_activo) value ('$trabajador','$nombre','$apellido','$camion','$stockcamion','$fec_subida',1,'$id5','$stock5','$id15','$stock15','$id45','$stock45','$stock_original','$asignado_por')";
	$ejecInsertarTrabajadorActivo=mysql_query($sqlInsertarTrabajadorActivo, $conexion);



    if ($ejecInsertarTrabajadorActivo) {

    $sqlInsertarRegActTrabajadorActivo="insert into registro_trab_activos (id_trab_activo_reg_activo,nombre_trab_activo_reg_activo,apellido_trab_activo_reg_activo,id_camion_trab_activo_reg_activo,stock_camion_trab_activo_reg_activo,fec_asignacion_trab_activo_reg_activo,estado_trab_activo_reg_activo,id_gas_5_trab_activo_reg_activo,stock_gas_5_trab_activo_reg_activo,id_gas_15_trab_activo_reg_activo,stock_gas_15_trab_activo_reg_activo,id_gas_45_trab_activo_reg_activo,stock_gas_45_trab_activo_reg_activo,stock_gas_original_trab_activo_reg_activo,asignado_por_trab_activo_reg_activo) value ('$trabajador','$nombre','$apellido','$camion','$stockcamion','$fec_subida',1,'$id5','$stock5','$id15','$stock15','$id45','$stock45','$stock_original','$asignado_por')";
    $ejecInsertarRegActTrabajadorActivo=mysql_query($sqlInsertarRegActTrabajadorActivo,$conexion);

    	if ($ejecInsertarTrabajadorActivo AND $ejecInsertarRegActTrabajadorActivo) {
    		
    		//restar a stock de gas de 5 kg
    		$sqlRestarStock5kg= "SELECT stock_prod FROM producto WHERE kilos_prod ='5'";
        	$ejecRestarStock5kg = mysql_query($sqlRestarStock5kg ,$conexion);
        	$arrayGas5kg =mysql_fetch_array($ejecRestarStock5kg);
        		$nuevoStock5kg=(int)$arrayGas5kg['stock_prod'] - $stock5;
        	//Actualizar nuevo stock
        	$sqlActualizarNuevoStock5kg="UPDATE producto SET stock_prod='$nuevoStock5kg' WHERE kilos_prod ='5'";
        	$ejecActualizarNuevoStock5kg = mysql_query($sqlActualizarNuevoStock5kg ,$conexion);


        	//restar a stock de gas de 15 kg
    		$sqlRestarStock15kg= "SELECT stock_prod FROM producto WHERE kilos_prod ='15'";
        	$ejecRestarStock15kg = mysql_query($sqlRestarStock15kg ,$conexion);
        	$arrayGas15kg =mysql_fetch_array($ejecRestarStock15kg);
        		$nuevoStock15kg=(int)$arrayGas15kg['stock_prod'] - $stock15;
        	//Actualizar nuevo stock
        	$sqlActualizarNuevoStock15kg="UPDATE producto SET stock_prod='$nuevoStock15kg' WHERE kilos_prod ='15'";
        	$ejecActualizarNuevoStock15kg = mysql_query($sqlActualizarNuevoStock15kg ,$conexion);



        	//restar a stock de gas de 45 kg
    		$sqlRestarStock45kg= "SELECT stock_prod FROM producto WHERE kilos_prod ='45'";
        	$ejecRestarStock45kg = mysql_query($sqlRestarStock45kg ,$conexion);
        	$arrayGas45kg =mysql_fetch_array($ejecRestarStock45kg);
        		$nuevoStock45kg=(int)$arrayGas45kg['stock_prod'] - $stock45;
        	//Actualizar nuevo stock
        	$sqlActualizarNuevoStock45kg="UPDATE producto SET stock_prod='$nuevoStock45kg' WHERE kilos_prod ='45'";
        	$ejecActualizarNuevoStock45kg = mysql_query($sqlActualizarNuevoStock45kg ,$conexion);

    	}

		?>
		<script>
             setTimeout(function () {
               window.location.href = "admin/administrartrabajador.php";
            }, 300);
        </script>
		<?php

	}else{
		echo "ocurrio un error en el proceso de insercion de datos";
	}

?>