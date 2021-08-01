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

function ListAllPc()
{
    global $bdd;

    $reqComputers = $bdd->prepare('SELECT * FROM computers');
    $reqComputers->execute();
    $pcName = [];
    while($row = $reqComputers->fetch()){
        $pcName[] = $row['computer_name'];
    }

    $reqStatus = $bdd->prepare('SELECT status_name, count(*) "nb", max(status_date) "last" from status group by status_name');
    $reqStatus->execute();
    $pcDate = [];
    while ($row = $reqStatus->fetch()) {
        $pcDate[$row['status_name']] = [
            $row['last'],
            $row['nb']
        ];
    }

    return $pcDate;
}

//select computer_name, count(*), max(status_date) from status group by computer_name;