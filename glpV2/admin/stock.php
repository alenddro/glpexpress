<?php 
session_start();
header('Content-Type: text/html; charset=ISO-8859-1');
require_once('../conexion.php');
require_once('../admin/assets/function/arreglarhorafecha.php');   

  //sql para saber stock de productos
  $sqlProductos="SELECT * FROM producto";
  $ejecProductos= mysql_query($sqlProductos, $conexion);

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>Stock</title>

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
          	<h3><i class="fa fa-angle-right"></i> Stock</h3>
              <div class="col-md-12">
                <div class="content-panel">
                  <h4><i class="fa fa-angle-right"></i> Tabla de Stock</h4><hr>
                  <table class="table table-striped table-advance table-hover text-center">
                    <thead>
                      <tr>
                        <th class="hidden-phone text-center"><i class="fa"></i> Tipo</th>
                        <th class="text-center"><i class="fa"></i> Nombre</th>
                        <th class="hidden-phone text-center"><i class="fa"></i> Descripcion</th>
                        <th class="text-center"><i class=" fa"></i> Imagen</th>
                        <th class="text-center"><i class=" fa"></i> Valor</th>
                        <th class="text-center"><i class=" fa"></i> Stock</th>
                        <th class="hidden-phone text-center"><i class=" fa"></i> Fecha ultima modificacion</th>
                        <th class="hidden-phone text-center"><i class=" fa"></i> Agregador Por</th>
                        <th class="text-center"><i class=" fa"></i> Estado</th>
                        <th class="text-center"><i class=" fa"></i> Opciones</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php while($arrayProductos=mysql_fetch_array($ejecProductos)){ ;?>
                        <tr>
                          <td class="hidden-phone"><?php echo $arrayProductos['tipo_producto_prod'];?></td>
                          <td><?php echo $arrayProductos['nombre_prod'];?></td>
                          <td class="hidden-phone"><?php echo $arrayProductos['descrip_prod'];?></td>
                          <td><img src="../<?php echo $arrayProductos['ruta_img_prod'];?>" height="35" alt="<?php echo $arrayProductos['ruta_img_prod'];?>"></td>
                          <td>$<?php echo $arrayProductos['valor_prod'];?></td>
                          <td><button type="button" title="<?php if($arrayProductos['stock_prod'] < 15){ echo 'Stock Critico'; }?>" class="<?php echo ($arrayProductos['stock_prod'] < 15 ) ? "btn btn-danger btn-xs" : "btn btn-success btn-xs"; ?>"><?php echo $arrayProductos['stock_prod'];?></button></td>
                          <td class="hidden-phone"><?php echo $arrayProductos['fec_subida_prod'];?></td>
                          <td class="hidden-phone"><?php echo $arrayProductos['agregado_por_prod'];?></td>
                          <td><button type="button" class="<?php echo ($arrayProductos['estado_prod']==1) ? "btn btn-success btn-xs" : "btn btn-danger btn-xs"; ?>"><?php echo ($arrayProductos['estado_prod']==1) ? "Activo" : "Inactivo"; ?></button></td>
                          <td>
                            <button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button>
                            <button class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></button>
                          </td>
                        </tr>
                      <?php } ;?>
                    </tbody>
                  </table>
                </div><!-- /content-panel -->
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
