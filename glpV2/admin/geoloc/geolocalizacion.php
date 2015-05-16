<?php require_once('Connections/geolocalizacion.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
  $insertSQL = sprintf("INSERT INTO markers (name, address, lat, lng, type) VALUES (%s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['name'], "text"),
                       GetSQLValueString($_POST['address'], "text"),
                       GetSQLValueString($_POST['lat'], "double"),
                       GetSQLValueString($_POST['lng'], "double"),
                       GetSQLValueString($_POST['type'], "text"));

  mysql_select_db($database_geolocalizacion, $geolocalizacion);
  $Result1 = mysql_query($insertSQL, $geolocalizacion) or die(mysql_error());

  $insertGoTo = "registro_geo.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Geolocation</title>
		<link rel="stylesheet" type="text/css" href="css/geolocation.css">
	</head>
	<body>
		<div id="divContenedor">
			<div id="divInfo">Georeferenciación de Ubicación</div>
			<div id="divMapa"></div>
			<div id="divCoordenadas"></div>
		</div>
        <table width="320" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td bgcolor="#D1D1BA">&nbsp;</td>
        </tr>
        <tr>
        <td bgcolor="#D1D1BA">&nbsp;
          <form method="post" name="form1" action="<?php echo $editFormAction; ?>">
            <table align="center" cellpadding="0" cellspacing="5">
              <tr valign="baseline">
                <td nowrap align="right">Nombre:</td>
                <td><input name="name" type="text" value="Jorge Diaz" size="32" readonly="readonly"></td>
              </tr>
              <tr valign="baseline">
                <td nowrap align="right">Dirección:</td>
                <td><input type="text" name="address" value="" size="32"></td>
              </tr>
              <tr valign="baseline">
                <td nowrap align="right">Latitud:</td>
                <td><input name="lat" type="text" value="" size="32"></td>
              </tr>
              <tr valign="baseline">
                <td nowrap align="right">Longitud:</td>
                <td><input type="text" name="lng" value="" size="32"></td>
              </tr>
              <tr valign="baseline">
                <td nowrap align="right">Tipo:</td>
                <td><select name="type" class="texto_formulario" id="type">
                  <option value="Opcion 1" selected="selected">Opcion 1</option>
                  <option value="Opcion 2">Opcion 2</option>
                  <option value="Opcion 3">Opcion 3</option>
                </select></td>
              </tr>
              <tr valign="baseline">
                <td nowrap align="right">&nbsp;</td>
                <td><input type="submit" value="Guardar Ubicación"></td>
              </tr>
            </table>
            <input type="hidden" name="MM_insert" value="form1">
          </form>
          <p>&nbsp;</p></td>
        </tr>
        </table>
        

		<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
		<script type="text/javascript" src="js/geolocation.js"></script>
	</body>
</html> 