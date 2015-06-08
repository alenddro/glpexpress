<?php
 function enviaCorreo($to, $asunto, $mensaje, $tocc){
        $headers  = 'MIME-Version: 1.0' . "\r\n".
                    'Content-type: text/html; charset=iso-8859-1' . "\r\n".
                    'From: glp@express.cl' . "\r\n" .
                    'Cc: '.$tocc.'' . "\r\n".
                    'Reply-To: ' . "\r\n" .
                    'X-Mailer: PHP/' . phpversion();


        $ok = mail($to, $asunto, $mensaje, $headers);

    }


$mensaje = <<<EOM


<html>
<head>
    <title>Asignacion de analisis poliza</title>
</head>
<body>
    <table>
        <tr>
            <td>
                <img src="" alt="Cluster Consultores" />
            </td>
        </tr>
        <tr>
            <td>
                <h2>Estimado/a {Alexander} {Bravo},</h2>
            </td>
        </tr>
        <tr>
            <td>
                Se le ha asignado un nuevo analisis de poliza: 
            </td>
        </tr>
        <tr>
            <td>
                Fecha de envio: {fecha}
            </td>
        </tr>
        <tr>
            <td>
                Folio: #{folio}
            </td>
        </tr>
        <tr>
            <td>
                Cliente: {cliente}
            </td>
        </tr>
        <tr>
            <td>
                Rut Cliente: {11111}
            </td>
        </tr>
        <tr>
            <td>
                Ejecutivo: {cristian}
            </td>
        </tr>
        <tr>
            <td>
                Solicitado: {2323}
            </td>
        </tr>
        <tr>
            <td>
                Para revisar la informaci&oacute;n, ingrese a:
            </td>
        </tr>
        <tr>
            <td>
                <a href="http://www.blabla.cl/login.php">
                    http://www.blabla.cl/login.php
                </a>
            </td>
        </tr>
        <tr>
            <td>
                <br/>
                <br/>
                <small>Este es un mensaje automatico, no lo responda.</small>
            </td>
        </tr>

    </table>
</body>
</html>
EOM;

            enviaCorreo('alenddro@hotmail.com', '[Cluster Consultores] Se le ha asignado un nuevo analisis de poliza', $mensaje, '');
?>