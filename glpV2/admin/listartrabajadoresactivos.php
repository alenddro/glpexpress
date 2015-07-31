<?php 
session_start();
header('Content-Type: text/html; charset=ISO-8859-1');
require_once('../conexion.php');
require_once('../admin/assets/function/arreglarhorafecha.php');  


 		        //Estados del Usuario / Trabajdor (esadmin)
        /*
        0.-Usuario/cliente
        1.-Trabajador
        2.-Admin
        3.-Secretaria
        4.-Usuario/cliente dado de baja
        5.-Trabajador dado de baja
        */


        if ($_SESSION['esadmin']==2) {
           
             //listado trabajadores activos
            $sqlListadoTrabajadores="select * from usuario,trabajadoractivo,camion where usuario.esadmin='1' and usuario.id_usu=trabajadoractivo.id_trab_activo and trabajadoractivo.id_camion_trab_activo=camion.id_cam and trabajadoractivo.estado_trab_activo='1' order by usuario.id_usu desc";
            $ejecListadoTrabajadores=mysql_query($sqlListadoTrabajadores, $conexion);
            
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

    <title>Listado de Trabajadores Activos</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />

    <link rel="stylesheet" type="text/css" href="../css/estilos.css">
        
    <!-- Custom styles for this template -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">

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
          	<h3><i class="fa fa-angle-right"></i> Listado de Trabajadores Activos</h3>
          	<div class="row mt">
          		<div class="col-lg-12">
          		 <div class="jumbotron" id="formulario-registro">
			        <section id="principal-registro" class="container-fluid">
			            <div class="row">
			                <div class="col-md-12">
			                    <div class="container">
			                        <div class="row">
			                            <section class="container-fluid">   
			                                <div class="row">
			                                    <div class="col-xs-12 col-md-12 ">
			                                        <article class="container">
			                                            <div class="container-fluid">  
			                                            </div>
			                                            <form class="form-signin registro-lipigas-listado" role="form" id="listadogas">
			                                               <?php
			                                                while($arrayListadoTrabajadores=mysql_fetch_array($ejecListadoTrabajadores)){
			                                                ?>
			                                                    <div class="col-xs-12 listado-trabajador">
			                                                        <a href="#vertrabajador<?php echo $arrayListadoTrabajadores['id_usu']?>" data-toggle="collapse"><?php echo $arrayListadoTrabajadores['nombre_usu']; ?>&nbsp;<?php echo $arrayListadoTrabajadores['apellido_usu']; ?>&nbsp;| Telefono: <?php echo $arrayListadoTrabajadores['telefono_usu'];?>&nbsp;| Direccion: <?php echo $arrayListadoTrabajadores['direccion_usu']; ?>&nbsp;| Inicio: <?php separarHoraFechaOrdenar($arrayListadoTrabajadores['fec_asignacion_trab_activo']); ?>&nbsp;| Camion: <?php echo $arrayListadoTrabajadores['modelo_cam']." ".$arrayListadoTrabajadores['marca_cam']." ".$arrayListadoTrabajadores['patente_cam'] ; ?></a> 
			                                                            <div id="vertrabajador<?php echo $arrayListadoTrabajadores['id_usu']?>" class="collapse">
			                                                            <h1>Codigo Trabajdor: <?php echo $arrayListadoTrabajadores['id_usu'];?></h1> 
			                                                            <div class="row">
			                                                                <div class="col-xs-12 col-md-12 ">
			                                                                    <article class="container">
			                                                                        <div class="container-fluid">  
			                                                                            <div class="row">
			                                                                                <div class="col-xs-12 head-registro">
			                                                                                     <h2 class="form-signin-heading">Datos del Trabajador</h2>
			                                                                                </div>
			                                                                            </div>
			                                                                        </div>
			                                                                       
			                                                                            <label>Nombre</label>
			                                                                            <input  value="<?php echo $arrayListadoTrabajadores['nombre_usu'];?>" type="text" disabled name="nombreusu" class="form-control"  required="" autofocus="">
			                                                                            <br>
			                                                                            <label>Apellido</label>
			                                                                            <input  value="<?php echo $arrayListadoTrabajadores['apellido_usu'];?>" type="text" disabled name="password" class="form-control" required="">
			                                                                            <br>
			                                                                            <label>Direccion</label>
			                                                                            <input  value="<?php echo $arrayListadoTrabajadores['direccion_usu'];?>" type="text" disabled name="reppassword" class="form-control" required="">
			                                                                            <br>
			                                                                            <label>Telefono</label>
			                                                                            <input  value="<?php echo $arrayListadoTrabajadores['telefono_usu'];?>" type="text" disabled name="direccion" class="form-control" required="" autofocus="">
			                                                                            <br>
			                                                                            <label>Email</label>
			                                                                            <input  value="<?php echo $arrayListadoTrabajadores['email_usu'];?>" type="text" disabled name="nombre" class="form-control" required="" autofocus="">
                                                                                  <br>
                                                                                  <label>Camion:</label>
                                                                                  <input  value="<?php echo $arrayListadoTrabajadores['modelo_cam'].' '.$arrayListadoTrabajadores['marca_cam'].' '.$arrayListadoTrabajadores['patente_cam'];?>" type="text" disabled name="nombre" class="form-control" required="" autofocus="">
                                                                                  <br>
                                                                                  <label>Stock Original:</label>
                                                                                  <textarea  value="<?php echo $arrayListadoTrabajadores['stock_gas_original_trab_activo'];?>" disabled name="stock" class="form-control"  rows="3" autofocus=""><?php echo $arrayListadoTrabajadores['stock_gas_original_trab_activo'];?></textarea>
                                                                                  <br>
                                                                                  <label>Stock En Camion Ahora:</label>
                                                                                  <input  value="Stock de 5 kg: <?php echo $arrayListadoTrabajadores['stock_gas_5_trab_activo'];?>" type="text" disabled name="gas5" class="form-control" required="" autofocus="">
                                                                                  <input  value="Stock de 15 kg: <?php echo $arrayListadoTrabajadores['stock_gas_15_trab_activo'];?>" type="text" disabled name="gas15" class="form-control" required="" autofocus="">
                                                                                  <input  value="Stock de 45 kg: <?php echo $arrayListadoTrabajadores['stock_gas_45_trab_activo'];?>" type="text" disabled name="gas45" class="form-control" required="" autofocus="">
                                                                                  <br>
			                                                                            <label>Tipo de Trabajador</label>
			                                                                            <?php
			                                                                                if ($arrayListadoTrabajadores['esadmin']==3) {
			                                                                                    $tipo_tarbajador="Secretaria";
			                                                                                }elseif($arrayListadoTrabajadores['esadmin']==1){
			                                                                                    $tipo_tarbajador="Trabajador";
			                                                                                }else{
			                                                                                    $tipo_tarbajador="No especificado";
			                                                                                }


			                                                                            ?>
			                                                                            <input  value="<?php echo $tipo_tarbajador;?>" type="text" disabled name="nombre" class="form-control" required="" autofocus="">
			                                                                            <br>
                                                                                        <a href="finalizarturnotrabajador.php?l=<?php echo $arrayListadoTrabajadores['id_usu']; ?>&a=<?php echo $arrayListadoTrabajadores['stock_gas_5_trab_activo'];?>&b=<?php echo $arrayListadoTrabajadores['stock_gas_15_trab_activo'];?>&c=<?php echo $arrayListadoTrabajadores['stock_gas_45_trab_activo'];?>" class="btn btn-danger">Finalizar Turno</a>
                                                                                        <br>
			                                                                    </article>
			                                                                </div>
			                                                            </div>
			                                                         </div>  
			                                                     </div>                                                 
			                                                        <br>
			                                                       <?php  
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
