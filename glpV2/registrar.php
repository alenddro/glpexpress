<?php
header('Content-Type: text/html; charset=ISO-8859-1');
session_start();
require_once('conexion.php');
require_once('isset/functions.php');
   

    function verExistencia($email, $conexion){
        $mailverificar= $email;
        $sqlExistencia="select * from usuario where email_usu='$mailverificar'";
        $ejecExistencia=mysql_query($sqlExistencia,$conexion);
        $rowExistencia=mysql_num_rows($ejecExistencia);
        if ($rowExistencia > 0) {
            $mensaje = 0;
        }else{
            $mensaje = 1;
        }
        return $mensaje;
    }

    $fecha_registro = date("d-m-Y");

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
        $pass=$_POST['password'];
        $nom=$_POST['nombre'];
        $ape=$_POST['apellido'];
        $dir=$_POST['direccion'];
        $tel=$_POST['telefono'];
        $em=$_POST['email'];

        $sqlActualizarUsuario="update usuario set password_usu='$pass', nombre_usu='$nom', apellido_usu='$ape', direccion_usu='$dir', telefono_usu='$tel', email_usu='$em' where id_usu='$id'";
        $ejecActualizarUsuario = mysql_query($sqlActualizarUsuario, $conexion);

            if ($ejecActualizarUsuario) {;?>


            <div class="modal fade bs-example-modal-lg in" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="false" style="display: block;">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">

                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                      <h4 class="modal-title" id="myLargeModalLabel">Gracias <span class="nombreregistro"><?php echo $nom;?></span> sus datos fueron cambiados Vuelva a iniciar sesion para aplciar los cambios!</h4>
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
            }else{

                echo "Porblemas en la insercion de datos";
            }

    //Registro Trabajadores
    }else if(isset($_POST['reg_trab'])){

        $em=$_POST['email'];

        $r = verExistencia($em, $conexion);
        if ($r==0) {
            ?>
        <div class="modal fade bs-example-modal-lg in" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="false" style="display: block;">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                  <h4 class="modal-title" id="myLargeModalLabel">El correo <span class="nombreregistro"></span> Ingresado ya Existe Intente Nuevamente</h4>
                </div>
                <div class="modal-body">
                    <img src="img/logo.gif" alt="">
                </div>
              </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div>
        <script>
          setTimeout(function () {
           window.location.href = "admin/registrartrabajador.php";
        }, 4000);
        </script>
            <?php
        }else{

            $pass=$_POST['password'];
            $nom=$_POST['nombre'];
            $ape=$_POST['apellido'];
            $dir=$_POST['direccion'];
            $tel=$_POST['telefono'];
            $em=$_POST['email'];
            $tipo_trabajador=$_POST['tipo_trabajador'];


            $sqlInsertarUsuario="insert into usuario (password_usu, nombre_usu, apellido_usu, direccion_usu, telefono_usu, email_usu, terminosycondiciones_usu, registrado_el,EstadoKEY, esadmin) values ('$pass','$nom','$ape','$dir','$tel','$em','si', '$fecha_registro','1','$tipo_trabajador')";
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
                   window.location.href = "admin/administracion.php";
                }, 5000);
                </script>
                
            <?php
            }else{

                echo "Problemas en la insercion de datos trabajador";
            }
        }


    }else{
        //Registro Usuarios

        $em=$_POST['email'];

        $r = verExistencia($em, $conexion);
        if ($r==0) {
            ?>
        <div class="modal fade bs-example-modal-lg in" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="false" style="display: block;">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                  <h4 class="modal-title" id="myLargeModalLabel">El correo <span class="nombreregistro"></span> Ingresado ya Existe Intente Nuevamente</h4>
                </div>
                <div class="modal-body">
                    <img src="img/logo.gif" alt="">
                </div>
              </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div>
        <script>
          setTimeout(function () {
           window.location.href = "registro.html";
        }, 4000);
        </script>


            <?php
        }else{



            $pass=$_POST['password'];
            $nom=$_POST['nombre'];
            $em=$_POST['email'];
            $ape=$_POST['apellido'];
            $dir=$_POST['direccion'];
            $tel=$_POST['telefono'];
            $term=$_POST['terminos'];
            $key=(rand(0,100000000));


            $sqlInsertarUsuario="insert into usuario (password_usu, nombre_usu, apellido_usu, direccion_usu, telefono_usu, email_usu, terminosycondiciones_usu, registrado_el,EstadoKEY,CodigoKey, esadmin) values ('$pass','$nom','$ape','$dir','$tel','$em','$term','$fecha_registro','0','$key','0')";
            $ejecInsertarUsuario = mysql_query($sqlInsertarUsuario, $conexion);

            if ($ejecInsertarUsuario) {; ?>

               
            <div class="modal fade bs-example-modal-lg in" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="false" style="display: block;">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">

                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                      <h4 class="modal-title" id="myLargeModalLabel">Gracias <span class="nombreregistro"><?php echo $nom;?></span> Por registrarte en GLPEXPRESS ahora revisa tu email para validar la cuenta</h4>
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
               }, 5000);
            </script> 
      <?php
$mensaje = <<<EOM
<html>
<head>
    <title>GLPEXPRESS</title>
</head>
<body>
    <table>
        <tr>
            <td>
                <h2>Estimado/a {$nom} {$ape},</h2>
            </td>
        </tr>
        <tr>
            <td>
                para activar tu cuenta necesitas meterte en esta url 
            </td>
        </tr>
        <tr>
            <td>
               <a href='http://www.glpexpress.tk/isset/validacionmail.php?email=$em&key=$key' target="_blank">http://www.glpexpress.tk/isset/validacionmail.php?email=$em&key=$key</a>
            </td>
        </tr>
        <tr>
            <td>
                <br/>
                <br/>
                <small>Este es un mensaje automatico, no lo responda.</small>
            </td>
        </tr>

    </table>
</body>
</html>
EOM;

            enviaCorreo($em, 'Bienvenido a GLPEXPRESS Activa tu cuenta', $mensaje, '');

                ?>


            <?php
            }else{

                echo "Porblemas en la insercion de datos";
            }
        }
    }
   ?>
    </body>
</html>