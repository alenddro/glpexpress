<?php 
session_start();
require_once('conexion.php');
$titulo_promocion=$_POST['titulo_promocion'];
$descrip_promocion=$_POST['descrip_promocion'];
$valor_promocion=$_POST['valor_promocion'];
$stock_promocion=$_POST['stock_promocion'];
$subida_por= $_SESSION['nombre_usu']." ".$_SESSION['apellido_usu'];


$fec_subida= date("Y-m-d h-i-s", time());

/*Estado de la promocion
	1.-Activa
	2.-Inactiva
*/

$carpeta_upload_img = "img/img-promocion/";
$carpeta_upload_img = $carpeta_upload_img . $fec_subida . basename( $_FILES['ruta_img_promocion']['name']); 
	if(move_uploaded_file($_FILES['ruta_img_promocion']['tmp_name'], $carpeta_upload_img)){ 
		echo "El archivo ". basename( $_FILES['ruta_img_promocion']['name']). " ha sido subido";
	}else{
	echo "Ha ocurrido un error, trate de nuevo!";
	}

	$ruta= "img/img-promocion/". $fec_subida . basename( $_FILES['ruta_img_promocion']['name']);

	$sqlInsertarDatospromocion="insert into promocion(titulo_prom,descrip_prom,imagen_prom,valor_prom,stock_prom,fec_subida_prom,subida_por_prom,estado_prom) values('$titulo_promocion','$descrip_promocion','$ruta','$valor_promocion','$stock_promocion','$fec_subida','$subida_por','1')";		
	$ejecInsertarDatospromocion=mysql_query($sqlInsertarDatospromocion,$conexion);

	if ($ejecInsertarDatospromocion) {
		?>
		<script>
             setTimeout(function () {
               window.location.href = "listarpromocion.php";
            }, 800);
        </script>
		<?php

	}else{
		echo "ocurrio un error en el proceso de insercion de datos";
	}

?>