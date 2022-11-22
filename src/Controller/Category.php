<?php
include '../../Data/CategoryDao.php';

class CategoryController{

    public static function Crud($id_question){
        $pvd = new Examen();
        $pvd-> setId_question($id_question);
}

public static function searchCategory(){

    return CategoryDao::searchCategory();
}
public static function searchType_test(){

    return CategoryDao::searchType_test();
}


}