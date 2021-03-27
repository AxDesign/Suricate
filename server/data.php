<?php
require_once('./app/database/bdd.php');
require_once('./app/inc_login-register_model.php');
require_once('./app/collectData.php');
require_once('./app/sendData.php');
$computerName;

$content = file_get_contents('php://input');
$data = json_decode($content, true);


if(ExistKey($data['key'])){
    SendDataComputer($data['key'], $computerName, $content);
    echo '{"statusCode" : 200, "statusMessage" : "OK"}';
} else {
    echo '{"statusCode" : 300, "statusMessage" : "Clé non trouvé"}';
}

// http://suricate.axdesign.fr/data.php
// http://suricate/server/data.php
// {"key"="hjregkbverql"}


//statusCode
//statusMessage 