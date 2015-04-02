<?php 
session_start();
require_once('conexion.php');
$titulo_oferta=$_POST['titulo_oferta'];
$valor_oferta=$_POST['valor_oferta'];
$stock_oferta=$_POST['stock_oferta'];
$subida_por= $_SESSION['nombre_usu']." ".$_SESSION['apellido_usu'];


$fec_subida= date("Y-m-d h-i-s", time());

/*Estado de la oferta
	1.-Activa
	2.-Inactiva
*/

$carpeta_upload_img = "img/img-ofertas/";
$carpeta_upload_img = $carpeta_upload_img . $fec_subida . basename( $_FILES['ruta_oferta']['name']); 
	if(move_uploaded_file($_FILES['ruta_oferta']['tmp_name'], $carpeta_upload_img)){ 
		echo "El archivo ". basename( $_FILES['ruta_oferta']['name']). " ha sido subido";
	}else{
	echo "Ha ocurrido un error, trate de nuevo!";
	}

	$ruta= "img/img-ofertas/". $fec_subida . basename( $_FILES['ruta_oferta']['name']);

	$sqlInsertarDatosOferta="insert into oferta(titulo_of,imagen_of,valor_of,stock_of,fec_subida_of,subida_por_of,estado_of) values('$titulo_oferta','$ruta','$valor_oferta','$stock_oferta','$fec_subida','$subida_por','1')";		
	$ejecInsertarDatosOferta=mysql_query($sqlInsertarDatosOferta,$conexion);

	if ($ejecInsertarDatosOferta) {
		echo "datos insertados correctamente";

		?>
		<script>
             setTimeout(function () {
               window.location.href = "listaroferta.php";
            }, 1000);
        </script>
		<?php

	}else{
		echo "ocurrio un error en el proceso de insercion de datos";
	}

?>