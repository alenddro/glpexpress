<?php
function enviaCorreo($to, $asunto, $mensaje, $tocc){


    $headers  = 'MIME-Version: 1.0' . "\r\n".
                'Content-type: text/html; charset=iso-8859-1' . "\r\n".
                'From: glp@express.cl' . "\r\n" .
                'Cc: '.$tocc.'' . "\r\n".
                'Reply-To: alexander.bravo@inacapmail.cl' . "\r\n" .
                'X-Mailer: PHP/' . phpversion();


    $ok = mail($to, $asunto, $mensaje, $headers);

}
?>