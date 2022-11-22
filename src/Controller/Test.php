<?php
include '../../Data/TestDao.php';
require_once '../../Entity/Test.php';


class TestController{

public static function search(){

    return TestDao::search();
}

public  static function Create($name, $category,$test,$status){
    $obj_exam = new Test();
    $obj_exam->setId_category($category);
    $obj_exam->setDetail($name);
    $obj_exam->setId_type_test($test);
    $obj_exam->setStatus($status);

    return TestDao::Create($obj_exam);
}
public  static function Editar($data,$id_test){
    $pvd = new Test();
    $pvd-> setDetail_test($data['name']);
    $pvd-> setStatus($data['detail']);
    $pvd->setId_test($id_test['id_test']);
    

    return TestDao::Update($pvd);
    

    header('Location: index.php');
}
public static function searchQuestionById($test, $question, $dni){
    require_once '../../Entity/Test_question.php';
    $exam = new Test_question();
    $exam-> setId_test($test);
    $exam-> setId_question($question);
    $person = new Person();
    $person-> setDni_number($dni);
    
    return TestDao::searchQuestionById($exam, $person);
    //Se obtienen los datos de la persona a editar.
}
public static function searchByTest($test, $dni){
    require_once '../../Entity/Test_question.php';
    $exam = new Test_question();
    $exam-> setId_test($test);
    $person = new Person();
    $person-> setDni_number($dni);
    
    return TestDao::searchByTest($exam, $person);
    //Se obtienen los datos de la persona a editar.
}
public static function Crud($data){
    $pvd = new Test();
    $pvd-> setId_test($data);
    
    return TestDao::searchById($pvd);
    //Se obtienen los datos de la persona a editar.
}

public static function findBySelectedTypeTest($selectedTypeTest){    
    return TestDao::findBySelectedTypeTest($selectedTypeTest);
    //Se obtienen los datos de la persona a editar.
}

public static function GuardarExamenAsignado($id_test_person, $id_test, $id_person)
{	
    return TestDao::GuardarExamenAsignado($id_test_person, $id_test, $id_person);
}

}