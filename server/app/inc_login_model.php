<?php
function ValidEmail(string $email): bool{
    global $errorEmail;

    $email = htmlspecialchars($email);

    if(empty($email)){
        $errorEmail = "L'email ne peux pas etre vide";
        return false;
    }

    if(strlen($email) > 100){
        $errorEmail = "Ton email est trop long";
        return false;
    }

    if(preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $email)){
        return true;
    }

    $errorEmail = "Renseigne un email valide";
    return false;
}

function ValidPassword(string $password): bool{
    global $errorPassword;
    $password = htmlspecialchars($password);

    if(empty($password)){
        $errorPassword = "Le mot de passe ne peut pas être vide";
        return false;
    }
    if(strlen($password) < 8){
        $errorPassword = "Le mot de passe doit faire au moins 8 caractères";
        return false;
    }
    if(strlen($password) > 100){
        $errorPassword = "Le mot de passe est trop long";
        return false;
    }

    return true;
}

function ExistEmail(string $email): bool{
    global $bdd;

    $req = $bdd->prepare('SELECT * FROM users WHERE user_email = ?');
    $req->execute(array($email));

    if($req->rowCount() == 1){
        return true;
    } else {
        return false;
    }
}

function RegisterUser(string $email, string $name, string $password): void{
    global $bdd;

    $password = password_hash($password, PASSWORD_DEFAULT);

    $req = $bdd->prepare('INSERT INTO users(user_email, user_name, user_password) VALUES(:email, :name, :password)');
    $req->execute(array(
        'email' => $email,
        'name' => $name,
        'password' => $password
    ));
}

function ConnexionUser(string $email, string $password): bool{
    global $bdd,
            $errorPassword;

    $req = $bdd->prepare('SELECT * FROM users WHERE user_email = ?');
    $req->execute(array($email));

    if($req->rowCount() == 1){
        $dataUser = $req->fetch();
        if(password_verify($password, $dataUser['user_password'])){
            return true;
        } else {
            $errorPassword = "Le mot de passe ne correspond pas";
            return false;
        }
    } else {
        return false;
    }
}

//Récupérer l'email
//Vérifier si il est valide

//Vérifier si il existe déjà dans la base de donnée

//Si oui rediriger vers la page Login
//Sinon rediriger vers la page Sign Out

//Renvoyer l'email a la page suivante 

