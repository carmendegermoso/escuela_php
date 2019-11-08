<?php
require ('conexion.php');

function buscarMateria(){

    try {
    $cn = getConexion();

    
    $stm = $cn->query("SELECT * FROM materia");
    $rows = $stm->fetchAll(PDO::FETCH_ASSOC);
    
    $data = $rows;

    header("Content-Type: application/json", true);
    $data = json_encode($data);
    echo $data;

    } catch(Exception $ex){
        print_r($ex);
    }
}

function guardarMateria(){
    $postdata = file_get_contents("php://input");
    $data = json_decode($postdata, true);

    $cn = getConexion();
    $stm = $cn->prepare("INSERT INTO materia (nombre, credito) VALUE (:nombre, :credito)");
    $stm->bindParam(":nombre", $data["nombre"]);
    $stm->bindParam(":credito", $data["credito"]);

    header("Content-Type: application/json", true);
    try {
        $data = $stm->execute();
        echo '{ "guardado" : true}';
    } catch(Exception $e) {
        echo '{ "guardado" : false}';
    }
   
    echo $data;
}

$method = $_SERVER['REQUEST_METHOD'];

switch($method){
    case 'POST':
        guardarMateria();
        break;
    case 'GET':
        buscarMateria();
        break;
    case 'DELETE':

    case 'PUT':

    default: 
    echo 'TO BE IMPLEMENTED';

}