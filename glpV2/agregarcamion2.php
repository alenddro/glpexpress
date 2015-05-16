<?php 
session_start();
require_once('conexion.php');
$marca=$_POST['marca_cam'];
$modelo=$_POST['modelo_cam'];
$patente=$_POST['patente_cam'];
$ano=$_POST['ano_cam'];
$papeles=$_POST['papeles_cam'];
$descripcion=$_POST['descripcion_cam'];
$dueno=$_POST['dueno_cam'];

$subida_por= $_SESSION['nombre_usu']." ".$_SESSION['apellido_usu'];


$fec_subida= date("Y-m-d h-i-s", time());

/*Estado del camion
	1.-Activa
	2.-Inactiva
*/

$carpeta_upload_img = "img/img-camiones/";
$carpeta_upload_img = $carpeta_upload_img . $fec_subida . basename( $_FILES['ruta_img_cam']['name']); 
	if(move_uploaded_file($_FILES['ruta_img_cam']['tmp_name'], $carpeta_upload_img)){ 
	}else{
	echo "Ha ocurrido un error, trate de nuevo!";
	}

	$ruta= "img/img-camiones/". $fec_subida . basename( $_FILES['ruta_img_cam']['name']);

	$sqlInsertarDatosCamion="insert into camion (marca_cam,modelo_cam,patente_cam,ano_cam,papeles_cam,ruta_foto_cam,descrip_cam,dueno_cam,fec_subida_cam,estado_cam,subida_por_cam) values('$marca','$modelo','$patente','$ano','$papeles','$ruta','$descripcion','$dueno','$fec_subida','1','$subida_por')";		
	$ejecInsertarDatosCamion=mysql_query($sqlInsertarDatosCamion,$conexion);

	if ($ejecInsertarDatosCamion) {
		
		?>
		<script>
             setTimeout(function () {
               window.location.href = "admin/listadocamiones.php";
            }, 300);
        </script>
		<?php

	}else{
		echo "ocurrio un error en el proceso de insercion de datos";
	}

?>