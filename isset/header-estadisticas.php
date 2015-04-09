<?php 
session_start();
require_once('conexion.php');

//Consulta total de usuarios
	
	$sqlTotalUsuarios = "select * from usuario where esadmin = 0";
	$ejecTotalUsuarios = mysql_query($sqlTotalUsuarios, $conexion);
	$countTotalUsuarios = mysql_num_rows($ejecTotalUsuarios);
	
	//Consulta total de Trabajadores

	$sqlTotalTrabajadores = "select * from usuario where esadmin = 1";
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
<?php if ($_SESSION['esadmin']==2) {;?>
	<section class="container-fluid" id="header-estadisticas">
		<article class="row">
			<div class="col-sm-12 col-md-3 text-center header-estadisticas">
				<p>Total de Usuarios</p>
				<p><strong><?php echo $countTotalUsuarios;?></strong></p>
			</div>

			<div class="col-sm-12 col-md-3 text-center header-estadisticas">
				<p>Total de Trabajadores</p>
				<p><strong><?php echo $countTotalTrabajadores;?></strong></p>
			</div>
			<div class="col-sm-12 col-md-3 text-center header-estadisticas">
				<p>Total de Pedidos Activos</p>
				<p><strong><?php echo $countSolicitudActiva;?></strong></p>
			</div>

			<div class="col-sm-12 col-md-3 text-center header-estadisticas">
				<p>Total de Pedidos Finalizados</p>
				<p><strong><?php echo $countSolicitudFinalizada;?></strong></p>
			</div>

			<!-- <div class="col-xs-12 col-md-3" style="border-left:#f0ad4e 3px solid;">
				<p></p>
				<p></p>
			</div>

			<div class="col-xs-12 col-md-3" style="border-left:#f0ad4e 3px solid;">
				<p></p>
				<p></p>
			</div> -->

		</article>
	</section>
<?};?>
<?php if ($_SESSION['esadmin']==3) {;?>
	<section class="container-fluid" id="header-estadisticas">
			<article class="row">
				<div class="col-sm-12 col-md-6 text-center header-estadisticas">
					<p>Total de Pedidos Activos</p>
					<p><strong><?php echo $countSolicitudActiva;?></strong></p>
				</div>

				<div class="col-sm-12 col-md-6 text-center header-estadisticas">
					<p>Total de Pedidos Finalizados</p>
					<p><strong><?php echo $countSolicitudFinalizada;?></strong></p>
				</div>

				<!-- <div class="col-xs-12 col-md-3" style="border-left:#f0ad4e 3px solid;">
					<p></p>
					<p></p>
				</div>

				<div class="col-xs-12 col-md-3" style="border-left:#f0ad4e 3px solid;">
					<p></p>
					<p></p>
				</div> -->

			</article>
	</section>
<?};?>	