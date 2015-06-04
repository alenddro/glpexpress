<?php 
session_start();
require_once('conexion.php');
$trabajador=$_POST['trabajador'];

$sqlDatosTrabajador ="select * from usuario where id_usu='$trabajador'";
$ejecDatosTrabajador =mysql_query($sqlDatosTrabajador,$conexion);
$arrayDatosTrabajador=mysql_fetch_array($ejecDatosTrabajador);
	$nombre=$arrayDatosTrabajador['nombre_usu'];
	$apellido=$arrayDatosTrabajador['apellido_usu'];

$camion=$_POST['camion'];
$stockcamion=$_POST['stockcamion'];

$asignado_por= $_SESSION['nombre_usu']." ".$_SESSION['apellido_usu'];


$fec_subida= date("Y-m-d h-i-s", time());

/*Estado del trabajador
	1.-Activo
	2.-Inactivo
*/
	$sqlInsertarTrabajadorActivo="insert into trabajadoractivo (id_trab_activo,nombre_trab_activo,apellido_trab_activo,id_camion_trab_activo,stock_camion_trab_activo,fec_asignacion_trab_activo,estado_trab_activo,asignado_por_trab_activo) value ('$trabajador','$nombre','$apellido','$camion','$stockcamion','$fec_subida',1,'$asignado_por')";
	$ejecInsertarTrabajadorActivo=mysql_query($sqlInsertarTrabajadorActivo,$conexion);


	if ($ejecInsertarTrabajadorActivo) {

		?>
		<script>
             setTimeout(function () {
               window.location.href = "admin/listartrabajadores.php";
            }, 300);
        </script>
		<?php

	}else{
		echo "ocurrio un error en el proceso de insercion de datos";
	}

?>