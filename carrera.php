<?php
require ('conexion.php');

function buscarCarrera(){
    $cn = getConexion();
    $stm = $cn->query("SELECT * FROM carrera");
    // $rows = $stm->fetchAll(PDO::FETCH_ADD);
    $rows = $stm->fetchAll(PDO::FETCH_ASSOC);
    
    $data = $rows;
}

header("Content-Type: application/json", true);
$data = json_encode($data);
echo $data;


function guardarCarrera(){
    $postdata = file_get_contents("php://input");
    $data = json_decode($postdata, true);

    $cn = getConexion();
    $stm = $cn->prepare("INSERT INTO carrera (nombre) VALUE (:nombre)");
    $stm->bindParam(":nombre", $data["nombre"]);

    header("Content-Type: application/json", true);
    try {
        $data = $stm->execute();
        echo '{ "guardado" : true}'
    } catch(Exception $e) {
        echo '{ "guardado" : false}'

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