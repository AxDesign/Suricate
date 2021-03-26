<?php
$header="MIME-Version: 1.0\r\n";
$header.="From:'Suricate.com'<support@Suricate.com>"."\n";
$header.="Content-Type:text/html; charset='utf-8'"."\n";
$header.="Content-Transfer-Encoding: 8bit";
$message='
<html>
    <body>
        <div align="center">
        ';
        if($_SERVER['SERVER_NAME'] == 'suricate'){
            $message .= '<a href="suricate/server/changePassword.php?email='. urldecode($email) .'">Réinitialisez votre mot de passe</a>';
        } elseif ($_SERVER['SERVER_NAME'] == 'suricate.axdesign.fr'){
            $message .= '<a href="suricate.axdesign.fr/changePassword.php?email='. urldecode($email) .'">Réinitialisez votre mot de passe</a>';
        }
$message.='
        </div>
    </body>
</html>
';

mail($email, "Réinitialisation du Mot De Passe", $message, $header);