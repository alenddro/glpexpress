<?php session_start();
header('Content-Type: text/html; charset=ISO-8859-1');
require_once('conexion.php');


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
           
             //listado trabajaores
            $sqlListadoTrabajadores="select * from usuario where esadmin='1' order by id_usu desc";
            $ejecListadoTrabajadores=mysql_query($sqlListadoTrabajadores, $conexion);
            
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
                            <section class="container-fluid">   
                                <div class="row">
                                    <div class="col-xs-12 col-md-12 ">
                                        <article class="container">
                                            <div class="container-fluid">  
                                                <div class="row">
                                                    <div class="col-xs-12 head-registro">
                                                         <h2 class="form-signin-heading">&nbsp;Listado de Trabajadores</h2>
                                                    </div>
                                                </div>
                                            </div>
                                            <form class="form-signin registro-lipigas-listado" role="form" id="listadogas">
                                               <?php
                                                while($arrayListadoTrabajadores=mysql_fetch_array($ejecListadoTrabajadores)){
                                                ?>
                                                    <div class="col-xs-12 listado-trabajador">
                                                        <a href="#vertrabajador<?php echo $arrayListadoTrabajadores['id_usu']?>" data-toggle="collapse"><?php echo $arrayListadoTrabajadores['nombre_usu']; ?>&nbsp;<?php echo $arrayListadoTrabajadores['apellido_usu']; ?>&nbsp;| Telefono: <?php echo $arrayListadoTrabajadores['telefono_usu'];?>&nbsp;| Direccion: <?php echo $arrayListadoTrabajadores['direccion_usu']; ?></a> 
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
                                                                            <input  value="<?php echo $arrayListadoTrabajadores['nombre_usu']?>" type="text" disabled name="nombreusu" class="form-control"  required="" autofocus="">
                                                                            <br>
                                                                            <label>Apellido</label>
                                                                            <input  value="<?php echo $arrayListadoTrabajadores['apellido_usu']?>" type="text" disabled name="password" class="form-control" required="">
                                                                            <br>
                                                                            <label>Direccion</label>
                                                                            <input  value="<?php echo $arrayListadoTrabajadores['direccion_usu']?>" type="text" disabled name="reppassword" class="form-control" required="">
                                                                            <br>
                                                                            <label>Telefono</label>
                                                                            <input  value="<?php echo $arrayListadoTrabajadores['telefono_usu']?>" type="text" disabled name="direccion" class="form-control" required="" autofocus="">
                                                                            <br>
                                                                            <label>Email</label>
                                                                            <input  value="<?php echo $arrayListadoTrabajadores['email_usu']?>" type="text" disabled name="nombre" class="form-control" required="" autofocus="">
                                                                            <br>
                                                                            <label>Nombre de Usuario</label>
                                                                            <input  value="<?php echo $arrayListadoTrabajadores['nombreusu_usu']?>" type="text" disabled name="email" class="form-control" required="" autofocus="">
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

   <?php require_once("isset/footer.html");?>
</body>
</html>