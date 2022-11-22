<?php
include '../../Data/Test_questionDao.php';
require_once '../../Entity/Test_question.php';

class Test_questionController{

// public static function search(){

//     return TestDao::search();
// }

public  static function Create($id_test,$id_question ){
    $obj_exam = new Test_question();
    $obj_exam->setId_test($id_test);
    $obj_exam->setId_question($id_question);
    
    return Test_questionDao::Create($obj_exam);
   
}
public  static function Update($id_test, $eliminate,$question_eliminate){
    $obj_exam = new Test_question();
    $obj_exam->setId_test($id_test);
    $obj_exam->setId_question($eliminate);
    $obj_exam->setEliminate($question_eliminate);

    return Test_QuestionDao::Update($obj_exam);
}
}