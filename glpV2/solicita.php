<?php
session_start();
header('Content-Type: text/html; charset=ISO-8859-1');
require_once('conexion.php');
        //id usuario logueado
        $sqlIDusuarioLogueado="select * from usuario where nombreusu_usu='$_SESSION[nombreusu_usu]'";
        $ejecIDusuarioLogueado=mysql_query($sqlIDusuarioLogueado, $conexion);
        $arrayIDusuarioLogueado=mysql_fetch_array($ejecIDusuarioLogueado);

        //productos
        $sqlProductos="select * from producto";
        $ejecProductos=mysql_query($sqlProductos, $conexion);

        while($arrayProductos=mysql_fetch_array($ejecProductos)){

            $id[]=$arrayProductos['id_prod'];
            $producto[]=$arrayProductos['nombre_prod'];
            $valor[]=$arrayProductos['valor_prod'];
        }



?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Solicite | GLPEXPRESS</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/estilos.css">
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
</head>
<body id="solicita-gas">
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
                <li class="active"><a href="index.php">Home</a></li>
              </ul>
            </div><!--/.nav-collapse -->
          </div>
        </div>
    </header>

    <section id="usuLogueado" style="margin-top: 67px;" class="container">
        <div class="row">
            <div class="col-xs-12">
                <p><small>Bienvenido Usuario: <strong><i class="nombreusu"><?php echo $_SESSION['nombre_usu'];?></i></strong></small></p>
                <p><a href="modificardatos.php" style="text-decoration:none;"> Modificar datos de la cuenta</a></p>
                <p><small><a style="text-decoration:none;" href="listado.php">Ver mis solicitudes</a></small></p>
                <p><small><a style="text-decoration:none;" href="cierra_session.php">Cerrar Sesion</a></small></p>
            </div>
        </div>
    </section>

    <section id="formulario-solicita" class="jumbotron container-fluid">
        <article class="row registro-lipigas">
            <div class="col-xs-12 text-center ">
                <h2>Solicite Su Pedido</h2>
                <div class="col-xs-12 head-registro">
                     <h2 class="form-signin-heading">Porfavor Complete todos los campos</h2>
                </div>
                <form action="pedido.php" method="post">
                    <input type="hidden" name="idusuario" value="<?php echo $arrayIDusuarioLogueado['id_usu'];?>">
                    <div class="container-fluid contenedor-gas">
                        <div class="row">
                            <div class="col-xs-6 col-md-6 text-right">
                                <img src="img/5kg.jpg" alt="5kg" width="100">
                            </div>
                            <div class="col-xs-6 col-md-6 text-left radio-gas">
                                <input type="radio" name="idgas" value="<?php echo $id[0]?>"><?php echo  $producto[0];?>
                                <label>$<?php echo $valor[0];?></label>
                            </div>
                            <div class="clearfix"></div>
                            <div class="col-xs-6 col-md-6 text-right">
                                <img src="img/15kg.jpg" alt="15kg" width="100">
                            </div>
                            <div class="col-xs-6 col-md-6 text-left radio-gas">
                                <input type="radio" name="idgas" value="<?php echo $id[1]?>"><?php echo  $producto[1];?>
                                <label>$<?php echo $valor[1];?></label>
                            </div>

                            <div class="clearfix"></div>
                            <div class="col-xs-6 col-md-6 text-right">
                                <img src="img/45kg.jpg" alt="45kg" width="100">
                            </div>
                            <div class="col-xs-6 col-md-6 text-left radio-gas">
                                <input type="radio" name="idgas" value="<?php echo $id[2]?>"><?php echo  $producto[2];?>
                                <label>$<?php echo $valor[2];?></label>
                            </div>

                            <div class="clearfix"></div>
                            <div class="row">
                                <div class="col-xs-12 text-center">
                                    <input type="checkbox" name="terminos" value="si">Enviar mi Localizacion actual
                                </div>
                            </div>

                            <div class="col-xs-12 text-center" id="metodopago">
                                <h2>Modo De Pago:</h2>
                                <select name="metodopago_cli" class="dropdown-metodo-pago">
                                    <option value="efectivo">Efectivo</option>
                                    <option value="credito">Credito Casa Comercial</option>
                                    <option value="visa">Visa-Master card</option>
                                </select>
                            </div>

                            <div class="row">
                                <div class="col-xs-12 text-center">
                                    <button class="btn btn-lg btn-warning btn-block" type="submit">Solicitar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </article>
    </section>
    <?php require_once("isset/footer.html");?>
</body>
</html>