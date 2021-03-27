<?php

function SendDataComputer(string $key, string $name, string $data): void{
    global $bdd;

    try {
        $req = $bdd->prepare('INSERT INTO status(status_key, status_name, status_data) VALUES(:key, :name, :data)');
        $req->execute(array(
            'key' => $key,
            'name' => $name,
            'data' => $data
        ));
    } catch (Exception $e) {
        echo '{"statusCode" : 300, "statusMessage" : "'.$e->getMessage().'"}';
    }

}