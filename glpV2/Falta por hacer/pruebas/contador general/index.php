<?php
	//conecta BD
	$connect= mysql_connect("localhost", "root", "") or die('No se pudo conectar: ' . mysql_error());
	//selecciona BD
	mysql_select_db("contador") or die("No se pudo seleccionar la base $base_de_datos: " . mysql_error());
	//atrapa la ip
	$ip = $_SERVER[REMOTE_ADDR];
	//contador
	$count = 1;
	//fecha actual
	$fec_vista = date("d-m-Y");
	//preguntamos si la ip que entro ya se encuentra 
	$query = mysql_query("SELECT ip FROM unicas WHERE ip='" . $ip . "' and fec_vista='".$fec_vista."' ");
		if ($checking_ip =  mysql_fetch_array($query)){
			if ($checking_ip['fec_vista']) {
				$query_update = mysql_query("SELECT * FROM unicas WHERE ip='" . $ip . "' ");
				while ($row = mysql_fetch_array($query_update)){
					$times = $row['times'] + 1;
					mysql_query("UPDATE unicas SET times='" . $times . "' WHERE id='" . $row['id'] . "' ");
				}
			}
			//echo "Actualizado!";
		}else{	
			//echo "IP no existe";	
			mysql_query("INSERT INTO unicas (ip,times,fec_vista) values ('". $ip ."','". $count ."','".$fec_vista."') ");
		}

	$all = mysql_query("SELECT * FROM todas");

    if ($als =	mysql_fetch_array($all)){
	
	$times_all = $als['times'] + 1;
	mysql_query("UPDATE todas SET times='" . $times_all . "' WHERE id=1");
	
	}else{
		mysql_query("INSERT INTO todas (times,fec_vista) values ('" . $count . "','" .$fec_vista. "') ") or die(mysql_error());	
	}
		
	#Modulos
		$visits = "<div align='center'>Click <a href='?mod=view'>aqui</a> para ver stats.</div>";
		if ($_GET['mod']){
			$mod = $_GET['mod'];
			switch($mod){
				case "view":
				$uni     = mysql_query("SELECT * FROM unicas");
				$uni_ip  = mysql_num_rows($uni);
				$tod     = mysql_fetch_array(mysql_query("SELECT * FROM todas"));
				$visits  = '<div align="center">';
				$visits .= '<table align="center" width="100">';
				$visits .= '<tr><td align="center">IP</td><td align="center">Hits</td></tr>';
				
				while ($unicas   =  mysql_fetch_array($uni)){
					$visits .= '<tr><td align="center">' . $unicas["ip"] . '</td><td align="center">' . $unicas["times"] . '</td></tr>';
				}
				
				$visits .= '</table></div>';
				$visits .= '<br><br>';
				$visits .= "<div align='center'>Total de visitas: " . $tod['times'] . "</div>";
				$visits .= "<div align='center'>Total de visitas unicas: " . $uni_ip . "</div>";
				$visits .= "<div align='center'>Fecha de visitas: " . $tod['fec_vista'] . "</div>";
				break;
					 
		    	default:
			    $visits  = "<div align='center'>No existe este modulo de visitas.</div>";
				
			}
		}
		echo $visits;
mysql_close();

?>
