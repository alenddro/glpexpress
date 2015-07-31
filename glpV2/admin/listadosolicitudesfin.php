<?php 
session_start();
header('Content-Type: text/html; charset=ISO-8859-1');
require_once('../conexion.php');

    if($_SESSION['esadmin']==2 || $_SESSION['esadmin']==3 ){

        //Todos los pedidos activos
        $sqlSolicitud="select producto.*, solicitud.* from solicitud, producto where producto.id_prod=solicitud.producto_id_soli and (solicitud.estado_solicitud_soli='finalizado' or solicitud.estado_solicitud_soli='oculto')  order by solicitud.fec_solicitud_soli desc";
        $ejecSolicitud=mysql_query($sqlSolicitud, $conexion);

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

    <title>Solicitudes Finalizadas</title>

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
            <h3><i class="fa fa-angle-right"></i> Solicitudes Finalizadas</h3>
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
                                                    <p class="lead"></p>
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
                                                            <form class="form-signin registro-lipigas-listado" role="form" id="listadogas">
                                                                <div class="col-xs-12 text-center">
                                                                    <a href="javascript:;" class="btn btn-danger">Reclamo</a>
                                                                    <a href="javascript:;" class="btn btn-primary">Felicitaciones</a>
                                                                    <a href="javascript:;" class="btn btn-warning">Mejoras</a>
                                                                    <a href="javascript:;" class="btn btn-success">Otros</a>
                                                                    <a href="javascript:;" class="btn btn-default">Sin Comentarios</a>
                                                                </div>
                                                               <?php
                                                                if($_SESSION['esadmin']==2 || $_SESSION['esadmin']==3){
                                                                    while($arraySolicitud=mysql_fetch_array($ejecSolicitud)){

                                                                        
                                                                       ?>
                                                                     <!-- <a href="versolicitud.php?l=<?php //echo $arraySolicitud['id']?>" onclick="listadogas.submit();">
                                                                        <div class="col-xs-12" style="background:yellow;opacity:0.4;font-size:20px; padding:10px;color:black;margin-top:5px;">
                                                                            <?php //echo $arraySolicitud['fec_solicitud'];?>  &nbsp;  <?php //echo $arraySolicitud['nombre']; ?>&nbsp;  ACTIVA
                                                                        </div>
                                                                     </a> -->

                                                                  
                                                                    
                                                                     <?php 
                                                                     //ver solicitud del cleinte
                                                                      $idsol=$arraySolicitud['id_soli'];
                                                                      $sqlSolicitudDatos="select * from solicitud, usuario, producto where solicitud.id_soli='$idsol' and usuario.id_usu=solicitud.cliente_id_soli and producto.id_prod=solicitud.producto_id_soli";
                                                                      $ejecSolicitudDatos=mysql_query($sqlSolicitudDatos);
                                                                      $arraySolicitudDatos=mysql_fetch_array($ejecSolicitudDatos);
                                                                      ?>

                                                                     <div class="col-xs-12 listado-trabajador">
                                                                         <div class="col-xs-9"><a href="#versolicitud<?php echo $arraySolicitud['id_soli']?>" data-toggle="collapse"><?php echo "Solicitud N:".$idsol." | ";?> &nbsp;<?php echo $arraySolicitud['fec_solicitud_soli']." | ";?>  &nbsp;  <?php echo $arraySolicitud['nombre_prod']; ?>&nbsp;  | FINALIZADA 
                                                                        </a></div>
                                                                             <?php if($arraySolicitudDatos['tipo_comentario_cli_soli']=='felicitacion'){
                                                                                    echo "<div class='col-xs-3 text-right'><div class='btn btn-primary'>&nbsp;</div></div>";
                                                                                }elseif($arraySolicitudDatos['tipo_comentario_cli_soli']=='reclamo'){
                                                                                    echo "<div class='col-xs-3 text-right'><div class='btn btn-danger'>&nbsp;</div></div>";
                                                                                }elseif($arraySolicitudDatos['tipo_comentario_cli_soli']=='otro'){
                                                                                    echo "<div class='col-xs-3 text-right'><div class='btn btn-success'>&nbsp;</div></div>";
                                                                                }elseif($arraySolicitudDatos['tipo_comentario_cli_soli']=='mejoras'){
                                                                                    echo "<div class='col-xs-3 text-right'><div class='btn btn-warning'>&nbsp;</div></div>";
                                                                                }else{
                                                                                    echo "<div class='col-xs-3 text-right'><div class='btn btn-default'>&nbsp;</div></div>";
                                                                                }
                                                                            ;?> 
                                                                            <div id="versolicitud<?php echo $arraySolicitud['id_soli']?>" class="collapse">
                                                                            <h1 style="display:inline-block">Solicitud numero: <?php echo $idsol;?></h1> 
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
                                                                                            <label>Finalizado por</label>
                                                                                            <?php
                                                                                                //consulta para extraer el nombre del trabajador a partir de su id
                                                                                                $id_trabajador =$arraySolicitudDatos['finalizado_por_soli'];

                                                                                                $sqlNombreApellidoTrabajdor="select nombre_usu, apellido_usu from usuario where id_usu='$id_trabajador'";
                                                                                                $ejecNombreApellidoTrabajdor=mysql_query($sqlNombreApellidoTrabajdor,$conexion);
                                                                                                $arrayNombreApellidoTrabajdor=mysql_fetch_array($ejecNombreApellidoTrabajdor);
                                                                                                $nombre_apellido_trabajador = $arrayNombreApellidoTrabajdor['nombre_usu']." ".$arrayNombreApellidoTrabajdor['apellido_usu'];
                                                                                            ?>
                                                                                            <input  value="<?php echo $nombre_apellido_trabajador;?>" type="tel" name="text" disabled class="form-control" required="" autofocus="">
                                                                                            <br> 
                                                                                            <?php
                                                                                            if ($arraySolicitudDatos['comentario_cli_soli'] && $arraySolicitudDatos['tipo_comentario_cli_soli']){
                                                                                             ?>
                                                                                                <label>Tipo Comentario</label>
                                                                                                <input type="text" disabled class="form-control" value="<?php echo $arraySolicitudDatos['tipo_comentario_cli_soli'];?>" >
                                                                                                <label>Comentario</label>
                                                                                                <textarea class="form-control" rows="8" disabled ><?php echo $arraySolicitudDatos['comentario_cli_soli'];?></textarea>
                                                                                            <?php };?>
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
