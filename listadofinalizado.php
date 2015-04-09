<?php session_start();
require_once('conexion.php');


    if($_SESSION['esadmin']==1 || $_SESSION['esadmin']==2 || $_SESSION['esadmin']==3 ){

        //Todos los pedidos activos
        $sqlSolicitud="select producto.*, solicitud.* from solicitud, producto where producto.id_prod=solicitud.producto_id_soli and (solicitud.estado_solicitud_soli='finalizado' or solicitud.estado_solicitud_soli='oculto')  order by solicitud.fec_solicitud_soli desc";
        $ejecSolicitud=mysql_query($sqlSolicitud, $conexion);

    }    
       
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Listado Finalizado</title>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="css/estilos.css">
		<link href="css/sticky-footer.css" rel="stylesheet">
	    <script type="text/javascript" src="js/jquery.js"></script>
		<script type="text/javascript" src="js/bootstrap.min.js"></script>
	</head>
	<body>

		<header>
	        <div class="navbar navbar-inverse navbar-default" id="nav-lipigas" role="navigation">
	          <div class="container">
	            <div class="navbar-header">
	              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
	                <span class="sr-only">Toggle navigation</span>
	                <span class="icon-bar"></span>
	                <span class="icon-bar"></span>
	                <span class="icon-bar"></span>
	              </button>
	              <a class="logotipo" href="#"><img src="img/logotipo.png" class="img-responsive" alt="logotipo"></a>
	            </div>
	            <div class="collapse navbar-collapse navbar-right">
	              <ul class="nav navbar-nav">
	                <li class="active"><a href="index.html">Home</a></li>
	              </ul>
	            </div><!--/.nav-collapse -->
	          </div>
	        </div>
	    </header>

	    <section class="container">
	   		<div class="row">
		        <a href="cierra_session.php">Cerrar Sesion</a>
		        <?php if ( $_SESSION['esadmin']==2 || $_SESSION['esadmin']==3){ ?>
                    <br>
		            <a href="administrar.php">Regresar al Menu principal</a>
		        <?php } ?>
	   		</div>
	    </section>

	    <div class="jumbotron" id="formulario-registro">
	       	<section id="principal-registro" class="container-fluid">
	            <div class="row">
	                <div class="col-md-12">
	                    <div class="container">
	                        <div class="row">
	                            <div class="col-xs-12">
	                                <div class="starter-template hidden-xs">
	                                    <h1></h1>
	                                    <p class="lead">Bienvenido al Listado de Solicitudes <i><strong><?php echo $_SESSION['nombre_usu']?></strong></i></p>
	                                 </div>
	                                 <div class="starter-template visible-xs-block hidden-lg hidden-md hidden-sm">
	                                    <h2>Bienvenido al Listado de Solicitudes Finalizadas</h2>
	                                     
	                                 </div>
	                            </div><!-- /.container -->      


	                            <section class="container-fluid">   
	                                <div class="row">
	                                    <div class="col-xs-12 col-md-12 ">
	                                        <article class="container">
	                                            <div class="container-fluid">  
	                                                <div class="row">
	                                                    <div class="col-xs-12 head-registro">
	                                                         <h2 class="form-signin-heading">&nbsp;Listado de Solicitudes Finalizadas</h2>
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
	                                                if($_SESSION['esadmin']==1 || $_SESSION['esadmin']==2 || $_SESSION['esadmin']==3){
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
	                                                         <div class="col-xs-8"><a href="#versolicitud<?php echo $arraySolicitud['id_soli']?>" data-toggle="collapse"><?php echo "Solicitud N:".$idsol." | ";?> &nbsp;<?php echo $arraySolicitud['fec_solicitud_soli']." | ";?>  &nbsp;  <?php echo $arraySolicitud['nombre_prod']; ?>&nbsp;  | FINALIZADA 
                                                            </a></div>
                                                                 <?php if($arraySolicitudDatos['tipo_comentario_cli_soli']=='felicitacion'){
                                                                        echo "<div class='col-xs-4 text-right'><div class='btn btn-primary'>&nbsp;</div></div>";
                                                                    }elseif($arraySolicitudDatos['tipo_comentario_cli_soli']=='reclamo'){
                                                                        echo "<div class='col-xs-4 text-right'><div class='btn btn-danger'>&nbsp;</div></div>";
                                                                    }elseif($arraySolicitudDatos['tipo_comentario_cli_soli']=='otro'){
                                                                        echo "<div class='col-xs-4 text-right'><div class='btn btn-success'>&nbsp;</div></div>";
                                                                    }elseif($arraySolicitudDatos['tipo_comentario_cli_soli']=='mejoras'){
                                                                        echo "<div class='col-xs-4 text-right'><div class='btn btn-warning'>&nbsp;</div></div>";
                                                                    }else{
                                                                        echo "<div class='col-xs-4 text-right'><div class='btn btn-default'>&nbsp;</div></div>";
                                                                    }
                                                                ;?> 
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

	    <?php require_once("isset/footer.html");?>
		
	</body>
</html>