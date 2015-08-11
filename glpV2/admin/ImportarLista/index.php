<?php  
require("../../conexion.php");  
$row = 1;  
$fp = fopen ("usuarios.csv","r");  
while ($data = fgetcsv ($fp, 1000, ";"))  
{  
$num = count ($data);  
print " <br>";  
$row++;  
echo "$row: ".$data[0].$data[1].$data[2].$data[3].$data[4].$data[5].$data[6].$data[7].$data[8].$data[9].$data[10].$data[11]; //.$data[1].$data[2].$data[3]
$insertar="INSERT INTO usuario (password_usu,nombre_usu,apellido_usu,direccion_usu,telefono_usu,email_usu,ruta_img_usu,terminosycondiciones_usu,registrado_el,EstadoKEY,CodigoKEY,esadmin) VALUES ('$data[0]','$data[1]','$data[2]','$data[3]','$data[4]','$data[5]','$data[6]','$data[7]','$data[8]','$data[9]','$data[10]','$data[11]')";  
echo $insertar;
$ejecvariable=mysql_query($insertar, $conexion);
}  
fclose ($fp);  
?>