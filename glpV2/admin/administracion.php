<?php
session_start();
header('Content-Type: text/html; charset=ISO-8859-1');
require_once('../conexion.php');   
require_once('../isset/header-estadisticas.php');   

  if ($conexion) {

      $fechahorahoy= date("Y-m-d");
      $todook="OK!";
      $nombremaximo="";
      $fecharegistro="";
      $maximocuenta="";

           // Con esta sentencia SQL mostraremos el peso de cada tabla los datos en la base de datos 
      $resultado = "SHOW TABLE STATUS"; 
      $ejecresultado=mysql_query($resultado, $conexion);

      $total = 0; 
        while ($tabla = mysql_fetch_assoc($ejecresultado)) 
         $total += ($tabla['Data_length']+$tabla['Index_length']); 
         $total_temp = $total / 1024; 
         $total_kb = number_format($total_temp, 0, ",", ".")+1; 
      // aca termina la consulta para tamño de la base de datos 
      // despues lo de simpre 
          $pesoBD=$total_kb;  

       //consulta total de soliciuted por cada trabajador
      $sqlTotalSolicitudesPorTrabajador ="select finalizado_por_soli,COUNT(*) from solicitud where (estado_solicitud_soli='finalizado' or solicitud.estado_solicitud_soli='oculto') group by finalizado_por_soli LIMIT 1";
      $ejecTotalSolicitudesPorTrabajador = mysql_query($sqlTotalSolicitudesPorTrabajador, $conexion);  
        while($arrayTotalSolicitudesPorTrabajador=mysql_fetch_array($ejecTotalSolicitudesPorTrabajador)){

            $id_trabajador = $arrayTotalSolicitudesPorTrabajador['finalizado_por_soli'];
            $sqlNombreApellidoTrabajador = "select nombre_usu, apellido_usu, registrado_el from usuario where id_usu='$id_trabajador' and esadmin='1' ";
            $ejecNombreApellidoTrabajador = mysql_query($sqlNombreApellidoTrabajador, $conexion);
              while($arrayNombreApellidoTrabajador=mysql_fetch_array($ejecNombreApellidoTrabajador)){

                $nombremaximo = $arrayNombreApellidoTrabajador['nombre_usu'] ." ". $arrayNombreApellidoTrabajador['apellido_usu'];
                $fecharegistro= $arrayNombreApellidoTrabajador['registrado_el'];
              }

            $maximocuenta= $arrayTotalSolicitudesPorTrabajador['COUNT(*)'];
        }


      //Seleccionamos las solicitudes activas que sean de la fecha de hoy que tengan un motivo de rechazo
      $sqlSolicitudesActivasRechazo="SELECT * from solicitud where DATE_FORMAT(fec_solicitud_soli, '%Y-%m-%d')='$fechahorahoy' and motivo_rech_soli!='' and estado_solicitud_soli='activo' order by id_soli desc limit 5";
      $ejecSolicitudesActivasRechazo=mysql_query($sqlSolicitudesActivasRechazo,$conexion);

      //listado trabajadores activos
      $sqlListadoTrabajadores="select * from usuario,trabajadoractivo where usuario.esadmin='1' and usuario.id_usu=trabajadoractivo.id_trab_activo order by usuario.id_usu desc";
      $ejecListadoTrabajadores=mysql_query($sqlListadoTrabajadores, $conexion);
      
  
  }else{
      $todook="Algo Anda Mal!";
  }


