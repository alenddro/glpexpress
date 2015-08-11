<?php
require('../../../conexion.php');
 	
 	$todook="OK!";

//Consulta total de usuarios
	
	$sqlTotalUsuarios = "select * from usuario where esadmin = 0";
	$ejecTotalUsuarios = mysql_query($sqlTotalUsuarios, $conexion);
	$countTotalUsuarios = mysql_num_rows($ejecTotalUsuarios);
	
	//Consulta total de Trabajadores

	$sqlTotalTrabajadores = "select * from usuario where (esadmin = 1 or esadmin=3)";
	$ejecTotalTrabajadores = mysql_query($sqlTotalTrabajadores, $conexion);
	$countTotalTrabajadores = mysql_num_rows($ejecTotalTrabajadores);

	//consulta total de Pedidos Activos

	$sqlSolicitudActiva="select producto.*, solicitud.* from solicitud, producto where producto.id_prod=solicitud.producto_id_soli and solicitud.estado_solicitud_soli='activo' order by solicitud.fec_solicitud_soli desc";
    $ejecSolicitudActiva=mysql_query($sqlSolicitudActiva, $conexion);
    $countSolicitudActiva = mysql_num_rows($ejecSolicitudActiva);


	
	//consulta total de Pedidos Finalizados

	$sqlSolicitudFinalizada="select producto.*, solicitud.* from solicitud, producto where producto.id_prod=solicitud.producto_id_soli and (solicitud.estado_solicitud_soli='finalizado' or solicitud.estado_solicitud_soli='oculto') order by solicitud.fec_solicitud_soli desc";
    $ejecSolicitudFinalizada=mysql_query($sqlSolicitudFinalizada, $conexion);
    $countSolicitudFinalizada = mysql_num_rows($ejecSolicitudFinalizada);

?>
<div class="col-md-2 col-sm-2 col-md-offset-1 box0">
	<div class="box1">
		<span class="li_heart"></span>
		<h3><?php echo $countTotalUsuarios;?></h3>
	</div>
    <p><?php echo $countTotalUsuarios;?> Usuarios registrados en el sistema.!</p>
</div>

<div class="col-md-2 col-sm-2 box0">
  	<div class="box1">
		<span class="li_cloud"></span>
		<h3><?php echo $countTotalTrabajadores;?></h3>
	</div>
  	<p><?php echo $countTotalTrabajadores;?> Trabajadores registrados en el sistema.!</p>
</div>

<div class="col-md-2 col-sm-2 box0">
  	<div class="box1">
		<span class="li_stack"></span>
		<h3><?php echo $countSolicitudActiva;?></h3>
  	</div>
 	<p><?php echo $countSolicitudActiva;?> Pedidos Activos.</p>
</div>

<div class="col-md-2 col-sm-2 box0">
 	<div class="box1">
		<span class="li_news"></span>
		<h3><?php echo $countSolicitudFinalizada;?></h3>
	</div>
   	<p><?php echo $countSolicitudFinalizada;?> Pedidos Finalizados.</p>
</div>

<div class="col-md-2 col-sm-2 box0">
	<div class="box1">
		<span class="li_data"></span>
		<h3><?php echo  $todook; ?></h3>
	</div>
    <p><?php echo  $todook; ?> | En caso de consultas comunicarce con el Administrador.</p>
</div>
