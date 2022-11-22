<?php

include '../../Data/AdminDao.php';

class AdminController{

    public static function loginAdmin($user,$password)
    {
        $obj_user = new Admin();
        $obj_user ->setUser($user);
        $obj_user ->setPassword($password);

        return AdminDao::loginAdmin($obj_user);
    }

    public function __CONSTRUCT(){
        $this->model = new Admin();
    }
    //Llamado plantilla principal
    public function Index(){
        require_once 'View/header.php';
        require_once 'View/Users/validation_users.php';
        require_once 'View/footer.php';
    }

      public static function getAdmin($user)
    {
        
        $obj_user = new Admin();
        $obj_user ->setUser($user);
       
        return AdminDao::getAdmin($obj_user);
    } 
}