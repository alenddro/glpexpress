 <?php

// //Consulta total de usuarios
	
// 	$sqlTotalUsuarios = "select * from usuario where esadmin = 0";
// 	$ejecTotalUsuarios = mysql_query($sqlTotalUsuarios, $conexion);
// 	$countTotalUsuarios = mysql_num_rows($ejecTotalUsuarios);
	
// 	//Consulta total de Trabajadores

// 	$sqlTotalTrabajadores = "select * from usuario where (esadmin = 1 or esadmin=3)";
// 	$ejecTotalTrabajadores = mysql_query($sqlTotalTrabajadores, $conexion);
// 	$countTotalTrabajadores = mysql_num_rows($ejecTotalTrabajadores);

// 	//consulta total de Pedidos Activos

// 	$sqlSolicitudActiva="select producto.*, solicitud.* from solicitud, producto where producto.id_prod=solicitud.producto_id_soli and solicitud.estado_solicitud_soli='activo' order by solicitud.fec_solicitud_soli desc";
//     $ejecSolicitudActiva=mysql_query($sqlSolicitudActiva, $conexion);
//     $countSolicitudActiva = mysql_num_rows($ejecSolicitudActiva);


	
// 	//consulta total de Pedidos Finalizados

// 	$sqlSolicitudFinalizada="select producto.*, solicitud.* from solicitud, producto where producto.id_prod=solicitud.producto_id_soli and (solicitud.estado_solicitud_soli='finalizado' or solicitud.estado_solicitud_soli='oculto') order by solicitud.fec_solicitud_soli desc";
//     $ejecSolicitudFinalizada=mysql_query($sqlSolicitudFinalizada, $conexion);
//     $countSolicitudFinalizada = mysql_num_rows($ejecSolicitudFinalizada);

 ?>
