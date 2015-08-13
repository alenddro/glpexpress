<?php 
session_start();
header('Content-Type: text/html; charset=ISO-8859-1');
require_once('../conexion.php');  

 		if ($_SESSION['esadmin']==2) {
           
             //listado trabajaores
            $sqlListadoProductos="select * from producto order by id_prod desc";
            $ejecListadoProductos=mysql_query($sqlListadoProductos, $conexion);
            
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

    <title>Listado Productos</title>

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
          	<h3><i class="fa fa-angle-right"></i> Listado Productos</h3>
          	<div class="row mt">
          		<div class="col-lg-12">
                        <form class="form-signin registro-lipigas-listado" role="form" id="listadogas">
                           <?php
                            while($arrayListadoProductos=mysql_fetch_array($ejecListadoProductos)){
                            ?>
                                <div class="col-xs-12 listado-trabajador">
                                    <a href="#verproducto<?php echo $arrayListadoProductos['id_prod']?>" data-toggle="collapse"><?php echo $arrayListadoProductos['nombre_prod']; ?>&nbsp;<?php echo $arrayListadoProductos['valor_prod']; ?>&nbsp;| Stock: <?php echo $arrayListadoProductos['stock_prod'];?>&nbsp;| Estado: <?php $estado = 1; $estado2 = ($estado==$arrayListadoProductos['estado_prod'] ?  "ACTIVO" : "INACTIVO"); echo $estado2; ?></a> 
                                        <div id="verproducto<?php echo $arrayListadoProductos['id_prod']?>" class="collapse">
                                        <h1>Codigo Producto: <?php echo $arrayListadoProductos['id_prod'];?></h1> 
                                        <div class="row">
                                            <div class="col-xs-12 col-md-12 ">
                                                <div class="container-fluid">  
                                                </div>
                                                    <label>Titulo</label>
                                                    <input  value="<?php echo $arrayListadoProductos['nombre_prod']?>" type="text" disabled  class="form-control"  required="" autofocus="">
                                                    <br>
                                                    <label>Descripcion</label>
                                                    <input  value="<?php echo $arrayListadoProductos['descrip_prod']?>" type="text" disabled  class="form-control" required="">
                                                    <br>
                                                    <label>Valor</label>
                                                    <input  value="<?php echo $arrayListadoProductos['valor_prod']?>" type="text" disabled  class="form-control" required="">
                                                    <br>
                                                    <label>Stock</label>
                                                    <input  value="<?php echo $arrayListadoProductos['stock_prod']?>" type="text" disabled class="form-control" required="" autofocus="">
                                                    <br>
                                                    <label>Fecha Subida</label>
                                                    <input  value="<?php echo $arrayListadoProductos['fec_subida_prod']?>" type="text" disabled class="form-control" required="" autofocus="">
                                                    <br>
                                                    <label>Imagen:</label>
                                                    <br>
                                                    <img src="<?php echo "../".$arrayListadoProductos['ruta_img_prod']?>" alt="<?php echo $arrayListadoProductos['nombre_prod']?>" width="400">
                                                    <br>
                                                    <br>
                                                    <label>Agregado Por</label>
                                                    <input  value="<?php echo $arrayListadoProductos['agregado_por_prod']?>" type="text" disabled class="form-control" required="" autofocus="">
                                                    <br>
                                            </div>
                                        </div>
                                     </div>  
                                 </div>                                                 
                                    <br>
                                   <?php  
                            }    
                                ?> 
                        </form>
                    
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
