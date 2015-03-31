<?php session_start();
header('Content-Type: text/html; charset=ISO-8859-1');
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

	$sqlSolicitudFinalizada="select producto.*, solicitud.* from solicitud, producto where producto.id_prod=solicitud.producto_id_soli and solicitud.estado_solicitud_soli='finalizado' order by solicitud.fec_solicitud_soli desc";
    $ejecSolicitudFinalizada=mysql_query($sqlSolicitudFinalizada, $conexion);
    $countSolicitudFinalizada = mysql_num_rows($ejecSolicitudFinalizada);

    //consulta total de soliciuted por cada trabajador

    $sqlTotalSolicitudesPorTrabajador ="select finalizado_por_soli,COUNT(*) from solicitud where estado_solicitud_soli='finalizado' group by finalizado_por_soli";
    $ejecTotalSolicitudesPorTrabajador = mysql_query($sqlTotalSolicitudesPorTrabajador, $conexion);



?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Estadisticas</title>
		<meta charset="UTF-8">
	    <title>Registro | GLPEXPRESS</title>
	    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	    <link rel="stylesheet" type="text/css" href="css/estilos.css">
	</head>
	<body>
		<header>
	        <div class="navbar navbar-inverse navbar-fixed-top" id="nav-lipigas" role="navigation">
	          <div class="container">
	            <div class="navbar-header">
	              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
	                <span class="sr-only">Toggle navigation</span>
	                <span class="icon-bar"></span>
	                <span class="icon-bar"></span>
	                <span class="icon-bar"></span>
	              </button>
	              <a class="logotipo" href="#"><img src="img/logotipo.png" class="img-responsive" alt="logotipo"></a>
	            </div>
	            <div class="collapse navbar-collapse navbar-right">
	              <ul class="nav navbar-nav">
	                <li class="active"><a href="index.html">Home</a></li>
	              </ul>
	            </div><!--/.nav-collapse -->
	          </div>
	        </div>
	    </header>

	    <section id="usuLogueado" class="container">
	        <div class="row">
	            <div class="col-xs-12">
	                <a href="cierra_session.php">Cerrar Sesion</a>
	                <br>
	                <a href="administrar.php">Volver a Menu Pricipal</a>
	            </div>
	        </div>     
	    </section>
		
		<section class="container-fluid">
			<article class="row">
				<div class="container">
					<div class="row">
						<table class="table table-hover">
							<thead>		
								<tr>
									<th>#</th>
									<th>Totales</th>
									<caption><h1>Estadisticas del Sistema</h1></caption>
								</tr>
							</thead>
							<tr>
								<td>Total de Usuarios</td>
								<td><?php echo $countTotalUsuarios;?></td>
							</tr>
							<tr>
								<td>Total de Trabajadores</td>
								<td><?php echo $countTotalTrabajadores;?></td>
							</tr>
							<tr>
								<td>Total de Pedidos Activos</td>
								<td><?php echo $countSolicitudActiva;?></td>
							</tr>
							<tr>
								<td>Total de Pedidos Finalizados</td>
								<td><?php echo $countSolicitudFinalizada;?></td>
							</tr>
							<tr>
								<td><?php //agregar mas opciones?></td>
								<td><?php //agregar mas opciones?></td>
							</tr>
						</table>
					</div>
				</div>
			</article>
		</section>

		<section class="container-fluid">
			<article class="row">
				<div class="container">
					<div class="row">
						<table class="table table-hover">
							<thead>		
								<tr>
									<th>#</th>
									<th>Totales</th>
									<caption><h1>Totales De Solicitudes Por Trabajador Finalizadas</h1></caption>
								</tr>
							</thead>
							<?php while($arrayTotalSolicitudesPorTrabajador=mysql_fetch_array($ejecTotalSolicitudesPorTrabajador)){?>
								<tr>
									<?php 
									
										$id_trabajador = $arrayTotalSolicitudesPorTrabajador['finalizado_por_soli'];
										$sqlNombreApellidoTrabajador = "select nombre_usu, apellido_usu from usuario where id_usu='$id_trabajador' and esadmin='1' ";
										$ejecNombreApellidoTrabajador = mysql_query($sqlNombreApellidoTrabajador, $conexion);
										
									?>
								    <?php
								   		while($arrayNombreApellidoTrabajador=mysql_fetch_array($ejecNombreApellidoTrabajador)){
								    ?>
										<td><?php echo $arrayNombreApellidoTrabajador['nombre_usu'] ." ". $arrayNombreApellidoTrabajador['apellido_usu'] ;?></td>
									<?php } ?>
									<td><?php echo $arrayTotalSolicitudesPorTrabajador['COUNT(*)'];?></td>
								</tr>
							<?php }?>	
						</table>			
				</div>
			</article>
		</section>
		<?php require_once("isset/footer.html");?>
		
	</body>
</html>