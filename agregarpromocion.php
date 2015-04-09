<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Agregar Promocion</title>
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
			<form action="agregarpromocion2.php" enctype="multipart/form-data" method="POST" role="form" class="form_oferta">
				<div class="agregar-oferta">
					<div class="form-group">
						<label for="nombreOferta">Titulo promocion</label>
						<input type="text" class="form-control" name="titulo_promocion" placeholder="ingrese Titulo de promocion">
						<hr>
					</div>
					<div class="form-group">
						<label for="nombreImagen">Imagen promocion</label>	
						<input type="file" class="form-control" name="ruta_img_promocion" placeholder="imagen del promocion">
						<hr>
					</div>	
					<div class="form-group">
						<label for="valorpromocion">Valor promocion</label>	
						<input type="text" class="form-control" name="valor_promocion" rows="10" placeholder="Ingrese Valor promocion ($)"></input>
						<hr>
					</div>	
					<div class="form-group">
						<label for="stockpromocion">Stock promocion</label>	
						<input type="text" class="form-control" name="stock_promocion" rows="10" placeholder="Ingrese Cantidad promocion"></input>
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