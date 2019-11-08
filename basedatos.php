<?php

try {
    $pdo = new \PDO("mysql:host=localhost;dbname=escuela", "root", "password");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    
    $nombre = "Juan de los palotes";
    $matricula = "DC-2562";

    $stm = $pdo->prepare("INSERT INTO estudiante (nombre, matricula) VALUES (:nombre, :matricula)");
    $stm->bindParam(":nombre", $nombre);
    $stm->bindParam(":matricula", $matricula);

    $data = $stm->execute();
    print_r($data);

    echo "working";
} catch (PDOException $e){
    echo $e->getMessage();
}