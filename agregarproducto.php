<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Agregar Producto</title>
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
	<section id="producto">
		<article>
			<form action="agregarproducto2.php" enctype="multipart/form-data" method="POST" role="form" class="form_producto">
				<div class="agregar-producto">
					<div class="form-group">
						<label for="nombreProducto">Nombre Producto</label>
						<input type="text" class="form-control" name="nombre_prod" placeholder="ingrese nombre del producto">
						<hr>
					</div>
					<div class="form-group">
						<label for="nombreImagen">Imagen</label>	
						<input type="file" class="form-control" name="ruta_prod" placeholder="imagen del producto">
						<hr>
					</div>	
					<div class="form-group">
						<label for="valorProducto">Valor Producto</label>	
						<input type="text" class="form-control" name="valor_prod" rows="10" placeholder="Ingrese Valor producto ($)"></input>
						<hr>
					</div>	
					<div class="form-group">
						<label for="stockProducto">Stock Producto</label>	
						<input type="text" class="form-control" name="stock_prod" rows="10" placeholder="Ingrese Cantidad producto"></input>
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