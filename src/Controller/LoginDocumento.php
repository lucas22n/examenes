<?php
class LoginDocumentoController{

    private $model;

    public function __CONSTRUCT(){
    
    }

    //Llamado plantilla principal
    public function Index(){
        require_once 'View/header.php';
        require_once 'View/LoginDocumento/loginDocumento.php';
        require_once 'View/footer.php';
    }
}