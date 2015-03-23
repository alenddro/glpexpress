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
	<section id="form_producto">
		<article>
			<form action="agregarproducto2.php" enctype="multipart/form-data" method="POST">
				<div class="agregar-producto">
					<input type="text" name="nombre_prod" placeholder="Nombre del producto">
					<br><hr>
					<input type="file" name="ruta_prod" placeholder="imagen del producto">
					<br><hr>
					<input type="text" name="valor_prod" rows="10" placeholder="Valor producto ($)"></input>
					<br><hr>
					<input type="text" name="stock_prod" rows="10" placeholder="Cantidad producto"></input>
					<br><hr>
					<button type="submit" >Guardar</button>
				</div>
			</form>
		</article>
	</section>

	
</body>
</html>