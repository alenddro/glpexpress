<?php 
session_start();
header('Content-Type: text/html; charset=ISO-8859-1');
require_once('../conexion.php'); 
	
	//mostrar todos los usuarios trabajadores (Camioneros)
	$sqlTrabajadores="select * from usuario where not exists(select id_trab_activo from trabajadoractivo where usuario.id_usu=trabajadoractivo.id_trab_activo) and esadmin='1' ";
	$ejecTrabajadores=mysql_query($sqlTrabajadores,$conexion);


	//mostrar los camiones que hay
	$sqlCamiones = "select * from camion where not exists(select id_camion_trab_activo from trabajadoractivo where camion.id_cam=trabajadoractivo.id_camion_trab_activo) and estado_cam='1'";
	$ejecCamiones=mysql_query($sqlCamiones,$conexion);  

  //mostrar el stock de gas 5, 15, 45
        //Total de stock
        $sqlSumaStockTotalProductos="SELECT SUM(stock_prod) as totalcilindros FROM producto WHERE tipo_producto_prod='cilindros'";
        $ejecSumaStockTotalProductos=mysql_query($sqlSumaStockTotalProductos, $conexion);

        //total de cilindros de 5
        $sqlCilindros5kg= "SELECT id_prod, stock_prod FROM producto WHERE kilos_prod ='5'";
        $ejecCilindros5kg = mysql_query($sqlCilindros5kg,$conexion);
        $arrayGas5kg =mysql_fetch_array($ejecCilindros5kg);
        //total de cilindros de 15
        $sqlCilindros15kg= "SELECT id_prod, stock_prod FROM producto WHERE kilos_prod ='15'";
        $ejecCilindros15kg = mysql_query($sqlCilindros15kg,$conexion);
        $arrayGas15kg =mysql_fetch_array($ejecCilindros15kg);
        //total de cilindros de 45
        $sqlCilindros45kg= "SELECT id_prod, stock_prod FROM producto WHERE kilos_prod ='45'";
        $ejecCilindros45kg = mysql_query($sqlCilindros45kg,$conexion);
        $arrayGas45kg =mysql_fetch_array($ejecCilindros45kg);



?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>Activar Turno Trabajador</title>

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
          	<h3><i class="fa fa-angle-right"></i> Activar Turno Trabajador</h3>
          	<div class="row mt">
          		<div class="col-lg-12">
          			<section id="oferta">
      						<article>
      							<form action="../administrartrabajador2.php" method="POST" class="form_oferta">
      								<br>
      								<label>Seleccione Trabajador</label>
      								<select name="trabajador" id="trabajador" class="form-control">
      									<?php 
      									while ($arrayTrabajador=mysql_fetch_array($ejecTrabajadores)){
                          
                          ?>
                              <option value="<?php echo $arrayTrabajador['id_usu']?>"><?php echo $arrayTrabajador['nombre_usu']?>&nbsp;<?php echo $arrayTrabajador['apellido_usu']?></option> 
                        <?php 
                        }
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
                       
                      <label>Seleccione Stock</label>
                      <div class="form-control">
                        <input type="hidden" name="id_produ5" value="<?php echo $arrayGas5kg['id_prod'];?>"> 
                        <label>Gas de 5 KG: </label>
                        <select name="gas5">
                          <?php $num2=0;
                              $num=(int)$arrayGas5kg['stock_prod']; 
                              while ( $num2 <= $num) {
                          ?> 
                              <option value="<?php echo $num2;?>">
                                <?php echo $num2;?>
                              </option>
                          <?php 
                              $num2++;
                              } 
                          ?>  
                                          
                        </select>
                      </div>
                      <br>
                      
                      <label>Seleccione Stock</label>
                      <div class="form-control">
                        <input type="hidden" name="id_produ15" value="<?php echo $arrayGas15kg['id_prod'];?>"> 
                        <label>Gas de 15 KG: </label>
                       <select name="gas15">
                          <?php $num2=0;
                              $num=(int)$arrayGas15kg['stock_prod']; 
                              while ( $num2 <= $num) {
                          ?> 
                              <option value="<?php echo $num2;?>">
                                <?php echo $num2;?>
                              </option>
                          <?php 
                              $num2++;
                              } 
                          ?>  
                                          
                        </select>
                      </div>
                      <br>

                      <label>Seleccione Stock</label>
                      <div class="form-control">
                        <input type="hidden" name="id_produ45" value="<?php echo $arrayGas45kg['id_prod'];?>"> 
                        <label>Gas de 45 KG: </label>
                        <select name="gas45">
                          <?php $num2=0;
                              $num=(int)$arrayGas45kg['stock_prod']; 
                              while ( $num2 <= $num) {
                          ?> 
                              <option value="<?php echo $num2;?>">
                                <?php echo $num2;?>
                              </option>
                          <?php 
                              $num2++;
                              } 
                          ?>  
                                          
                        </select>
                      </div>
      								<br>
      								<input type="submit" class="btn btn-primary btn-block" value="ACTIVAR TRABAJADOR">
      								<br>
      							</form>
      						</article>
      					</section>          		
              </div>
            </div>
    		  </section>
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
