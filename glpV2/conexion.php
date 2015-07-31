<?php
$conexion = @mysql_pconnect('localhost', 'root', '');
mysql_select_db('glpexpressdb') or die("No se puede seleccionar la base de datos de desarrollo");
//arregla el error de mysqli --- > @mysql_pconnect();
?>