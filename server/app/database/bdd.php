<?php
$host = 'localhost';
$dbname = 'suricate';
$user = 'root';
$pass = '';

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