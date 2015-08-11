<?php 
		require_once('../../../conexion.php');
		$fechahorahoy= date("Y-m-d");
		//Seleccionamos las solicitudes activas que sean de la fecha de hoy que tengan un motivo de rechazo
        $sqlSolicitudesActivasRechazo="SELECT * from solicitud where DATE_FORMAT(fec_solicitud_soli, '%Y-%m-%d')='$fechahorahoy' and motivo_rech_soli!='' and estado_solicitud_soli='activo' order by id_soli desc limit 5";
        $ejecSolicitudesActivasRechazo=mysql_query($sqlSolicitudesActivasRechazo,$conexion);
	
	while ($arraySolicitudesActivasRechazo=mysql_fetch_array($ejecSolicitudesActivasRechazo)) {; ?>                      
  <!-- First Action -->
	  <?php 
	    $id_nombre_usuario = $arraySolicitudesActivasRechazo['asignado_a_soli'];
	    $seleccionarnombresolicitud="select * from usuario where id_usu='$id_nombre_usuario'";
	    $ejecseleccionarnombresolicitud=mysql_query($seleccionarnombresolicitud,$conexion);
	    $arrayseleccionarnombresolicitud=mysql_fetch_array($ejecseleccionarnombresolicitud);
	  ?>
	  <div class="desc">
	  	<div class="thumb">
	  		<span class="badge bg-theme"><i class="fa fa-clock-o"></i></span>
	  	</div>
	  	<div class="details">
	      <h6>Rechaso Solicitud N: <?php echo $arraySolicitudesActivasRechazo['id_soli']; ?></h6>
	  		<p><muted>Hora solicitud: <?php echo $arraySolicitudesActivasRechazo['fec_solicitud_soli']; ?></muted><br/>
	  		   <a href="javascript:;"style="text-transform:uppercase;"><?php echo $arrayseleccionarnombresolicitud['nombre_usu']." ". $arrayseleccionarnombresolicitud['apellido_usu']; ?></a><br/> Motivo: <?php echo $arraySolicitudesActivasRechazo['motivo_rech_soli']; ?><br/>
	  		</p>
	  	</div>
	  </div>
<?php };  ?> 