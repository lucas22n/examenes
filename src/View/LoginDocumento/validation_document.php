<?php
session_start();
include '../../Controller/Person.php';

header('Content-Type: application/json; charset=utf-8');


$resultado = array();

if(isset($_POST["dni"])){
    $txtDocument = $_POST["dni"];

    $resultado = array("estado" => true, "dni"=>$txtDocument);

    if ( PersonController::login($txtDocument)){
        $_SESSION["user"] = array(
            "dni" => $txtDocument,
            "role"=> 0,
            "examen"=>array(
                "puntaje" => 0,
                "eliminate" => false
            )
            ); 
        return print (json_encode($resultado));
    }
}

$resultado = array("estado" => false);
return print (json_encode($resultado));

?>