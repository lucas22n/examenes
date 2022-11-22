<?php
require_once 'Entity/User.php';

class UserController{

    private $model;

    public function __CONSTRUCT(){
        $this->model = new User();
    }
    //Llamado plantilla principal
    public function Index(){
        require_once 'View/header.php';
        require_once 'View/Users/user.php';
        require_once 'View/footer.php';
    }

    public function Listar(){
        require_once 'View/header.php';
        require_once 'View/Users/listar.php';
        require_once 'View/footer.php';
    }
}