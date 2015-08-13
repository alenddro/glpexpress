<?php
session_start();
header('Content-Type: text/html; charset=ISO-8859-1');
require_once('../conexion.php');   
require_once('../isset/header-estadisticas.php');   

  if ($conexion) {

      
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

        //consulta total de cada cilindros mas vendido (solicitud finalizada)
        $sqlTotalCilindrosMasVendidos ="select producto_id_soli,COUNT(*) from solicitud where (estado_solicitud_soli='finalizado' or solicitud.estado_solicitud_soli='oculto') group by producto_id_soli LIMIT 1";
        $ejecTotalCilindrosMasVendidos = mysql_query($sqlTotalCilindrosMasVendidos, $conexion);
        $arrayTotalCilindrosMasVendidos=mysql_fetch_array($ejecTotalCilindrosMasVendidos);
        $maximocilindro = $arrayTotalCilindrosMasVendidos['COUNT(*)'];

            //sacar los datos del producto mas vendido
            $id_producto_mas_vendido=$arrayTotalCilindrosMasVendidos['producto_id_soli'];
            $sqlDatosProductoMasVendido="SELECT * FROM producto WHERE id_prod='$id_producto_mas_vendido'";
            $ejecDatosProductoMasVendido=mysql_query($sqlDatosProductoMasVendido,$conexion);
            $arrayDatosProductoMasVendido=mysql_fetch_array($ejecDatosProductoMasVendido);

        //listado trabajadores activos
        $sqlListadoTrabajadores="select * from usuario,trabajadoractivo where usuario.esadmin='1' and usuario.id_usu=trabajadoractivo.id_trab_activo order by usuario.id_usu desc";
        $ejecListadoTrabajadores=mysql_query($sqlListadoTrabajadores, $conexion);

        //Total de stock
        $sqlSumaStockTotalProductos="SELECT SUM(stock_prod) as totalcilindros FROM producto WHERE tipo_producto_prod='cilindros'";
        $ejecSumaStockTotalProductos=mysql_query($sqlSumaStockTotalProductos, $conexion);

        //total de cilindros de 5
        $sqlCilindros5kg= "SELECT stock_prod FROM producto WHERE kilos_prod ='5'";
        $ejecCilindros5kg = mysql_query($sqlCilindros5kg,$conexion);

        //total de cilindros de 15
        $sqlCilindros15kg= "SELECT stock_prod FROM producto WHERE kilos_prod ='15'";
        $ejecCilindros15kg = mysql_query($sqlCilindros15kg,$conexion);

        //total de cilindros de 45
        $sqlCilindros45kg= "SELECT stock_prod FROM producto WHERE kilos_prod ='45'";
        $ejecCilindros45kg = mysql_query($sqlCilindros45kg,$conexion);

        //Total de ventas por mes
            //mes Enero
            $fechadiamesEnero= date("Y-01");
            $sqlSolicitudesVentaAnoEnero="SELECT * from solicitud where DATE_FORMAT(fec_solicitud_soli, '%Y-%m')='$fechadiamesEnero' and (estado_solicitud_soli='finalizado' or estado_solicitud_soli='oculto') order by id_soli desc";
            $ejecSolicitudesVentaAnoEnero=mysql_query($sqlSolicitudesVentaAnoEnero, $conexion);
            $countEnero=mysql_num_rows($ejecSolicitudesVentaAnoEnero);

            //mes Febrero
            $fechadiamesFebrero= date("Y-02");
            $sqlSolicitudesVentaAnoFebrero="SELECT * from solicitud where DATE_FORMAT(fec_solicitud_soli, '%Y-%m')='$fechadiamesFebrero' and (estado_solicitud_soli='finalizado' or estado_solicitud_soli='oculto') order by id_soli desc";
            $ejecSolicitudesVentaAnoFebrero=mysql_query($sqlSolicitudesVentaAnoFebrero, $conexion);
            $countFebrero=mysql_num_rows($ejecSolicitudesVentaAnoFebrero);

            //mes Marzo
            $fechadiamesMarzo= date("Y-03");
            $sqlSolicitudesVentaAnoMarzo="SELECT * from solicitud where DATE_FORMAT(fec_solicitud_soli, '%Y-%m')='$fechadiamesMarzo' and (estado_solicitud_soli='finalizado' or estado_solicitud_soli='oculto') order by id_soli desc";
            $ejecSolicitudesVentaAnoMarzo=mysql_query($sqlSolicitudesVentaAnoMarzo, $conexion);
            $countMarzo=mysql_num_rows($ejecSolicitudesVentaAnoMarzo);

            //mes Abril
            $fechadiamesAbril= date("Y-04");
            $sqlSolicitudesVentaAnoAbril="SELECT * from solicitud where DATE_FORMAT(fec_solicitud_soli, '%Y-%m')='$fechadiamesAbril' and (estado_solicitud_soli='finalizado' or estado_solicitud_soli='oculto') order by id_soli desc";
            $ejecSolicitudesVentaAnoAbril=mysql_query($sqlSolicitudesVentaAnoAbril, $conexion);
            $countAbril=mysql_num_rows($ejecSolicitudesVentaAnoAbril);

            //mes Mayo
            $fechadiamesMayo= date("Y-05");
            $sqlSolicitudesVentaAnoMayo="SELECT * from solicitud where DATE_FORMAT(fec_solicitud_soli, '%Y-%m')='$fechadiamesMayo' and (estado_solicitud_soli='finalizado' or estado_solicitud_soli='oculto') order by id_soli desc";
            $ejecSolicitudesVentaAnoMayo=mysql_query($sqlSolicitudesVentaAnoMayo, $conexion);
            $countMayo=mysql_num_rows($ejecSolicitudesVentaAnoMayo);

            //mes Junio
            $fechadiamesJunio= date("Y-06");
            $sqlSolicitudesVentaAnoJunio="SELECT * from solicitud where DATE_FORMAT(fec_solicitud_soli, '%Y-%m')='$fechadiamesJunio' and (estado_solicitud_soli='finalizado' or estado_solicitud_soli='oculto') order by id_soli desc";
            $ejecSolicitudesVentaAnoJunio=mysql_query($sqlSolicitudesVentaAnoJunio, $conexion);
            $countJunio=mysql_num_rows($ejecSolicitudesVentaAnoJunio);

            //mes Julio
            $fechadiamesJulio= date("Y-07");
            $sqlSolicitudesVentaAnoJulio="SELECT * from solicitud where DATE_FORMAT(fec_solicitud_soli, '%Y-%m')='$fechadiamesJulio' and (estado_solicitud_soli='finalizado' or estado_solicitud_soli='oculto') order by id_soli desc";
            $ejecSolicitudesVentaAnoJulio=mysql_query($sqlSolicitudesVentaAnoJulio, $conexion);
            $countJulio=mysql_num_rows($ejecSolicitudesVentaAnoJulio);

            //mes Agosto
            $fechadiamesAgosto= date("Y-08");
            $sqlSolicitudesVentaAnoAgosto="SELECT * from solicitud where DATE_FORMAT(fec_solicitud_soli, '%Y-%m')='$fechadiamesAgosto' and (estado_solicitud_soli='finalizado' or estado_solicitud_soli='oculto') order by id_soli desc";
            $ejecSolicitudesVentaAnoAgosto=mysql_query($sqlSolicitudesVentaAnoAgosto, $conexion);
            $countAgosto=mysql_num_rows($ejecSolicitudesVentaAnoAgosto);

            //mes Septiembre
            $fechadiamesSeptiembre= date("Y-09");
            $sqlSolicitudesVentaAnoSeptiembre="SELECT * from solicitud where DATE_FORMAT(fec_solicitud_soli, '%Y-%m')='$fechadiamesSeptiembre' and (estado_solicitud_soli='finalizado' or estado_solicitud_soli='oculto') order by id_soli desc";
            $ejecSolicitudesVentaAnoSeptiembre=mysql_query($sqlSolicitudesVentaAnoSeptiembre, $conexion);
            $countSeptiembre=mysql_num_rows($ejecSolicitudesVentaAnoSeptiembre);

            //mes Octubre
            $fechadiamesOctubre= date("Y-10");
            $sqlSolicitudesVentaAnoOctubre="SELECT * from solicitud where DATE_FORMAT(fec_solicitud_soli, '%Y-%m')='$fechadiamesOctubre' and (estado_solicitud_soli='finalizado' or estado_solicitud_soli='oculto') order by id_soli desc";
            $ejecSolicitudesVentaAnoOctubre=mysql_query($sqlSolicitudesVentaAnoOctubre, $conexion);
            $countOctubre=mysql_num_rows($ejecSolicitudesVentaAnoSeptiembre);

            //mes Noviembre
            $fechadiamesNoviembre= date("Y-11");
            $sqlSolicitudesVentaAnoNoviembre="SELECT * from solicitud where DATE_FORMAT(fec_solicitud_soli, '%Y-%m')='$fechadiamesNoviembre' and (estado_solicitud_soli='finalizado' or estado_solicitud_soli='oculto') order by id_soli desc";
            $ejecSolicitudesVentaAnoNoviembre=mysql_query($sqlSolicitudesVentaAnoNoviembre, $conexion);
            $countNoviembre=mysql_num_rows($ejecSolicitudesVentaAnoNoviembre);

            //mes Diciembre
            $fechadiamesDiciembre= date("Y-12");
            $sqlSolicitudesVentaAnoDiciembre="SELECT * from solicitud where DATE_FORMAT(fec_solicitud_soli, '%Y-%m')='$fechadiamesDiciembre' and (estado_solicitud_soli='finalizado' or estado_solicitud_soli='oculto') order by id_soli desc";
            $ejecSolicitudesVentaAnoDiciembre=mysql_query($sqlSolicitudesVentaAnoDiciembre, $conexion);
            $countDiciembre=mysql_num_rows($ejecSolicitudesVentaAnoDiciembre);



        //Ventas Totales en el año
            $fechaanoactual= date("Y");
            $sqlSolicitudesVentaAno="SELECT * from solicitud where DATE_FORMAT(fec_solicitud_soli, '%Y')='$fechaanoactual' and (estado_solicitud_soli='finalizado' or estado_solicitud_soli='oculto') order by id_soli desc";
            $ejecSolicitudesVentaAno=mysql_query($sqlSolicitudesVentaAno, $conexion);
            $countAno=mysql_num_rows($ejecSolicitudesVentaAno);




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

              <div class="row" >
                  <div class="col-lg-9 main-chart">
                    	<div class="row mtbox" id="navEstadisticas">
                        
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
                            <div class="green-panel pn">
                                <?php 
                                   $valorTotalBD=  10485760;
                                    $porcentocupado= $total_kb * 100 / $valorTotalBD;
                                    $porcentfaltante = 100 - $porcentocupado;
                                ?>
                                <div class="green-header">
                                   <h5>El peso de BD es <?php echo $pesoBD ?>KB</h5>
                                </div>
                                <canvas id="serverstatus03" height="120" width="120" style="width: 120px; height: 120px;"></canvas>
                                <script>
                                    var doughnutData = [
                                    {
                                        value: <?php echo $porcentocupado; ?>,
                                        color:"#2b2b2b"
                                    },
                                    {
                                        value : <?php echo $porcentfaltante; ?>,
                                        color : "#fffffd"
                                    }
                                    ];
                                    var myDoughnut = new Chart(document.getElementById("serverstatus03").getContext("2d")).Doughnut(doughnutData);
                                </script>
                                <h3> <?php echo round($porcentocupado,3); ?>%</h3>
                            </div>
                      	</div><!-- /col-md-4-->

                      	

                      	<div class="col-md-4 col-sm-4 mb">
                      		<div class="white-panel pn">
                      			<div class="white-header">
						  			<h5>PRODUCTO MAS VENDIDO</h5>
                      			</div>
								<div class="row">
									<div class="col-sm-7 col-xs-5 goleft">
										<p><i class="fa fa-heart"></i><?php echo $arrayDatosProductoMasVendido['nombre_prod']?>: <?php echo $maximocilindro;?></p>
									</div>
									<div class="col-sm-7 col-xs-5"></div>
	                      		</div>
	                      		<div class="centered">
										<img style="border-radius:5px;" src="../<?php echo $arrayDatosProductoMasVendido['ruta_img_prod']; ?>" width="120">
	                      		</div>
                      		</div>
                      	</div><!-- /col-md-4 -->

						<div class="col-md-4 mb">
							<!-- WHITE PANEL - TOP USER -->
							<div class="white-panel pn">
								<div class="white-header">
									<h5>TRABAJADOR DESTACADO</h5>
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
						<!-- TOTAL DE VISITAS -->
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
							<!-- STOCK -->
							<div class="instagram-panel pn">
                            <br>
                            <h4 style="color:white;">Stocks</h4>
                            <br>
								<img src="assets/img/gas-icon.png"  alt="gas-icon">
								<p>TOTAL<br/>
									<?php
                                        $arraySumaStockTotalProductos= mysql_fetch_array($ejecSumaStockTotalProductos);
                                        echo $arraySumaStockTotalProductos['totalcilindros'];

                                        $arrayCilindros5kg = mysql_fetch_array($ejecCilindros5kg);
                                        $arrayCilindros15kg = mysql_fetch_array($ejecCilindros15kg);
                                        $arrayCilindros45kg = mysql_fetch_array($ejecCilindros45kg);

                                    ?>
								</p>
                                 <br>
								<p><img src="assets/img/gas-icon.png" width="15" alt="gas-icon"> 5kg: <?php echo $arrayCilindros5kg['stock_prod'];?> | <img src="assets/img/gas-icon.png" width="15" alt="gas-icon"> 15kg: <?php echo $arrayCilindros15kg['stock_prod'];?>  | <img src="assets/img/gas-icon.png" width="15" alt="gas-icon"> 45kg: <?php echo $arrayCilindros45kg['stock_prod'];?>  </p>
							</div>
						</div><!-- /col-md-4 -->
						
						<div class="col-md-4 col-sm-4 mb">
							<!-- ESTADISTICAS -->
							<div class="darkblue-panel pn">
								<div class="darkblue-header">
									<h5>VENTAS MENSUALES</h5>
								</div>
								<div class="chart mt">
									<div class="sparkline" data-type="line" data-resize="true" data-height="75" data-width="90%" data-line-width="1" data-line-color="#fff" data-spot-color="#fff" data-fill-color="" data-highlight-line-color="#fff" data-spot-radius="4" data-data="[<?php echo $countEnero  ;?>,<?php echo  $countFebrero ;?>,<?php echo  $countMarzo ;?>,<?php echo  $countAbril ;?>,<?php echo  $countMayo ;?>,<?php echo  $countJunio ;?>,<?php echo  $countJulio ;?>,<?php echo  $countAgosto ;?>,<?php echo  $countSeptiembre ;?>,<?php echo  $countOctubre ;?>,<?php echo  $countNoviembre ;?>,<?php echo  $countDiciembre ;?>]"></div>
								</div>
								<p class="mt"><b><?php echo $countAno ;?></b><br/>VENTAS AL AÑO</p>
							</div>
						</div><!-- /col-md-4 -->
						
					</div><!-- /row -->
					
					<div class="row mt">
                      <!--CUSTOM CHART START -->

                      
                      <?php
                        //Contador
                        //========================================================================
                        $mesActual = date('m');
                        $sql = "select * from todas where EXTRACT(month FROM fec_vista)=$mesActual order by fec_vista desc limit 7";
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
                              <div class="title" style="font-size:10px;"><?php echo $arraySql['fec_vista']; ?></div>
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

                      <div id="notificaciones"></div>

                       
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
                          <!-- <div class="panel green-panel no-margin">
                              <div class="panel-body">
                                  <div id="date-popover" class="popover top" style="cursor: pointer; disadding: block; margin-left: 33%; margin-top: -50px; width: 175px;">
                                      <div class="arrow"></div>
                                      <h3 class="popover-title" style="disadding: none;"></h3>
                                      <div id="date-popover-content" class="popover-content"></div>
                                  </div>
                                  <div id="my-calendar"></div>
                              </div>
                          </div> -->
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

  

      //===============Notificaciones Tiempo Real===============//
        
          $.post('assets/ajax/notificaciones.php', function(h){
              $('#notificaciones').html(h);
              setTimeout("recargarNotificaciones()",8);
          });

          function recargarNotificaciones(){
            $.post('assets/ajax/notificaciones.php', function(h){
              $('#notificaciones').html(h);
              setTimeout("recargarNotificaciones()",15000);
            });
          }
        
      //===============END Notificaciones Tiempo Real===============//

       //===============Estadisticas NAV Tiempo Real===============//
       
          $.post('assets/ajax/nav-estadisticas.php', function(h){
            $('#navEstadisticas').html(h);
            setTimeout("recargaravEstadisticas()",8);
          });

          function recargaravEstadisticas(){
            $.post('assets/ajax/nav-estadisticas.php', function(h){
              $('#navEstadisticas').html(h);
            setTimeout("recargaravEstadisticas()",15000);
            });
          }
        
      //===============END Estadisticas NAV Tiempo Real===============//
      
      
          // $.ajax({
          //     type:"POST",
          //     url:"assets/content/notificaciones.php",
          //     dataType:"html",
          //     success: function(data){
          //         $('#notificaciones').empty();
          //         $("#notificaciones").append(data);                                            
          //     }
          // });
    </script>
  </body>
</html>