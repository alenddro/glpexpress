<?php 
session_start();
header('Content-Type: text/html; charset=ISO-8859-1');
require_once('../conexion.php');


        //seleccionar los productos activos
            $sqlProductosActivos="SELECT * FROM producto WHERE estado_prod='1'";
            $ejecProductosActivos=mysql_query($sqlProductosActivos, $conexion);

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>Agregar Oferta</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
        
    <!-- Custom styles for this template -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/bootstrap-datetimepicker.css">

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
          	<h3><i class="fa fa-angle-right"></i> Agregar Oferta</h3>
            <p>Oferta Ejemplo: Solo por hoy producto XX a $10.000</p>
          	<div class="row mt">
          		<div class="col-lg-12">
          			<section id="oferta">
						<article>
							<form action="../agregaroferta2.php" enctype="multipart/form-data" method="POST" role="form" class="form_oferta">
								<div class="agregar-oferta">
									<div class="form-group">
                                        <label for="tipoProducto">Seleccione Producto</label>
                                        <select name="tipo_prod" class="form-control">
                                        <?php while ( $arrayProductosActivos=mysql_fetch_array($ejecProductosActivos)) { ;?> 
                                            <option value="<?php echo $arrayProductosActivos['nombre_prod'];?>"><?php echo $arrayProductosActivos['nombre_prod'];?></option>
                                        <?php } ;?>
                                        </select>
                                    </div>
									<div class="form-group">
										<label for="descripoferta">Descripción Oferta</label>
										<input type="text" class="form-control" name="descrip_oferta" placeholder="ingrese Desccripción de Oferta">
										<hr>
									</div>
									<div class="form-group">
										<label for="nombreImagen">Imagen Oferta</label>	
										<input type="file" class="form-control" name="ruta_oferta" placeholder="imagen del oferta">
										<hr>
									</div>	
									<div class="form-group">
										<label for="valoroferta">Valor Oferta</label>	
										<input type="text" class="form-control" name="valor_oferta" rows="10" placeholder="Ingrese Valor oferta ($)"></input>
										<hr>
									</div>	
									<div class="form-group">
										<label for="stockoferta">Stock Oferta</label>	
										<input type="text" class="form-control" name="stock_oferta" rows="10" placeholder="Ingrese Cantidad oferta"></input>
										<hr>
									</div>
									<div class="form-group">
						                <label for="dtp_input1">Fin Fecha De Oferta</label>
						                <div class="input-group date form_datetime col-xs-12"  data-date-format="dd MM yyyy - HH:ii p" data-link-field="dtp_input1">
						                    <input class="form-control" size="16" type="text" value="" readonly>
						                    <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
											<span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
						                </div>
										<input type="hidden" id="dtp_input1" value="" /><br/>
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

	<script type="text/javascript" src="../js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
	<script type="text/javascript" src="../js/locales/bootstrap-datetimepicker.es.js" charset="UTF-8"></script>
	<script type="text/javascript">
	    $('.form_datetime').datetimepicker({
	        //language:  'es',
	        weekStart: 1,
	        todayBtn:  1,
			autoclose: 1,
			todayHighlight: 1,
			startView: 2,
			forceParse: 0,
	        showMeridian: 1
	    });
	</script>
    
  <script>
      //custom select box

      $(function(){
          $('select.styled').customSelect();
      });

  </script>

  </body>
</html>
