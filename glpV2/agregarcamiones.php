<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Agregar Camión</title>
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
			<form action="agregarcamion2.php" enctype="multipart/form-data" method="POST" role="form" class="form_oferta">
				<div class="agregar-oferta">
					<div class="form-group">
						<label for="nombreOferta">Marca</label>
						<input type="text" class="form-control" name="marca_cam" placeholder="ingrese Marca del Camion">
						<hr>
					</div>
					<div class="form-group">
						<label for="nombreOferta">Modelo</label>
						<input type="text" class="form-control" name="modelo_cam" placeholder="ingrese Modelo del Camion">
						<hr>
					</div>
					<div class="form-group">
						<label for="nombreOferta">Patente</label>
						<input type="text" class="form-control" name="patente_cam" placeholder="ingrese Patente del Camion">
						<hr>
					</div>
					<div class="form-group">
						<label for="nombreOferta">Año</label>
						<select name="ano_cam" class="form-control">
							<?php for ($i=1960; $i < 2016 ; $i++) {
								echo"<option value='$i'>$i</option>";
							};?>
						</select>
						<hr>
					</div>
					<div class="form-group">
						<label for="nombreOferta">Papeles</label>
						<select name="papeles_cam" class="form-control">
							<option value="dia">Al Dia</option>
							<option value="atrazo">Atrazados</option>
						</select>
						<hr>
					</div>
					<div class="form-group">
						<label for="nombreImagen">Imagen Camión</label>	
						<input type="file" class="form-control" name="ruta_img_cam" placeholder="imagen del camion">
						<hr>
					</div>	
					<div class="form-group">
						<label for="valoroferta">Descripción Camion</label>	
						<textarea name="descripcion_cam" class="form-control"></textarea>
						<hr>
					</div>	
					<div class="form-group">
						<label for="valoroferta">Dueño</label>	
						<input type="text" class="form-control" name="dueno_cam" placeholder="Ingrese el Nombre del dueño del camion">
						<hr>
					</div>	
					<button type="submit" class="btn btn-default">Guardar</button>
				</div>
			</form>
		</article>
	</section>
	<?php require_once("isset/footer.html");?>

	
</body>
</html>