<?php

function GetComputerKey(string $name): string{
    global $bdd;

    $req = $bdd->prepare('SELECT * FROM computers WHERE computer_name = ?');
    $req->execute(array($name));
    $dataComputer = $req->fetch();
    return $dataComputer['computer_key'];
}

function ExistKey(string $key): bool{
    global $bdd,
            $computerName;

    $req = $bdd->prepare('SELECT * FROM computers WHERE computer_key = ?');
    $req->execute(array($key));

    if($req->rowCount() == 1){
        $data = $req->fetch();
        $computerName = $data['computer_name'];
        return true;
    } else {
        return false;
    }
}