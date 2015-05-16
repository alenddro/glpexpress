<?php 
	session_start();
	require_once('conexion.php'); 

	//mostrar todos los usuarios trabajadores (Camioneros)
	$sqlTrabajadores="select * from usuario where esadmin='1'";
	$ejecTrabajadores=mysql_query($sqlTrabajadores,$conexion);

	//mostrar los camiones que hay
	$sqlCamiones = "select * from camion";
	$ejecCamiones=mysql_query($sqlCamiones,$conexion);

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Habilitar Trabajador</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/estilos.css">
	<link href="css/sticky-footer.css" rel="stylesheet">
    <script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
</head>
<body>
	<?php
		require_once('isset/header.html');  
	?>
	<section id="oferta">
		<article>
			<form action="administrartrabajador2.php" method="POST" class="form_oferta">
				<br>
				<label>Seleccione Trabajador</label>
				<select name="trabajador" id="trabajador" class="form-control">
					<?php 
					while ($arrayTrabajador=mysql_fetch_array($ejecTrabajadores)) {;?>
						<option value="<?php echo $arrayTrabajador['id_usu']?>"><?php echo $arrayTrabajador['nombre_usu']?>&nbsp;<?php echo $arrayTrabajador['apellido_usu']?></option>	
					<?php };
					?>
				</select>
				<br>
				<label>Seleccione Camion</label>
				<select name="camion" id="camion" class="form-control">
					<?php 
					while ($arrayCamion=mysql_fetch_array($ejecCamiones)) {;?>
						<option value="<?php echo $arrayCamion['id_cam']?>"><?php echo $arrayCamion['marca_cam']?>&nbsp;<?php echo $arrayCamion['patente_cam']?></option>	
					<?php };
					?>
				</select>
				<br>
				<label>Descripcion Stock</label>
				<textarea name="stockcamion" placeholder="Ej: 3 gas 15Kg, 4 gas de 45 Kg, 1 gas de 5Kg..." class="form-control"></textarea>	
				<br>
				<input type="submit" class="btn btn-primary btn-block" value="ACTIVAR TRABAJADOR">
				<br>
			</form>
		</article>
	</section>
	<?php
		require_once('isset/footer.html');  
	?>
</body>
</html>