?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>Administraci&oacute;n</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="assets/css/zabuto_calendar.css">
    <link rel="stylesheet" type="text/css" href="assets/js/gritter/css/jquery.gritter.css" />
    <link rel="stylesheet" type="text/css" href="assets/lineicons/style.css">    
    
    <!-- Custom styles for this template -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">

    <script src="assets/js/chart-master/Chart.js"></script>
    
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
      <?php if ($_SESSION['esadmin']==2) {;?>
      <section id="main-content">
          <section class="wrapper">

              <div class="row">
                  <div class="col-lg-9 main-chart">
                  
                  	<div class="row mtbox">
                  		<div class="col-md-2 col-sm-2 col-md-offset-1 box0">
                  			<div class="box1">
					  			<span class="li_heart"></span>
					  			<h3><?php echo $countTotalUsuarios;?></h3>
                  			</div>
					  			<p><?php echo $countTotalUsuarios;?> Usuarios registrados en el sistema.!</p>
                  		</div>
                  		<div class="col-md-2 col-sm-2 box0">
                  			<div class="box1">
					  			<span class="li_cloud"></span>
					  			<h3><?php echo $countTotalTrabajadores;?></h3>
                  			</div>
					  			<p><?php echo $countTotalTrabajadores;?> Trabajadores registrados en el sistema.!</p>
                  		</div>
                  		<div class="col-md-2 col-sm-2 box0">
                  			<div class="box1">
					  			<span class="li_stack"></span>
					  			<h3><?php echo $countSolicitudActiva;?></h3>
                  			</div>
					  			<p><?php echo $countSolicitudActiva;?> Pedidos Activos.</p>
                  		</div>
                  		<div class="col-md-2 col-sm-2 box0">
                  			<div class="box1">
					  			<span class="li_news"></span>
					  			<h3><?php echo $countSolicitudFinalizada;?></h3>
                  			</div>
					  			<p><?php echo $countSolicitudFinalizada;?> Pedidos Finalizados.</p>
                  		</div>
                  		<div class="col-md-2 col-sm-2 box0">
                  			<div class="box1">
					  			<span class="li_data"></span>
					  			<h3><?php echo  $todook; ?></h3>
                  			</div>
					  			<p><?php echo  $todook; ?> | En caso de consultas comunicarce con el Administrador.</p>
                  		</div>
                  	
                  	</div><!-- /row mt -->	
      <?php };?>
      <?php if ($_SESSION['esadmin']==3) {;?>
                     <section id="main-content">
          <section class="wrapper">

              <div class="row">
                  <div class="col-lg-9 main-chart">
                  
                    <div class="row mtbox">
                      <div class="col-md-2 col-sm-2 col-md-offset-1 box0">
                        <div class="box1">
                  <span class="li_heart"></span>
                  <h3></h3>
                        </div>
                  <p></p>
                      </div>
                      <div class="col-md-2 col-sm-2 box0">
                        <div class="box1">
                  <span class="li_cloud"></span>
                  <h3></h3>
                        </div>
                  <p></p>
                      </div>
                      <div class="col-md-2 col-sm-2 box0">
                        <div class="box1">
                  <span class="li_stack"></span>
                  <h3><?php echo $countSolicitudActiva;?></h3>
                        </div>
                  <p><?php echo $countSolicitudActiva;?> Pedidos Activos.</p>
                      </div>
                      <div class="col-md-2 col-sm-2 box0">
                        <div class="box1">
                  <span class="li_news"></span>
                  <h3><?php echo $countSolicitudFinalizada;?></h3>
                        </div>
                  <p><?php echo $countSolicitudFinalizada;?> Pedidos Finalizados.</p>
                      </div>
                      <div class="col-md-2 col-sm-2 box0">
                        <div class="box1">
                  <span class="li_data"></span>
                  <h3><?php echo  $todook; ?></h3>
                        </div>
                  <p><?php echo  $todook; ?> | En caso de consultas comunicarce con el Administrador.</p>
                      </div>
                    
                    </div><!-- /row mt -->  
     <?php }; ?>
                      <div class="row mt">
                      <!-- SERVER STATUS PANELS -->
                      	<div class="col-md-4 col-sm-4 mb">
                      		<div class="white-panel pn donut-chart">
                      			<div class="white-header">
						  			<h5>El peso de BD es <?php echo $pesoBD ?>KB</h5>
                      			</div>
								<div class="row">
									<div class="col-sm-6 col-xs-6 goleft">
                    <?php 
                      $valorTotalBD=  10485760;


                      $porcentocupado= $total_kb * 100 / $valorTotalBD;
                      $porcentfaltante = 100 - $porcentocupado;


                    ?>
										<p><i class="fa fa-database"></i> <?php echo $pesoBD?>KB</p>
									</div>
	                      		</div>
								<canvas id="serverstatus01" height="120" width="120"></canvas>
								<script>
									var doughnutData = [
											{
												value: <?php echo $porcentocupado; ?>,
												color:"#68dff0"
											},
											{
												value : <?php echo $porcentfaltante; ?>,
												color : "#fdfdfd"
											}
										];
										var myDoughnut = new Chart(document.getElementById("serverstatus01").getContext("2d")).Doughnut(doughnutData);
								</script>
	                      	</div><!--/grey-panel -->
                      	</div><!-- /col-md-4-->
                      	

                      	<div class="col-md-4 col-sm-4 mb">
                      		<div class="white-panel pn">
                      			<div class="white-header">
						  			<h5>TOP PRODUCT</h5>
                      			</div>
								<div class="row">
									<div class="col-sm-6 col-xs-6 goleft">
										<p><i class="fa fa-heart"></i> 122</p>
									</div>
									<div class="col-sm-6 col-xs-6"></div>
	                      		</div>
	                      		<div class="centered">
										<img src="assets/img/product.png" width="120">
	                      		</div>
                      		</div>
                      	</div><!-- /col-md-4 -->

						<div class="col-md-4 mb">
							<!-- WHITE PANEL - TOP USER -->
							<div class="white-panel pn">
								<div class="white-header">
									<h5>Trabajador Destacado</h5>
								</div>
								<p><img src="assets/img/ui-zac.jpg" class="img-circle" width="80"></p>
								<p><b><?php echo $nombremaximo; ?></b></p>
								<div class="row">
									<div class="col-md-6">
										<p class="small mt">Empezo</p>
										<p><?php echo $fecharegistro;?></p>
									</div>
									<div class="col-md-6">
										<p class="small mt">SOLICITUDES FINALIZADAS</p>
										<p><?php echo $maximocuenta; ?></p>
									</div>
								</div>
							</div><!-- END WHITE PANEL - TOP USER -->
						</div><!-- /col-md-4 -->


                    </div><!-- /row -->

					<div class="row">
						<!-- TWITTER PANEL -->
						<div class="col-md-4 mb">
            		<div class="darkblue-panel pn">
            			<div class="darkblue-header">
	  			            <h5 style="text-transform:uppercase;">TOTAL DE VISITAS MES : <?php echo date("M"); ?></h5>
                      <div>De 10.000 visitas usted tiene:</div>
                      <?php 
                          $mesActual = date('m');
                          $sqlSum = "select SUM(times) as totalvisitas from todas where EXTRACT(month FROM fec_vista)=$mesActual";
                          $ejecSqlSum= mysql_query($sqlSum, $conexion);
                          $arraysqlSum =mysql_fetch_array($ejecSqlSum, MYSQL_ASSOC);

                          $porcentajetotalmes = ($arraysqlSum["totalvisitas"] * 100) / 10000;

                          $porcentajesobrantemes =  100-$porcentajetotalmes;
                      ?>
            			</div>
								<canvas id="serverstatus02" height="120" width="120"></canvas>
								<script>
									var doughnutData = [
											{
												value: <?php echo $porcentajetotalmes; ?>,
												color:"#68dff0"
											},
											{
												value : <?php echo $porcentajesobrantemes; ?>,
												color : "#444c57"
											}
										];
										var myDoughnut = new Chart(document.getElementById("serverstatus02").getContext("2d")).Doughnut(doughnutData);
								</script>
								<div><?php echo date("d-m-Y"); ?></div>
								<footer>
									<div class="pull-left">
										<h5><i class="fa fa-hdd-o"></i> <?php echo $arraysqlSum["totalvisitas"]; ?> Visitas</h5>
									</div>
									<div class="pull-right">
										<h5><?php echo $porcentajetotalmes; ?>%</h5>
									</div>
								</footer>
                      		</div><!-- /darkblue panel -->
						</div><!-- /col-md-4 -->
						
						
						<div class="col-md-4 mb">
							<!-- INSTAGRAM PANEL -->
							<div class="instagram-panel pn">
								<i class="fa fa-instagram fa-4x"></i>
								<p>@THISISYOU<br/>
									5 min. ago
								</p>
								<p><i class="fa fa-comment"></i> 18 | <i class="fa fa-heart"></i> 49</p>
							</div>
						</div><!-- /col-md-4 -->
						
						<div class="col-md-4 col-sm-4 mb">
							<!-- REVENUE PANEL -->
							<div class="darkblue-panel pn">
								<div class="darkblue-header">
									<h5>REVENUE</h5>
								</div>
								<div class="chart mt">
									<div class="sparkline" data-type="line" data-resize="true" data-height="75" data-width="90%" data-line-width="1" data-line-color="#fff" data-spot-color="#fff" data-fill-color="" data-highlight-line-color="#fff" data-spot-radius="4" data-data="[200,135,667,333,526,996,564,123,890,464,655]"></div>
								</div>
								<p class="mt"><b>$ 17,980</b><br/>Month Income</p>
							</div>
						</div><!-- /col-md-4 -->
						
					</div><!-- /row -->
					
					<div class="row mt">
                      <!--CUSTOM CHART START -->

                      
                      <?php
                        //Contador
                        //========================================================================
                        $mesActual = date('m');
                        $sql = "select * from todas where EXTRACT(month FROM fec_vista)=$mesActual order by fec_vista desc limit 8";
                        $ejecSql= mysql_query($sql, $conexion);


                        //echo "<br>";
                        //echo "Desglose del mes actual";
                        //while ($arraySql=mysql_fetch_array($ejecSql)) {
                          //  $fecha=$arraySql['times'];
                            //echo "<br>";
                            //echo $fecha;
                        //}
                        //========================================================================


                      ?>
                      <div class="border-head">
                          <h3>VISITAS DIARIAS</h3>
                      </div>
                      <div class="custom-bar-chart">
                          <ul class="y-axis">
                              <li><span>10.000</span></li>
                              <li><span>8.000</span></li>
                              <li><span>6.000</span></li>
                              <li><span>4.000</span></li>
                              <li><span>2.000</span></li>
                              <li><span>0</span></li>
                          </ul>
                          <?php while ($arraySql=mysql_fetch_array($ejecSql)) {; ?>
                          <div class="bar">
                              <div class="title"><?php echo $arraySql['fec_vista']; ?></div>
                              <?php
                                $porcentaje= ($arraySql['times'] * 100) / 10000;
                              ?>
                              <div class="value tooltips" data-original-title="<?php echo $arraySql['times']; ?>" data-toggle="tooltip" data-placement="top"><?php echo $porcentaje; ?>%</div>
                          </div>
                          <?php }; ?>
                          <!-- <div class="bar ">
                              <div class="title">FEB</div>
                              <div class="value tooltips" data-original-title="5.000" data-toggle="tooltip" data-placement="top">50%</div>
                          </div>
                          <div class="bar ">
                              <div class="title">MAR</div>
                              <div class="value tooltips" data-original-title="6.000" data-toggle="tooltip" data-placement="top">60%</div>
                          </div>
                          <div class="bar ">
                              <div class="title">ABR</div>
                              <div class="value tooltips" data-original-title="4.500" data-toggle="tooltip" data-placement="top">45%</div>
                          </div>
                          <div class="bar">
                              <div class="title">MAY</div>
                              <div class="value tooltips" data-original-title="3.200" data-toggle="tooltip" data-placement="top">32%</div>
                          </div>
                          <div class="bar ">
                              <div class="title">JUN</div>
                              <div class="value tooltips" data-original-title="6.200" data-toggle="tooltip" data-placement="top">62%</div>
                          </div>
                          <div class="bar">
                              <div class="title">JUL</div>
                              <div class="value tooltips" data-original-title="7.500" data-toggle="tooltip" data-placement="top">75%</div>
                          </div> -->
                      </div>
                      <!--custom chart end-->
					</div><!-- /row -->	
					
                  </div><!-- /col-lg-9 END SECTION MIDDLE -->
                  
                  
      <!-- **********************************************************************************************************************************************************
      RIGHT SIDEBAR CONTENT
      *********************************************************************************************************************************************************** -->                  
                  
                  <div class="col-lg-3 ds">
                    <!--COMPLETED ACTIONS DONUTS CHART-->
						<h3>NOTIFICACIONES</h3>
                      <?php while ($arraySolicitudesActivasRechazo=mysql_fetch_array($ejecSolicitudesActivasRechazo)) {; ?>                      
                          <!-- First Action -->
                          <?php 
                            $id_nombre_usuario = $arraySolicitudesActivasRechazo['asignado_a_soli'];
                            $seleccionarnombresolicitud="select * from usuario where id_usu='$id_nombre_usuario'";
                            $ejecseleccionarnombresolicitud=mysql_query($seleccionarnombresolicitud,$conexion);
                            $arrayseleccionarnombresolicitud=mysql_fetch_array($ejecseleccionarnombresolicitud);

                          ?>
                          <div class="desc">
                          	<div class="thumb">
                          		<span class="badge bg-theme"><i class="fa fa-clock-o"></i></span>
                          	</div>
                          	<div class="details">
                              <h6>Rechaso Solicitud N: <?php echo $arraySolicitudesActivasRechazo['id_soli']; ?></h6>
                          		<p><muted>Hora solicitud: <?php echo $arraySolicitudesActivasRechazo['fec_solicitud_soli']; ?></muted><br/>
                          		   <a href="javascript:;"style="text-transform:uppercase;"><?php echo $arrayseleccionarnombresolicitud['nombre_usu']." ". $arrayseleccionarnombresolicitud['apellido_usu']; ?></a><br/> Motivo: <?php echo $arraySolicitudesActivasRechazo['motivo_rech_soli']; ?><br/>
                          		</p>
                          	</div>
                          </div>
                      <?php };  ?> 

                       
						<h3>TRABAJADORES ACTIVOS</h3>
                      <!-- First Member -->
                      <?php while($arrayListadoTrabajadores=mysql_fetch_array($ejecListadoTrabajadores)){; ?>
                      <div class="desc">
                      	<div class="thumb">
                      		<img class="img-circle" src="assets/img/Avatar-trab.png" width="35px" height="35px" align="">
                      	</div>
                      	<div class="details">
                      		<p><a href="javascript:;"style="text-transform:uppercase;"><?php echo $arrayListadoTrabajadores['nombre_usu']." ". $arrayListadoTrabajadores['apellido_usu']; ?></a><br/>
                      		   <muted>ACTIVO</muted>
                      		</p>
                      	</div>
                      </div>
                      <?php }; ?> 

                      <!-- CALENDAR-->
                      <div id="calendar" class="mb">
                          <div class="panel green-panel no-margin">
                              <div class="panel-body">
                                  <div id="date-popover" class="popover top" style="cursor: pointer; disadding: block; margin-left: 33%; margin-top: -50px; width: 175px;">
                                      <div class="arrow"></div>
                                      <h3 class="popover-title" style="disadding: none;"></h3>
                                      <div id="date-popover-content" class="popover-content"></div>
                                  </div>
                                  <div id="my-calendar"></div>
                              </div>
                          </div>
                      </div><!-- / calendar -->
                      
                  </div><!-- /col-lg-3 -->
              </div><! --/row -->
          </section>
      </section>

      <!--main content end-->
      <!--footer start-->
      <?php 
          require_once("assets/content/footer-content.php");
      ?>
      <!--footer end-->
  </section>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/jquery-1.8.3.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="assets/js/jquery.scrollTo.min.js"></script>
    <script src="assets/js/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="assets/js/jquery.sparkline.js"></script>


    <!--common script for all pages-->
    <script src="assets/js/common-scripts.js"></script>
    
    <script type="text/javascript" src="assets/js/gritter/js/jquery.gritter.js"></script>
    <script type="text/javascript" src="assets/js/gritter-conf.js"></script>

    <!--script for this page-->
    <script src="assets/js/sparkline-chart.js"></script>    
	<script src="assets/js/zabuto_calendar.js"></script>	
	
	<script type="text/javascript">
        $(document).ready(function () {
        var unique_id = $.gritter.add({
            // (string | mandatory) the heading of the notification
            title: 'Bienvenido a GLPEXPRESS!',
            // (string | mandatory) the text inside the notification
            text: 'Cualquier consulta o duda recuerda llamar al administrador al numero 600 600 6868 <a href="javascript:void(0);"  style="color:#ffd777">GLPEXPRESS</a>.',
            // (string | optional) the image to display on the left
            image: 'assets/img/ui-sam.jpg',
            // (bool | optional) if you want it to fade out on its own or just sit there
            sticky: true,
            // (int | optional) the time you want it to be alive for before fading out
            time: '',
            // (string | optional) the class name you want to apply to that specific message
            class_name: 'my-sticky-class'
        });

        return false;
        });
	</script>
	
	<script type="application/javascript">
        $(document).ready(function () {
            $("#date-popover").popover({html: true, trigger: "manual"});
            $("#date-popover").hide();
            $("#date-popover").click(function (e) {
                $(this).hide();
            });
        
            $("#my-calendar").zabuto_calendar({
                action: function () {
                    return myDateFunction(this.id, false);
                },
                action_nav: function () {
                    return myNavFunction(this.id);
                },
                ajax: {
                    url: "show_data.php?action=1",
                    modal: true
                },
                legend: [
                    {type: "text", label: "Special event", badge: "00"},
                    {type: "block", label: "Regular event", }
                ]
            });
        });
        
        
        function myNavFunction(id) {
            $("#date-popover").hide();
            var nav = $("#" + id).data("navigation");
            var to = $("#" + id).data("to");
            console.log('nav ' + nav + ' to: ' + to.month + '/' + to.year);
        }
    </script>
  </body>
</html>