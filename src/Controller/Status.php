<?php
include '../../Data/StatusDao.php';

class StatusController{

public static function search(){

    return StatusDao::search();
}

}