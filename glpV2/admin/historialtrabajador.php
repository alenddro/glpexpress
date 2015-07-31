<?php 
session_start();
header('Content-Type: text/html; charset=ISO-8859-1');
require_once('../conexion.php');
require_once('../admin/assets/function/arreglarhorafecha.php'); 


			$sqlHistorialTrabajadores="SELECT * FROM registro_trab_activos, usuario WHERE usuario.id_usu=registro_trab_activos.id_trab_activo_reg_activo ORDER BY fec_asignacion_trab_activo_reg_activo desc" ;
			$ejecHistorialTrabajadores=mysql_query($sqlHistorialTrabajadores);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>Historial Trabajadores</title>

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
	            <h3><i class="fa fa-angle-right"></i> Historial Trabajadores</h3>
	            <div class="row mt">
	                <div class="col-lg-12">
	                    <div class="row mt">
	                      <div class="col-md-12">
	                          <div class="content-panel">
	                              <table class="table table-striped table-advance table-hover ">
	                                  <hr>
	                                  <thead>
	                                  <tr>
	                                      <th><i class="fa fa-bullhorn"></i> Nombre</th>
	                                      <th><i class="fa"></i> Hora Inicio Turno</th>
                                        <th><i class="fa"><b></b></i> Hora Fin Turno</th>
                                        <th><i class="fa"><b></b></i> Stock Inicial Desglose</th>
                                        <th><i class="fa"><b></b></i> Stock Inicial</th>
                                        <th><i class="fa"><b></b></i> Stock Final Desglose</th>
	                                      <th><i class="fa"><b></b></i> Stock Final</th>
	                                  </tr>
	                                  </thead>
	                                  <tbody>
	                                    <?php while ($arrayListarTrabajadoresSistema=mysql_fetch_array($ejecHistorialTrabajadores)){; ?>
	                                  <tr>
	                                      <td><a href="javascript:;"><?php echo $arrayListarTrabajadoresSistema['nombre_usu'] ." ". $arrayListarTrabajadoresSistema['apellido_usu']; ?></a></td>
	                                      <td><?php separarHoraFechaOrdenar($arrayListarTrabajadoresSistema['fec_asignacion_trab_activo_reg_activo']);?></td>
                                        <td><?php separarHoraFechaOrdenar($arrayListarTrabajadoresSistema['fec_asignacion_fin_trab_activo_reg_activo']);?></td>
                                        <td><?php echo $arrayListarTrabajadoresSistema['stock_gas_original_trab_activo_reg_activo'];?></td>
                                        <td><?php echo $arrayListarTrabajadoresSistema['stock_camion_trab_activo_reg_activo'];?></td>
                                        <td><?php echo $arrayListarTrabajadoresSistema['stock_original_final_camion_trab_activo_reg_activo'];?></td>
	                                      <td><?php echo $arrayListarTrabajadoresSistema['stock_final_camion_trab_activo_reg_activo'];?></td>
	                                  </tr>
	                                  <?php }; ?>
	                                  </tbody>
	                              </table>
	                          </div><!-- /content-panel -->
	                      </div><!-- /col-md-12 -->
	                  </div><!-- /row -->
	                </div>
	            </div>

	        </section><!--/wrapper -->
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
