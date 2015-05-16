<?php 
session_start();
header('Content-Type: text/html; charset=ISO-8859-1');
require_once('../conexion.php');   
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>Agregar Camiones</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
        
    <!-- Custom styles for this template -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="../css/estilos.css">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

  <section id="container" >
      <!-- **********************************************************************************************************************************************************
      TOP BAR CONTENT & NOTIFICATIONS
      *********************************************************************************************************************************************************** -->
      <?php 
        require_once("assets/content/header-content.php");
      ?>
      <!-- **********************************************************************************************************************************************************
      MAIN SIDEBAR MENU
      *********************************************************************************************************************************************************** -->
      <?php 
        require_once("assets/content/navbar-left-content.php");
      ?>
      
      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper site-min-height">
          	<h3><i class="fa fa-angle-right"></i> Agregar Camiones</h3>
          	<div class="row mt">
          		<div class="col-lg-12">
          			<section id="oferta">
						<article>
							<form action="../agregarcamion2.php" enctype="multipart/form-data" method="POST" role="form" class="form_oferta">
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
									<button type="submit" class="btn btn-primary">Guardar</button>
								</div>
							</form>
						</article>
					</section>
          		</div>
          	</div>
			
		</section><! --/wrapper -->
      </section><!-- /MAIN CONTENT -->

      <!--main content end-->
      <!--footer start-->
      <?php 
        require_once("assets/content/footer-content.php");
      ?>
      <!--footer end-->
  </section>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery-ui-1.9.2.custom.min.js"></script>
    <script src="assets/js/jquery.ui.touch-punch.min.js"></script>
    <script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="assets/js/jquery.scrollTo.min.js"></script>
    <script src="assets/js/jquery.nicescroll.js" type="text/javascript"></script>


    <!--common script for all pages-->
    <script src="assets/js/common-scripts.js"></script>

    <!--script for this page-->
    
  <script>
      //custom select box

      $(function(){
          $('select.styled').customSelect();
      });

  </script>

  </body>
</html>
