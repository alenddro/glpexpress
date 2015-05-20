<?php
session_start();
header('Content-Type: text/html; charset=ISO-8859-1');
require_once('../conexion.php');

if($_SESSION['esadmin']==2 || $_SESSION['esadmin']==3){

            //Todos los pedidos activos
            $sqlSolicitud="select producto.*, solicitud.* from solicitud, producto where producto.id_prod=solicitud.producto_id_soli and solicitud.estado_solicitud_soli='activo' and solicitud.asignado_a_soli='' order by solicitud.fec_solicitud_soli desc";
            $ejecSolicitud=mysql_query($sqlSolicitud, $conexion);
        }


        //seleccionar a los trabajadores activos del dia
        $sqlTrabajadoresActivos="select * from trabajadoractivo where estado_trab_activo='1'";
        $ejecTrabajadoresActivos=mysql_query($sqlTrabajadoresActivos,$conexion);


?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>Listado de Solicitudes</title>

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
            <h3><i class="fa fa-angle-right"></i> Listado de Solicitudes</h3>
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
                                                    <p class="lead"></strong></i></p>
                                                 </div>
                                                 <div class="starter-template visible-xs-block hidden-lg hidden-md hidden-sm">
                                                    <h2></h2>

                                                 </div>
                                            </div><!-- /.container -->


                                            <section class="container-fluid">
                                                <div class="row">
                                                    <div class="col-xs-12 col-md-12 ">
                                                        <article class="container">
                                                            <div class="container-fluid">
                                                                <div class="row">
                                                                    <div class="col-xs-12 head-registro">
                                                                         <h2 class="form-signin-heading"></h2>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-signin registro-lipigas-listado" id="listadogas">
                                                               <?php if($_SESSION['esadmin']==2 || $_SESSION['esadmin']==3){
                                                                    while($arraySolicitud=mysql_fetch_array($ejecSolicitud)){

                                                                     //ver solicitud del cleinte
                                                                      $idsol=$arraySolicitud['id_soli'];
                                                                      $sqlSolicitudDatos="select * from solicitud, usuario, producto where solicitud.id_soli='$idsol' and usuario.id_usu=solicitud.cliente_id_soli and producto.id_prod=solicitud.producto_id_soli";
                                                                      $ejecSolicitudDatos=mysql_query($sqlSolicitudDatos);
                                                                      $arraySolicitudDatos=mysql_fetch_array($ejecSolicitudDatos);
                                                                      ?>

                                                                     <div class="col-xs-12 listado-trabajador">
                                                                         <a href="#versolicitud<?php echo $arraySolicitud['id_soli']?>" data-toggle="collapse"><?php echo $arraySolicitud['fec_solicitud_soli'];?>  &nbsp;  <?php echo $arraySolicitud['nombre_prod']; ?>&nbsp;  ACTIVA</a> 
                                                                            <div id="versolicitud<?php echo $arraySolicitud['id_soli']?>" class="collapse">
                                                                            <h1>Solicitud numero: <?php echo $idsol;?></h1> 
                                                                            <div class="row">
                                                                                <div class="col-xs-12 col-md-12 ">
                                                                                    <article class="container">
                                                                                        <div class="container-fluid">  
                                                                                            <div class="row">
                                                                                                <div class="col-xs-12 head-registro">
                                                                                                     <h2 class="form-signin-heading">Datos de la Solicitud</h2>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                       
                                                                                            <label>Nombre</label>
                                                                                            <input  value="<?php echo $arraySolicitudDatos['nombre_usu']?>" type="text" disabled name="nombreusu" class="form-control"  required="" autofocus="">
                                                                                            <br>
                                                                                            <label>Apellido</label>
                                                                                            <input  value="<?php echo $arraySolicitudDatos['apellido_usu']?>" type="text" disabled name="password" class="form-control" required="">
                                                                                            <br>
                                                                                            <label>Direccion</label>
                                                                                            <input  value="<?php echo $arraySolicitudDatos['direccion_usu']?>" type="text" disabled name="reppassword" class="form-control" required="">
                                                                                            <br>
                                                                                            <label>Telefono</label>
                                                                                            <input  value="<?php echo $arraySolicitudDatos['telefono_usu']?>" type="text" disabled name="direccion" class="form-control" required="" autofocus="">
                                                                                            <br>
                                                                                            <label>Detalle</label>
                                                                                            <input  value="<?php echo $arraySolicitudDatos['nombre_prod']?>" type="text" disabled name="nombre" class="form-control" required="" autofocus="">
                                                                                            <br>
                                                                                            <label>Valor</label>
                                                                                            <input  value="$<?php echo $arraySolicitudDatos['valor_prod']?>" type="text" disabled name="email" class="form-control" required="" autofocus="">
                                                                                            <br>
                                                                                            <label>Fecha/Hora Solicitud</label>
                                                                                            <input  value="<?php echo $arraySolicitudDatos['fec_solicitud_soli']?>" type="tel" name="text" disabled class="form-control" required="" autofocus="">
                                                                                            <br>
                                                                                            <label>Metodo de Pago</label>
                                                                                            <input  value="<?php echo $arraySolicitudDatos['metodo_pago_cli_soli']?>" type="text" name="text" disabled class="form-control" required="" autofocus="">
                                                                                            <br>
                                                                                            <?php if($_SESSION['esadmin']==2 || $_SESSION['esadmin']==3){;?>
                                                                                                    <form action="asignarpedido.php" id="myformAsignar<?php echo $arraySolicitud['id_soli']?>" method="GET">
                                                                                                        <input type="hidden" name="id_soli" value="<?php echo $arraySolicitud['id_soli']?>">
                                                                                                        <label>Asignar A</label>
                                                                                                        <select name="asignar_a" id="asignar" class="form-control">
                                                                                                            <?php 
                                                                                                                while ($arrayTrabajadoresActivos=mysql_fetch_array($ejecTrabajadoresActivos)){ ;?>
                                                                                                                    <option value="<?php echo $arrayTrabajadoresActivos['id_trab_activo'];?>"><?php echo $arrayTrabajadoresActivos['nombre_trab_activo'];?>&nbsp;<?php echo $arrayTrabajadoresActivos['apellido_trab_activo'];?></option>
                                                                                                            <?php }; ?>
                                                                                                                <?php mysql_data_seek($ejecTrabajadoresActivos, 0);?>
                                                                                                        </select>
                                                                                                        <br>
                                                                                                        <a href="#" class="btn btn-primary" style="color:white;" onclick="document.getElementById('myformAsignar<?php echo $arraySolicitud['id_soli']?>').submit()">Asignar</a>
                                                                                                        <?php print_r($arrayTrabajadoresActivos); ?>
                                                                                                    </form>
                                                                                            <?php }; ?>
                                                                                            <br>
                                                                                    </article>
                                                                                </div>
                                                                            </div>
                                                                         </div>  
                                                                     </div>                                                 
                                                                        <br>
                                                                       <?php  
                                                                    }
                                                                }    
                                                                    ?> 

                                                            </div>
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
