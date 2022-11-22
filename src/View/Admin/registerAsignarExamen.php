<?php
session_start();

include '../../Controller/Test.php';
unset($_SESSION["mensaje_error"]);

if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(isset($_POST["id_test"]) && isset($_POST["id_person"])){
        $id_test_person = (isset($_POST["id_test_person"]) && $_POST["id_test_person"] != '') ? $_POST["id_test_person"] : null;
        $id_test = ($_POST["id_test"]);
        $id_person = ($_POST["id_person"]);

        if(TestController::GuardarExamenAsignado($id_test_person, $id_test, $id_person)){
            echo'<script> window.location.href = "AsignarExamenes.php"; </script>';
            $_SESSION["mensaje_error"] = "";
            exit();
        }
    } else {
        echo'<script> window.location.href = "AsignarExamenes.php"; </script>';
        $_SESSION["mensaje_error"] = "Error al asignar un examen";
    }
}

?>