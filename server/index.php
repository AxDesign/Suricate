<?php
session_start();
require_once('./app/database/bdd.php');
require_once('./app/inc_login-register_model.php');

$errorEmail;
$errorPassword;
if(isset($_POST['userEmail']) && isset($_POST['userPassword']) && isset($_POST['computerName'])){
    $validConnexion = true;

    $email = $_POST['userEmail'];
    $password = $_POST['userPassword'];
    $_SESSION['computerName'] = $_POST['computerName'];

    if(ValidEmail($email) == false){
        $validConnexion = false;
        if(ValidPassword($password) == false){
            $validConnexion = false;
        }
    }

    if(ConnexionUser($email, $password, $_SESSION['computerName'], GenerateComputerKey($email, $_SESSION['computerName']))){
        header('location: main.php');
    }
}

require_once('./views/inc_login_view.php');

//email
//password
//enregistrer un ordinateur
    //nom
    //retour générer clé

//clé = email + nom pc + date + adresse IP