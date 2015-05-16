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

    <title>Agregar Producto</title>

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
          	<h3><i class="fa fa-angle-right"></i> Agregar Producto</h3>
          	<div class="row mt">
          		<div class="col-lg-12">
          			<section id="producto">
						<article>
							<form action="../agregarproducto2.php" enctype="multipart/form-data" method="POST" role="form" class="form_producto">
								<div class="agregar-producto">
									<div class="form-group">
										<label for="nombreProducto">Nombre Producto</label>
										<input type="text" class="form-control" name="nombre_prod" placeholder="ingrese nombre del producto">
										<hr>
									</div>
                  <div class="form-group">
                    <label for="nombreProducto">Descripcion del Producto</label>
                    <input type="text" class="form-control" name="descrip_prod" placeholder="ingrese descripcion del producto">
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
