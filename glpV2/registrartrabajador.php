<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registro | GLPEXPRESS</title>
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
                <li class="active"><a href="index.php">Home</a></li>
              </ul>
            </div><!--/.nav-collapse -->
          </div>
        </div>
    </header>

     <section id="usuLogueado" class="container">
                        <div class="row">
                            <div class="col-xs-12">
                                <a href="cierra_session.php">Cerrar Sesion</a>
                                <br>
                                <a href="administrar.php">Volver a Menu Pricipal</a>
                            </div>
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
                                    <h1>Registro Trabajador</h1>
                                    <p class="lead">Bienvenido! </p>
                                 </div>
                                 <div class="starter-template visible-xs-block hidden-lg hidden-md hidden-sm">
                                    <h2>Bienvenido a Registro Trabajadores</h2>

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
                                            	<input type="hidden" name="reg_trab">
                                                <label>E-mail</label>
                                                <input type="email" name="email" class="form-control" required="" autofocus="">
                                                <br>
                                                <br>
                                                <label>Password</label>
                                                <input type="password" name="password" class="form-control" required="">
                                                <br>
                                                <label>Repita Password</label>
                                                <input type="password" name="reppassword" class="form-control" required="">
                                                <br>
                                                <label>Nombre</label>
                                                <input type="text" name="nombre" class="form-control" required="" autofocus="">
                                                <br>
                                                <label>Apellido</label>
                                                <input type="text" name="apellido" class="form-control" required="" autofocus="">
                                                <br>
                                                <label>Direccion</label>
                                                <input type="text" name="direccion" class="form-control" required="" autofocus="">
                                                <br>
                                                <label>Telefono</label>
                                                <input type="tel" name="telefono" class="form-control" required="" autofocus="">
                                                <label>Tipo de Tarbajador</label>
                                                <br>
                                                <select name="tipo_trabajador" class="col-xs-12" style="border-radius:3px;height:35px;" id="tipo_trabajador">
                                                    <option value="1">Trabajador</option>
                                                    <option value="3">Secretaria</option>
                                                </select>
                                                <br>
                                                <br>
                                                <br>
                                                <button class="btn btn-lg btn-warning btn-block" type="submit">Registrarme!</button>
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