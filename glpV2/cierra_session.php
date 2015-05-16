<?php
header('Content-Type: text/html; charset=ISO-8859-1');
session_start();
?>
<html>
<head>
<script language="javascript">
			window.location = "index.php";
</script>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

</head>

<body>
<?php
$_SESSION['esadmin']="";
$_SESSION['nombreusu_usu']="";
$_SESSION['password_usu']="";


session_destroy();




?>
</body>
</html>