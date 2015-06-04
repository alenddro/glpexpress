<?php
	require("conexion.php");
	//atrapa la ip
	$ip = $_SERVER[REMOTE_ADDR];
	//contador
	$count = 1;
	//fecha actual
	$fec_vista = date("Y-m-d");



	//preguntamos si la ip que entro ya se encuentra 
	$sqlConsultarIp = "SELECT * FROM unicas WHERE ip='$ip' and fec_vista='$fec_vista'";
	$ejecConsultarIp = mysql_query($sqlConsultarIp, $conexion);
	$arrayConsultarIp=mysql_fetch_array($ejecConsultarIp);

	if (!empty($arrayConsultarIp)){
		if ($arrayConsultarIp['ip']==$ip && $arrayConsultarIp['fec_vista']==$fec_vista){
				$times = $arrayConsultarIp['times'] + 1;
				mysql_query("UPDATE unicas SET times='" . $times . "' WHERE id='" . $arrayConsultarIp['id'] . "' ");
		}elseif($arrayConsultarIp['ip']==$ip && $arrayConsultarIp['fec_vista']!=$fec_vista){
			mysql_query("INSERT INTO unicas (ip,times,fec_vista) values ('". $ip ."','". $count ."','".$fec_vista."') ");
		}
	}else{
		mysql_query("INSERT INTO unicas (ip,times,fec_vista) values ('". $ip ."','". $count ."','".$fec_vista."') ");
	}

	//agregar todas las visitas del mes
	$sqlTodasVisitas ="SELECT * FROM todas where fec_vista='$fec_vista'";
	$ejecTodasVisitas = mysql_query($sqlTodasVisitas, $conexion);
	$arrayTodasVisitas = mysql_fetch_array($ejecTodasVisitas);

    if (!empty($arrayTodasVisitas)){

		$fec_visita_todas = $arrayTodasVisitas['fec_vista'];
		$id_visita = $arrayTodasVisitas['id'];
		
		list($anioac, $mesac, $diaac) = explode("-",$fec_vista); 
		list($anioto, $mesto, $diato ) = explode("-",$fec_visita_todas); 
		
		if ($mesac == $mesto && $anioac==$anioto) {
    	
			$times_all = $arrayTodasVisitas['times'] + 1;
			mysql_query("UPDATE todas SET times='$times_all', fec_vista='$fec_vista' WHERE id='$id_visita'");
		}

	}else{
		mysql_query("INSERT INTO todas (times,fec_vista) values ('" . $count . "','" .$fec_vista. "') ") or die(mysql_error());	
	}

		//========================================================================
		$mesActual = date('m');
		$sql = "select * from todas where EXTRACT(month FROM fec_vista)=$mesActual";
		$ejecSql= mysql_query($sql, $conexion);

		$sqlSum = "select SUM(times) as totalvisitas from todas where EXTRACT(month FROM fec_vista)=$mesActual";
		$ejecSqlSum= mysql_query($sqlSum, $conexion);
		$arraysqlSum =mysql_fetch_array($ejecSqlSum, MYSQL_ASSOC);
		echo "<br>";
		echo "Desglose del mes actual";
		while ($arraySql=mysql_fetch_array($ejecSql)) {
			$fecha=$arraySql['times'];
			echo "<br>";
			echo $fecha;
		}
		//========================================================================
		

	#Modulos
		$visits = "<div align='center'>Click <a href='?mod=view'>aqui</a> para ver stats.</div>";
		if ($_GET['mod']){
			$mod = $_GET['mod'];
			switch($mod){
				case "view":
				$uni     = mysql_query("SELECT * FROM unicas order by id asc");
				$uni_ip  = mysql_num_rows($uni);
				$tod     = mysql_fetch_array(mysql_query("SELECT * FROM todas order by id desc"));
				$visits  = '<div align="center">';
				$visits .= '<br><br>';
				$visits .= "<div align='center'>Total de visitas: " . $arraysqlSum["totalvisitas"] . "</div>";
				$visits .= "<div align='center'>Total de visitas unicas en todo el mes: " . $uni_ip . "</div>";
				$visits .= "<div align='center'>Fecha de visitas: " . $tod['fec_vista'] . "</div>";
				$visits .= "<div align='center'>------------------------------------------</div>";

				mysql_data_seek($uni,0);
				while ( $arrayUnicas = mysql_fetch_array($uni)){
					if ($ip == $arrayUnicas['ip']) {
						$visits .= "<div align='center' style='background:rgb(82, 245, 45);margin:3px;'>Total de visitas unicas en cada dia:  IP: " . $arrayUnicas['ip'] . " | VISITAS: ". $arrayUnicas['times'] ." | FECHA VISITA: ".$arrayUnicas['fec_vista']."</div>";
					}else{
						$visits .= "<div align='center'>Total de visitas unicas en cada dia:  IP: " . $arrayUnicas['ip'] . " | VISITAS: ". $arrayUnicas['times'] ." | FECHA VISITA: ".$arrayUnicas['fec_vista']."</div>";
					}

				}
				break;
					 
		    	default:
			    $visits  = "<div align='center'>No existe este modulo de visitas.</div>";
				
			}
		}
		echo $visits;


mysql_close();

?>