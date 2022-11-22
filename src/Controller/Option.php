<?php
include '../../Data/OptionDao.php';

class OptionController{

    public static function Crud($id_question){
        $pvd = new Examen();
        $pvd-> setId_question($id_question);
}

public static function searchOption(){

    return OptionDao::searchOption();
}

}