<?php
	
	require_once('../../../conexion.php');
	
	$id = $_POST['id'];

	$sqlesadmin="SELECT esadmin FROM usuario WHERE id_usu='$id'";
	$ejecesadmin= mysql_query($sqlesadmin, $conexion);
	$esadmin = mysql_fetch_array($ejecesadmin);



	if ($esadmin['esadmin']==0) {
		$sqlDarDeBaja="UPDATE usuario SET esadmin=4 WHERE id_usu='$id'";
		$ejecDarDeBaja= mysql_query($sqlDarDeBaja, $conexion);
	}else if($esadmin['esadmin']==1){
		$sqlDarDeBaja="UPDATE usuario SET esadmin=5 WHERE id_usu='$id'";
		$ejecDarDeBaja= mysql_query($sqlDarDeBaja, $conexion);
	}else if($esadmin['esadmin']==3){
		$sqlDarDeBaja="UPDATE usuario SET esadmin=6 WHERE id_usu='$id'";
		$ejecDarDeBaja= mysql_query($sqlDarDeBaja, $conexion);

	}

?>