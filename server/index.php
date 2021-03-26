<?php
require_once('./app/database/bdd.php');
require_once('./app/inc_login_model.php');

$errorEmail;
$errorPassword;
if(isset($_POST['userEmail']) && isset($_POST['userPassword'])){
    $validConnexion = true;

    $email = isset($_POST['userEmail']);
    $password = isset($_POST['userPassword']);
    if(ValidEmail($email) == false){
        $validConnexion = false;
        if(ValidPassword($password) == false){
            $validConnexion = false;
        }
    }

    if(ConnexionUser($email, $password)){
        header('location: main.php');
    }
}

require_once('./views/inc_login_view.php');

//email
//password
//enregistrer un ordinateur
    //nom
    //retour générer clé