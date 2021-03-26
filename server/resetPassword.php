<?php
require_once('./app/database/bdd.php');
require_once('./app/inc_login-register_model.php');

if(isset($_POST['userEmail'])){
    $sendEmail = true;
    $email = $_POST['userEmail'];

    if(ValidEmail($email) == false){
        $sendEmail = false;
    }

    if($sendEmail){
        require_once('app/mail/mailResetPassword.php');
    }
}

require_once('./views/inc_resetPassword_view.php');