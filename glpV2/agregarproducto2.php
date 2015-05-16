<?php 
session_start();
require_once('conexion.php');
$nombre_prod=$_POST['nombre_prod'];
$valor_prod=$_POST['valor_prod'];
$stock_prod=$_POST['stock_prod'];
$descrip_prod=$_POST['descrip_prod'];
$subida_por= $_SESSION['nombre_usu']." ".$_SESSION['apellido_usu'];

$fec_subida= date("Y-m-d h-i-s", time());



$carpeta_upload_img = "img/img-productos/";
$carpeta_upload_img = $carpeta_upload_img . $fec_subida . basename( $_FILES['ruta_prod']['name']); 
	if(move_uploaded_file($_FILES['ruta_prod']['tmp_name'], $carpeta_upload_img)){ 
	}else{
	echo "Ha ocurrido un error, trate de nuevo!";
	}

	$ruta= "img/img-productos/". $fec_subida . basename( $_FILES['ruta_prod']['name']);

	$sqlInsertarDatosProducto="insert into producto(nombre_prod,descrip_prod,ruta_img_prod,valor_prod,stock_prod,fec_subida_prod,agregado_por_prod,estado_prod) values('$nombre_prod','$descrip_prod','$ruta','$valor_prod','$stock_prod','$fec_subida','$subida_por','1')";		
	$ejecInsertarDatosProducto=mysql_query($sqlInsertarDatosProducto,$conexion);

	if ($ejecInsertarDatosProducto) {

		?>
		<script>
             setTimeout(function () {
               window.location.href = "admin/listadoproductos.php";
            }, 300);
        </script>
		<?php

	}else{
		echo "ocurrio un error en el proceso de insercion de datos";
	}

?>