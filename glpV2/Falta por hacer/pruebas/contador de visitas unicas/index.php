<?php
$ips = explode(';', file_get_contents("ips.txt"));
$visitas = count($ips)-2;
$reset = 3600;
if(!in_array($_SERVER['REMOTE_ADDR'], $ips)) file_put_contents("ips.txt", $_SERVER['REMOTE_ADDR'].';', FILE_APPEND);
if((time()-reset($ips))>$reset) file_put_contents("ips.txt", time().';');
settype($visitas, 'string');
echo $visitas;
?>