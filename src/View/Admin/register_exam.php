<?php

include '../../Controller/Test.php';


$resultado = array();

if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(isset($_POST["name"]) && isset($_POST["category"]) && isset($_POST["test"])){
        $name = ($_POST["name"]);
        $category = ($_POST["category"]);
        $test = ($_POST["test"]);
        $status = 1;

        if(TestController::Create($name, $category, $test,$status)){
            echo'<script> window.location.href = "CreateExam.php?step=2"; </script>';

        }
    }
}

?>