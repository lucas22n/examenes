<?php

session_start();

include '../../Controller/Admin.php';
include '../../Helps/helps.php';

header('Content-Type: application/json; charset=utf-8');

$resultado = array();


if(isset($_POST["user"])&& isset($_POST["password"])){
    $txtUser = $_POST["user"];
    $txtPassword = sha1($_POST["password"]);

    $resultado = array("estado" => true);

    if(AdminController::loginAdmin($txtUser, $txtPassword))
    {
         $user = AdminController::getAdmin($txtUser, $txtPassword);
        $_SESSION["user"] = array(
            "id"       => $user->id_user,
            "username" => $user->user,
            "role"     => $user->id_rol
            ); 
        return print (json_encode($resultado));
    }
}

$resultado = array("estado" => false);
return print (json_encode($resultado));
