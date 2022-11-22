<?php

include '../../Controller/Test_question.php';

$resultado = array();

// if($_SERVER["REQUEST_METHOD"] == "POST"){
//     if(isset($_POST["name"]) && isset($_POST["category"]) && isset($_POST["test"])){
//         $name = ($_POST["name"]);
//         $category = ($_POST["category"]);
//         $test = ($_POST["test"]);

//         if(TestController::Create($name, $category, $test)){
//             echo'<script> window.location.href = "CreateExam.php?step=2"; </script>';
//         }
//     }
// }
if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(isset($_POST["id_test"])&& isset($_POST["id_question"])){
        $id_test = ($_POST["id_test"]);
        $id_question = ($_POST["id_question"]);
        
        foreach ($_POST['id_question'] as $id_question){
            if(Test_questionController::Create($id_test, $id_question)){
                echo'<script> window.location.href = "CreateExam.php?step=3"; </script>';
            }
        }
    }
    
}
