<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Agregar Oferta</title>
	<title>Home</title>
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
			<form action="agregaroferta2.php" enctype="multipart/form-data" method="POST" role="form" class="form_oferta">
				<div class="agregar-oferta">
					<div class="form-group">
						<label for="nombreOferta">Titulo Oferta</label>
						<input type="text" class="form-control" name="titulo_oferta" placeholder="ingrese Titulo de Oferta">
						<hr>
					</div>
					<div class="form-group">
						<label for="nombreImagen">Imagen Oferta</label>	
						<input type="file" class="form-control" name="ruta_oferta" placeholder="imagen del oferta">
						<hr>
					</div>	
					<div class="form-group">
						<label for="valoroferta">Valor Oferta</label>	
						<input type="text" class="form-control" name="valor_oferta" rows="10" placeholder="Ingrese Valor oferta ($)"></input>
						<hr>
					</div>	
					<div class="form-group">
						<label for="stockoferta">Stock Oferta</label>	
						<input type="text" class="form-control" name="stock_oferta" rows="10" placeholder="Ingrese Cantidad oferta"></input>
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