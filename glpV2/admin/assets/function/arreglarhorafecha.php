<?php

	function separarHoraFechaOrdenar($hora){


			$horaaseparar = $hora; 
			$separar = explode(' ',$horaaseparar); 
			
			$fecha=$separar[0];
			$nuevahora=$separar[1];

			$separarfecha=explode('-',$fecha);

			$ano=$separarfecha[0];
			$mes=$separarfecha[1];
			$dia=$separarfecha[2];


			$nuevafechahora = $dia ."-". $mes ."-". $ano." ".$nuevahora;
			echo $nuevafechahora;
			

	}



	


?>