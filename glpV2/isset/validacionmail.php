<?php
require_once("../conexion.php");
$email=$_GET['email'];
$codi=$_GET['key'];
$verificacion = "SELECT * FROM usuario WHERE email_usu = '$email' AND CodigoKey = '$codi'";
$ejecVerificacion = mysql_query($verificacion, $conexion);


if ($veri = mysql_fetch_array($ejecVerificacion)){

	$id_usu=$veri['id_usu'];
    mysql_query("UPDATE usuario SET EstadoKEY = '1' WHERE EstadoKEY = '0' AND id_usu='$id_usu'");
    echo "Tu cuenta ha sido activada.";
    echo '<meta http-equiv="refresh" content="2; url=../index.php">';
}else {
    header('Location: ../index.php');
}
?>