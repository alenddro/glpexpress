<?php
header('Content-Type: text/html; charset=ISO-8859-1');
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registro usuario</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/estilos.css">
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
</head>
    <body id="registrarphp">

    <?php
    require_once('conexion.php');

        //Modificar los datos
    if(isset($_POST['modifica'])){
        $id=$_POST['id'];
        $usu=$_POST['nombreusu'];
        $pass=$_POST['password'];
        $nom=$_POST['nombre'];
        $ape=$_POST['apellido'];
        $dir=$_POST['direccion'];
        $tel=$_POST['telefono'];
        $em=$_POST['email'];
        $term=$_POST['terminos'];

        $sqlActualizarUsuario="update usuario set nombreusu_usu='$usu', password_usu='$pass', nombre_usu='$nom', apellido_usu='$ape', direccion_usu='$dir', telefono_usu='$tel', email_usu='$em', terminosycondiciones_usu='0' where id_usu='$id'";
        $ejecActualizarUsuario = mysql_query($sqlActualizarUsuario, $conexion);

            if ($ejecActualizarUsuario) {;?>


            <div class="modal fade bs-example-modal-lg in" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="false" style="display: block;">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">

                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                      <h4 class="modal-title" id="myLargeModalLabel">Gracias <span class="nombreregistro"><?php echo $nom;?></span> sus datos fueron cambiados</h4>
                    </div>
                    <div class="modal-body">
                        <img src="img/logo.gif" alt="">
                    </div>
                  </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div>

            <script>
             setTimeout(function () {
               window.location.href = "solicita.php";
            }, 3000);
            </script>



            <?php
            }else{

                echo "Porblemas en la insercion de datos";
            }

    //Registro Trabajadores
    }else if(isset($_POST['reg_trab'])){

        $usu=$_POST['nombreusu'];
        $pass=$_POST['password'];
        $nom=$_POST['nombre'];
        $ape=$_POST['apellido'];
        $dir=$_POST['direccion'];
        $tel=$_POST['telefono'];
        $em=$_POST['email'];
        $term=$_POST['terminos'];


        $sqlInsertarUsuario="insert into usuario (nombreusu_usu, password_usu, nombre_usu, apellido_usu, direccion_usu, telefono_usu, email_usu, terminosycondiciones_usu, esadmin) values ('$usu','$pass','$nom','$ape','$dir','$tel','$em','$term','1')";
        $ejecInsertarUsuario = mysql_query($sqlInsertarUsuario, $conexion);

        if ($ejecInsertarUsuario) {;?>


        <div class="modal fade bs-example-modal-lg in" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="false" style="display: block;">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">

                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                  <h4 class="modal-title" id="myLargeModalLabel">Gracias <span class="nombreregistro"><?php echo $nom;?></span> Por registrarte en GLPEXPRESS ahora puede iniciar sesion</h4>
                </div>
                <div class="modal-body">
                    <img src="img/logo.gif" alt="">
                </div>
              </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div>

        <script>
         setTimeout(function () {
           window.location.href = "administrar.php";
        }, 5000);
        </script>



        <?php
        }else{

            echo "Porblemas en la insercion de datos";
        }



    }else{
        //Registro Usuarios

        $usu=$_POST['nombreusu'];
        $pass=$_POST['password'];
        $nom=$_POST['nombre'];
        $ape=$_POST['apellido'];
        $dir=$_POST['direccion'];
        $tel=$_POST['telefono'];
        $em=$_POST['email'];
        $term=$_POST['terminos'];


        $sqlInsertarUsuario="insert into usuario (nombreusu_usu, password_usu, nombre_usu, apellido_usu, direccion_usu, telefono_usu, email_usu, terminosycondiciones_usu, esadmin) values ('$usu','$pass','$nom','$ape','$dir','$tel','$em','$term','0')";
        $ejecInsertarUsuario = mysql_query($sqlInsertarUsuario, $conexion);

        if ($ejecInsertarUsuario) {;?>

           
        <div class="modal fade bs-example-modal-lg in" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="false" style="display: block;">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">

                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                  <h4 class="modal-title" id="myLargeModalLabel">Gracias <span class="nombreregistro"><?php echo $nom;?></span> Por registrarte en GLPEXPRESS ahora puede iniciar sesion</h4>
                </div>
                <div class="modal-body">
                    <img src="img/logo.gif" alt="">
                </div>
              </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div>

        <script>
         setTimeout(function () {
           window.location.href = "index.html";
        }, 5000);
        </script>



        <?php
        }else{

            echo "Porblemas en la insercion de datos";
        }
    }
   ?>
    </body>
</html>