<?php
require_once('config/config_db_local.php');
// if($_SERVER['SERVER_NAME'] == 'suricate'){
//     require_once('config/config_db_local.php');
// } elseif ($_SERVER['SERVER_NAME'] == 'suricate.axdesign.fr'){
//     require_once('config/config_db_online.php');
// }

try{
    $bdd = new PDO("mysql:host=" . $host . ";dbname=" . $dbname, $user, $pass);
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (Exception $e){
    echo $e;
    $errorIt = $e;
    $errorMsg = "Erreur, impossible de se connecter à la base de donnée";
}
?>