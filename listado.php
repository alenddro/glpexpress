<?php session_start();
header('Content-Type: text/html; charset=ISO-8859-1');
require_once('conexion.php');


        if ($_SESSION['esadmin']==0) {

             //id usuario logueado
            $sqlIDusuarioLogueado="select * from usuario where nombreusu_usu='$_SESSION[nombreusu_usu]'";
            $ejecIDusuarioLogueado=mysql_query($sqlIDusuarioLogueado, $conexion);
            $arrayIDusuarioLogueado=mysql_fetch_array($ejecIDusuarioLogueado);

            $cliid=$arrayIDusuarioLogueado['id_usu'];

             //mis solicitudes
            $sqlSolicitud="select producto.*, solicitud.* from solicitud, producto where solicitud.cliente_id_soli='$cliid' and producto.id_prod=solicitud.producto_id_soli order by solicitud.fec_solicitud_soli desc";
            $ejecSolicitud=mysql_query($sqlSolicitud, $conexion);

        }elseif($_SESSION['esadmin']==1 || $_SESSION['esadmin']==2 ){

            //Todos los pedidos activos
            $sqlSolicitud="select producto.*, solicitud.* from solicitud, producto where producto.id_prod=solicitud.producto_id_soli and solicitud.estado_solicitud_soli='activo' order by solicitud.fec_solicitud_soli desc";
            $ejecSolicitud=mysql_query($sqlSolicitud, $conexion);




        }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Listado | GLPEXPRESS</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/estilos.css">
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
</head>
<body>

   <header>
        <div class="navbar navbar-inverse navbar-fixed-top" id="nav-lipigas" role="navigation">
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
         <a href="cierra_session.php">Cerrar Sesion</a>
         <?php if ( $_SESSION['esadmin']==2){ ?>
            <a href="administrar.php">Regresar al Menu principal</a>
         <?php }else if($_SESSION['esadmin']==0){?>
            <a href="solicita.php">Regresar a Solicitudes</a>
        <?php } ?>
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
                                    <h2>Bienvenido al Listado de Solicitudes</h2>

                                 </div>
                            </div><!-- /.container -->


                            <section class="container-fluid">
                                <div class="row">
                                    <div class="col-xs-12 col-md-12 ">
                                        <article class="container">
                                            <div class="container-fluid">
                                                <div class="row">
                                                    <div class="col-xs-12 head-registro">
                                                         <h2 class="form-signin-heading">&nbsp;Listado de Solicitudes</h2>
                                                    </div>
                                                </div>
                                            </div>
                                            <form class="form-signin registro-lipigas-listado" role="form" id="listadogas">
                                               <?php
                                                if ($_SESSION['esadmin']==0) {
                                                    while($arraySolicitud=mysql_fetch_array($ejecSolicitud)){
                                                   ?>
                                                   
                                                      <div class="col-xs-12" style="background:yellow;opacity:0.5; font-size:20px; padding:10px;color:black;margin-top:5px;">
                                                          <?php echo $arraySolicitud['fec_solicitud_soli'];?>  &nbsp;  <?php echo $arraySolicitud['nombre_prod']; ?>&nbsp; <?php $estado = $arraySolicitud['estado_solicitud_soli'] == 'finalizado' ? "FINALIZADA " : "ACTIVO"; echo $estado;?>
                                                          <?php $estado=$arraySolicitud['estado_solicitud_soli'];?>
                                                          <?php if ($estado=='finalizado'){ ?>
                                                              <div class="text-right">
                                                                  <a href="#" class="btn btn-primary">Dejar un comentario</a>
                                                                  <a href="#" class="btn btn-danger">Eliminar</a>
                                                              </div>
                                                           <?php } ?> 

                                                      </div>
                                                      <br>
                                                  
                                                   <?php  
                                                    }
                                                }elseif($_SESSION['esadmin']==1 || $_SESSION['esadmin']==2){
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
                                                                            <?php if ($_SESSION['esadmin']==1){ ?>
                                                                                    <div class="btn btn-success"><a href="finalizar-pedido.php?l=<?php echo $arraySolicitud['id_soli']?>" style="color:white;">Finalizar Pedido</a></div>
                                                                                    <div class="btn btn-danger"><a href="rechazar-pedido.php?l=<?php echo $arraySolicitud['id_soli']?>" style="color:white;">Rechazar Pedido</a></div>
                                                                            <?php } ?>
                                                                      

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

    <footer class="container-fluid">
        <div class="row">
            <div class="col-xs-12">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 text-center">
                            <p>Sucursal Lipigas &copy; Company 2014</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>