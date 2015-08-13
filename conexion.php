<?php
$conexion = @mysql_pconnect('mysql.hostinger.es', 'u904848656_glpex', 'Administrad0r');
mysql_select_db('u904848656_glpex') or die("No se puede seleccionar la base de datos de desarrollo");
//arregla el error de mysqli --- > @mysql_pconnect();
?>