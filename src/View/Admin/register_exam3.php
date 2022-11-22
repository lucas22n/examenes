<?php

include '../../Controller/Test_question.php';


$resultado = array();

if($_SERVER["REQUEST_METHOD"] == "POST"){
    
    
    if(isset($_POST["id_test"]) && isset($_POST["elminate"])){
        $id_test = ($_POST["id_test"]);
        $eliminate= ($_POST["elminate"]);
        $question_eliminate =1;
        if(Test_questionController::Update($id_test, $eliminate, $question_eliminate)){
            echo'<script> window.location.href = "index.php"; </script>';
        }
    }
}
?>