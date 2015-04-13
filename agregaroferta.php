<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Agregar Oferta</title>
	<link rel="stylesheet" href="css/bootstrap-datetimepicker.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/estilos.css">
	<link href="css/sticky-footer.css" rel="stylesheet">
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
						<label for="nombreoferta">Titulo Oferta</label>
						<input type="text" class="form-control" name="titulo_oferta" placeholder="ingrese Titulo de Oferta">
						<hr>
					</div>
					<div class="form-group">
						<label for="descripoferta">Descripción Oferta</label>
						<input type="text" class="form-control" name="descrip_oferta" placeholder="ingrese Desccripción de Oferta">
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
					<div class="form-group">
		                <label for="dtp_input1">Fin Fecha De Oferta</label>
		                <div class="input-group date form_datetime col-xs-12"  data-date-format="dd MM yyyy - HH:ii p" data-link-field="dtp_input1">
		                    <input class="form-control" size="16" type="text" value="" readonly>
		                    <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
							<span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
		                </div>
						<input type="hidden" id="dtp_input1" value="" /><br/>
		            </div>
					<button type="submit" class="btn btn-default">Guardar</button>
				</div>
			</form>
		</article>
	</section>
	<?php require_once("isset/footer.html");?>

	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
	<script type="text/javascript" src="js/locales/bootstrap-datetimepicker.es.js" charset="UTF-8"></script>
	<script type="text/javascript">
	    $('.form_datetime').datetimepicker({
	        //language:  'es',
	        weekStart: 1,
	        todayBtn:  1,
			autoclose: 1,
			todayHighlight: 1,
			startView: 2,
			forceParse: 0,
	        showMeridian: 1
	    });
	</script>
	
</body>
</html>