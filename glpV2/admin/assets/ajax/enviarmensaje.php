<?php
    require_once('../../../isset/functions.php');


    $asunto = $_POST["asunto"];
    $mensajepost = $_POST["mensaje"];
    $correo = $_POST["correo"];
    $nom = $_POST["nombre"];
    $ape = $_POST["apellido"];
 
$mensaje = <<<EOM
<html>
<head>
    <title>GLPEXPRESS</title>
</head>
<body>
    <table>
        <tr>
            <td>
                <h2>Estimado/a {$nom} {$ape},</h2>
            </td>
        </tr>
        <tr>
            <td>
            	<p>El administrador le envio el siguiente mensaje:</p>
            </td>
        </tr>
        <tr>
            <td>
               {$mensajepost}
            </td>
        </tr>
        <tr>
            <td>
                <br/>
                <br/>

            </td>
        </tr>

    </table>
</body>
</html>
EOM;

        enviaCorreo($correo, $asunto, $mensaje, '');

        echo "Mensaje enviado";
       
?>
