
<?php
session_start();
header('Content-Type: text/html; charset=ISO-8859-1');
require_once('conexion.php');



    $idsol=$_GET['l'];

    $sqlSolicitudDatos="select * from solicitud, usuario, producto where solicitud.id_soli='$idsol' and usuario.id_usu=solicitud.cliente_id_soli and producto.id_prod=solicitud.producto_id_soli";
    $ejecSolicitudDatos=mysql_query($sqlSolicitudDatos);
    $arraySolicitudDatos=mysql_fetch_array($ejecSolicitudDatos);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Modificar | GLPEXPRESS</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/estilos.css">
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

    <div class="jumbotron" id="formulario-registro">
        <section id="principal-registro" class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="container">
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="starter-template hidden-xs">
                                    <h1>Solicitud numero: <?php echo $idsol;?></h1>
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
                                                         <h2 class="form-signin-heading">Datos de la Solicitud</h2>
                                                    </div>
                                                </div>
                                            </div>
                                            <form class="form-signin registro-lipigas" role="form" method="post" action="registrar.php">
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
                                                <input  value="<?php echo $arraySolicitudDatos['nombre_prod']?>" type="text" disabled name="detalle" class="form-control" required="" autofocus="">
                                                <br>
                                                <label>Valor</label>
                                                <input  value="$<?php echo $arraySolicitudDatos['valor_prod']?>" type="text" disabled name="email" class="form-control" required="" autofocus="">
                                                <br>
                                                <label>Fecha/Hora Solicitud</label>
                                                <input  value="<?php echo $arraySolicitudDatos['fec_solicitud_soli']?>" type="tel" name="text" disabled class="form-control" required="" autofocus="">
                                                <br>
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