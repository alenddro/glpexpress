<?php 
session_start();
header('Content-Type: text/html; charset=ISO-8859-1');
require_once('../conexion.php');   

    $sqlTotalTrabajadores = "select * from usuario where (esadmin = 1 or esadmin = 3) ";
    $ejecTotalTrabajadores = mysql_query($sqlTotalTrabajadores, $conexion);
    $countTotalTrabajadores = mysql_num_rows($ejecTotalTrabajadores);

  //consulta total de Pedidos Activos

    $sqlSolicitudActiva="select producto.*, solicitud.* from solicitud, producto where producto.id_prod=solicitud.producto_id_soli and solicitud.estado_solicitud_soli='activo' order by solicitud.fec_solicitud_soli desc";
    $ejecSolicitudActiva=mysql_query($sqlSolicitudActiva, $conexion);
    $countSolicitudActiva = mysql_num_rows($ejecSolicitudActiva);



  //consulta total de Pedidos Finalizados

    $sqlSolicitudFinalizada="select producto.*, solicitud.* from solicitud, producto where producto.id_prod=solicitud.producto_id_soli and (solicitud.estado_solicitud_soli='finalizado' or solicitud.estado_solicitud_soli='oculto') order by solicitud.fec_solicitud_soli desc";
    $ejecSolicitudFinalizada=mysql_query($sqlSolicitudFinalizada, $conexion);
    $countSolicitudFinalizada = mysql_num_rows($ejecSolicitudFinalizada);

    //consulta total de soliciuted por cada trabajador

    $sqlTotalSolicitudesPorTrabajador ="select finalizado_por_soli,COUNT(*) from solicitud where (estado_solicitud_soli='finalizado' or solicitud.estado_solicitud_soli='oculto') group by finalizado_por_soli";
    $ejecTotalSolicitudesPorTrabajador = mysql_query($sqlTotalSolicitudesPorTrabajador, $conexion);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>Estadisticas Trabajaor</title>

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
          	<h3><i class="fa fa-angle-right"></i> Estadisticas del Sistema</h3>
          	<div class="row mt">
          		<div class="col-lg-12">
          		  <section class="container-fluid">
                  <article class="row">
                    <div class="container">
                      <div class="row">
                        <table class="table table-hover">
                          <thead>
                            <tr>
                              <th>#</th>
                              <th>Totales</th>
                              <caption><h1>Estadisticas del Sistema</h1></caption>
                            </tr>
                          </thead>
                          <tr>
                            <td>Total de Trabajadores</td>
                            <td><?php echo $countTotalTrabajadores;?></td>
                          </tr>
                          <tr>
                            <td>Total de Pedidos Activos</td>
                            <td><?php echo $countSolicitudActiva;?></td>
                          </tr>
                          <tr>
                            <td>Total de Pedidos Finalizados</td>
                            <td><?php echo $countSolicitudFinalizada;?></td>
                          </tr>
                          <tr>
                            <td><?php //agregar mas opciones?></td>
                            <td><?php //agregar mas opciones?></td>
                          </tr>
                        </table>
                      </div>
                    </div>
                  </article>
                </section>

                <section class="container-fluid">
                  <article class="row">
                    <div class="container">
                      <div class="row">
                        <table class="table table-hover">
                          <thead>
                            <tr>
                              <th>#</th>
                              <th>Totales</th>
                              <caption><h1>Totales De Solicitudes Por Trabajador Finalizadas</h1></caption>
                            </tr>
                          </thead>
                          <?php while($arrayTotalSolicitudesPorTrabajador=mysql_fetch_array($ejecTotalSolicitudesPorTrabajador)){?>
                            <tr>
                              <?php
                                $id_trabajador = $arrayTotalSolicitudesPorTrabajador['finalizado_por_soli'];
                                $sqlNombreApellidoTrabajador = "select nombre_usu, apellido_usu from usuario where id_usu='$id_trabajador' and esadmin='1' ";
                                $ejecNombreApellidoTrabajador = mysql_query($sqlNombreApellidoTrabajador, $conexion);

                              ?>
                                <?php
                                  while($arrayNombreApellidoTrabajador=mysql_fetch_array($ejecNombreApellidoTrabajador)){
                                ?>
                                <td><?php echo $arrayNombreApellidoTrabajador['nombre_usu'] ." ". $arrayNombreApellidoTrabajador['apellido_usu'] ;?></td>
                              <?php } ?>
                              <td><?php echo $arrayTotalSolicitudesPorTrabajador['COUNT(*)'];?></td>
                            </tr>
                          <?php }?>
                        </table>
                    </div>
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
