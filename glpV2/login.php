<?php 
session_start();
header('Content-Type: text/html; charset=ISO-8859-1');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
     <meta charset="UTF-8">
    <title>Registro usuario</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/estilos.css">
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
</head>
    <body id="loginphp">


    <?php
    require("conexion.php");



    $_SESSION['email_usu']=$_POST['txtlogin'];
    $_SESSION['password_usu']=$_POST['txtpassword'];


    $usu=$_SESSION['email_usu'];
    $pass=$_SESSION['password_usu'];



    $sqlLogin = "select * from usuario where email_usu='$usu' and password_usu='$pass' and EstadoKEY='1'";
    $ejecLogin = mysql_query($sqlLogin, $conexion) or die ("Fallo en la consulta login");
    $arrayLogin= mysql_fetch_array($ejecLogin);

    $_SESSION['id_usu']=$arrayLogin['id_usu'];
    $_SESSION['nombre_usu']=$arrayLogin['nombre_usu'];
    $_SESSION['apellido_usu']=$arrayLogin['apellido_usu'];
    $_SESSION['esadmin']=$arrayLogin['esadmin'];

    if ($arrayLogin['email_usu'] == $usu && $arrayLogin['password_usu'] == $pass){
        if ( $_SESSION['esadmin']==0) {
        ?>

            <script>
                window.location.href = "solicita.php";
            </script>


        <?php
        } elseif($_SESSION['esadmin']==1){

        ?>


            <script>
                window.location.href = "listado.php";
            </script>


        <?php
        } elseif($_SESSION['esadmin']==2 or $_SESSION['esadmin']==3){

        ?>


            <script>
                window.location.href = "admin/administracion.php";
            </script>


        <?php
        }else{
        ?>    
             <script>
                window.location.href = "admin/index.php";
            </script>
        <?php
        }
    }else{


        ?>

          <div class="modal fade bs-example-modal-lg in" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="false" style="display: block;">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">

                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                      <h4 class="modal-title" id="myLargeModalLabel">Error al iniciar sesion, Puede que su cuenta no este activada, intentelo otra vez!</h4>
                    </div>
                    <div class="modal-body">
                        <img src="img/logo.gif" alt="">
                    </div>
                  </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div>

        <script>
             setTimeout(function () {
               window.location.href = "index.php";
            }, 3000);
            </script>

        <?php
        }
        ?>


    </body>
</html>