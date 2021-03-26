<?php
require_once('./app/database/bdd.php');
require_once('./app/inc_login-register_model.php');

$errorPassword;
if(isset($_POST['changePassword']) && isset($_GET['email'])){
    $email = $_GET['email'];
    $password = $_POST['userPassword'];
    if(ValidPassword($password)){
        ChangePassword($email, $password);
        header('location: index.php');
    }
}

require_once('./views/inc_change-password_view.php');

