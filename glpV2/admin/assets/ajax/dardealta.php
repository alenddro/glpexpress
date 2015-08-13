<?php
	
	require_once('../../../conexion.php');
	
	$id = $_POST['id'];

	$sqlesadmin="SELECT esadmin FROM usuario WHERE id_usu='$id'";
	$ejecesadmin= mysql_query($sqlesadmin, $conexion);
	$esadmin = mysql_fetch_array($ejecesadmin);



	if ($esadmin['esadmin']==5) {
		$sqlDarDeBaja="UPDATE usuario SET esadmin=1 WHERE id_usu='$id'";
		$ejecDarDeBaja= mysql_query($sqlDarDeBaja, $conexion);
	}else if($esadmin['esadmin']==4){
		$sqlDarDeBaja="UPDATE usuario SET esadmin=0 WHERE id_usu='$id'";
		$ejecDarDeBaja= mysql_query($sqlDarDeBaja, $conexion);
	}else if($esadmin['esadmin']==6){
		$sqlDarDeBaja="UPDATE usuario SET esadmin=3 WHERE id_usu='$id'";
		$ejecDarDeBaja= mysql_query($sqlDarDeBaja, $conexion);
	}

?>