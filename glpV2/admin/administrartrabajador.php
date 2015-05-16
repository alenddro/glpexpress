<?php 
session_start();
header('Content-Type: text/html; charset=ISO-8859-1');
require_once('../conexion.php'); 
	
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
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>Activar Trabajador</title>

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
          	<h3><i class="fa fa-angle-right"></i> Activar Trabajador</h3>
          	<div class="row mt">
          		<div class="col-lg-12">
          			<section id="oferta">
						<article>
							<form action="../administrartrabajador2.php" method="POST" class="form_oferta">
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
					</section>          		</div>
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
