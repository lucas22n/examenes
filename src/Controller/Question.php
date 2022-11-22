<?php
include '../../Data/QuestionDao.php';

class QuestionController{

    public static function Crud($id_question){
        $pvd = new Examen();
        $pvd-> setId_question($id_question);
}

public static function search(){

    return QuestionDao::search();
}

public static function searchByCategory($id_category){
        $pvd = new Examen();
        $ques = array();
        for($i = 1 ; $i<=$id_category ; $i++){

        if($id_category == 3 && $i == 2 ){
                
        }else{
            $pvd-> setId_category($i);
            $resultado = QuestionDao::searchByCategory($pvd);
            $ques = array_merge($resultado, $ques);
            //print_r($resultado);
            //QuestionDao::searchByCategory($pvd);
        }
        }
        return $ques;
}

}