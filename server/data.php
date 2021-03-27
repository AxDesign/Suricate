<?php
require_once('./app/database/bdd.php');
require_once('./app/inc_login-register_model.php');
require_once('./app/collectData.php');
require_once('./app/sendData.php');
// $computerName;

$url = file_get_contents('php://input');
$data = json_decode($url, true);
echo $data['key'];
echo 'Coucou';
// if(ExistKey($data['key'])){
//     SendDataComputer($data['key'], $computerName, $data);
// }


// http://suricate.axdesign.fr/data.php
// http://suricate/server/data.php
// {"key"="hjregkbverql"}