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

    <title>Registro Trabajador</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />

    <link rel="stylesheet" type="text/css" href="../css/estilos.css">
        
    <!-- Custom styles for this template -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">

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
          	<h3><i class="fa fa-angle-right"></i> Registro Trabajador</h3>
          	<div class="row mt">
          		<div class="col-lg-12">
          		 <div class="jumbotron" id="formulario-registro">
                  <section id="principal-registro" class="container-fluid">
                      <div class="row">
                          <div class="col-md-12">
                              <div class="container">
                                  <div class="row">
                                      <div class="col-xs-12">
                                          <div class="starter-template hidden-xs">
                                              <h1></h1>
                                              <p class="lead">Bienvenido! </p>
                                           </div>
                                           <div class="starter-template visible-xs-block hidden-lg hidden-md hidden-sm">
                                              <h2>Bienvenido a Registro Trabajadores</h2>

                                           </div>
                                      </div><!-- /.container -->


                                      <section class="container-fluid">
                                          <div class="row">
                                              <div class="col-xs-12 col-md-12 ">
                                                  <article class="container">
                                                      <div class="container-fluid">
                                                          <div class="row">
                                                              <div class="col-xs-12 head-registro">
                                                                   <h2 class="form-signin-heading">Porfavor Complete todos los campos</h2>
                                                              </div>
                                                          </div>
                                                      </div>
                                                      <form class="form-signin registro-lipigas" role="form" method="post" action="../registrar.php">
                                                        <input type="hidden" name="reg_trab">
                                                          <label>E-mail</label>
                                                          <input type="email" name="email" class="form-control" required="" autofocus="">
                                                          <br>
                                                          <br>
                                                          <label>Password</label>
                                                          <input type="password" name="password" class="form-control" required="">
                                                          <br>
                                                          <label>Repita Password</label>
                                                          <input type="password" name="reppassword" class="form-control" required="">
                                                          <br>
                                                          <label>Nombre</label>
                                                          <input type="text" name="nombre" class="form-control" required="" autofocus="">
                                                          <br>
                                                          <label>Apellido</label>
                                                          <input type="text" name="apellido" class="form-control" required="" autofocus="">
                                                          <br>
                                                          <label>Direccion</label>
                                                          <input type="text" name="direccion" class="form-control" required="" autofocus="">
                                                          <br>
                                                          <label>Telefono</label>
                                                          <input type="tel" name="telefono" class="form-control" required="" autofocus="">
                                                          <label>Tipo de Tarbajador</label>
                                                          <br>
                                                          <select name="tipo_trabajador" class="col-xs-12" style="border-radius:3px;height:35px;" id="tipo_trabajador">
                                                              <option value="1">Trabajador</option>
                                                              <option value="3">Secretaria</option>
                                                          </select>
                                                          <br>
                                                          <br>
                                                          <br>
                                                          <button class="btn btn-lg btn-warning btn-block" type="submit">Registrarme!</button>
                                                      </form>

                                                  </article>
                                              </div>
                                          </div>
                                      </section>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </section>
              </div>
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
