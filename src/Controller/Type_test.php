<?php
include '../../Data/Type_testDao.php';

class Type_testController{

public static function search(){

    return Type_testDao::search();
}

}