<?php 
session_start();
require_once('conexion.php');
$nombre_prod=$_POST['nombre_prod'];
$valor_prod=$_POST['valor_prod'];
$stock_prod=$_POST['stock_prod'];


$fec_subida= date("Y-m-d h-i-s", time());



$carpeta_upload_img = "img/img-productos/";
$carpeta_upload_img = $carpeta_upload_img . $fec_subida . basename( $_FILES['ruta_prod']['name']); 
	if(move_uploaded_file($_FILES['ruta_prod']['tmp_name'], $carpeta_upload_img)){ 
		echo "El archivo ". basename( $_FILES['ruta_prod']['name']). " ha sido subido";
	}else{
	echo "Ha ocurrido un error, trate de nuevo!";
	}

	$ruta= "img/img-productos/". $fec_subida . basename( $_FILES['ruta_prod']['name']);

	$sqlInsertarDatosProducto="insert into producto(nombre_prod,ruta_img_prod,valor_prod,stock_prod,fec_subida_prod) values('$nombre_prod','$ruta','$valor_prod','$stock_prod','$fec_subida')";		
	$ejecInsertarDatosProducto=mysql_query($sqlInsertarDatosProducto,$conexion);

	if ($ejecInsertarDatosProducto) {
		echo "datos insertados correctamente";

		?>
		<script>
             setTimeout(function () {
               window.location.href = "listarproducto.php";
            }, 1000);
        </script>
		<?php

	}else{
		echo "ocurrio un error en el proceso de insercion de datos";
	}

?>