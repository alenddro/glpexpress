
<?php
header('Content-Type: text/html; charset=ISO-8859-1');
session_start();
require_once('conexion.php');
    $usuariousu = $_SESSION['nombreusu_usu'];
    $sqlDatosUsuario="select * from usuario where nombreusu_usu='$usuariousu' ";
    $ejecDatosUsuario=mysql_query($sqlDatosUsuario);
    $arrayDatosUsuario=mysql_fetch_array($ejecDatosUsuario);
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
                                    <h1>Modificar Datos</h1>
                                    <p class="lead">Bienvenido! </p>
                                 </div>
                                 <div class="starter-template visible-xs-block hidden-lg hidden-md hidden-sm">
                                    <h2>Modificar Datos</h2>
                                     
                                 </div>
                            </div><!-- /.container -->      


                            <section class="container-fluid">   
                                <div class="row">
                                    <div class="col-xs-12 col-md-12 ">
                                        <article class="container">
                                            <div class="container-fluid">  
                                                <div class="row">
                                                    <div class="col-xs-12 head-registro">
                                                         <h2 class="form-signin-heading">Porfavor Complete todos los campos</h2>
                                                    </div>
                                                </div>
                                            </div>
                                            <form class="form-signin registro-lipigas" role="form" method="post" action="registrar.php">
                                                <input type="hidden" name="id" value="<?php echo $arrayDatosUsuario['id_usu']?>">
                                                <input type="hidden" name="modifica" value="1">
                                                <label>Nombre de usuario</label>
                                                <input  value="<?php echo $arrayDatosUsuario['nombreusu_usu']?>" type="text" name="nombreusu" class="form-control"  required="" autofocus="">
                                                <br>
                                                <label>Password</label>
                                                <input  value="<?php echo $arrayDatosUsuario['password_usu']?>" type="password" name="password" class="form-control" required="">
                                                <br>
                                                <label>Repita Password</label>
                                                <input  value="<?php echo $arrayDatosUsuario['password_usu']?>" type="password" name="reppassword" class="form-control" required="">
                                                <br>
                                                <label>Nombre</label>
                                                <input  value="<?php echo $arrayDatosUsuario['nombre_usu']?>" type="text" name="nombre" class="form-control" required="" autofocus="">
                                                <br>
                                                <label>Apellido</label>
                                                <input  value="<?php echo $arrayDatosUsuario['apellido_usu']?>" type="text" name="apellido" class="form-control" required="" autofocus="">
                                                <br>
                                                <label>Direccion</label>
                                                <input  value="<?php echo $arrayDatosUsuario['direccion_usu']?>" type="text" name="direccion" class="form-control" required="" autofocus="">
                                                <br>
                                                <label>Telefono</label>
                                                <input  value="<?php echo $arrayDatosUsuario['telefono_usu']?>" type="tel" name="telefono" class="form-control" required="" autofocus="">
                                                 <br>
                                                <label>E-mail</label>
                                                <input  value="<?php echo $arrayDatosUsuario['email_usu']?>" type="email" name="email" class="form-control" required="" autofocus="">
                                                 <br>
                                                <label class="checkbox">
                                                <input type="checkbox" name="terminos" value="si" checked> Acepto los terminos y condiciones!
                                                </label>
                                                <button class="btn btn-lg btn-warning btn-block" type="submit">Modificar!</button>
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