<?php
include '../../Data/PersonDao.php';
require_once '../../Entity/Person.php';

class PersonController{

    public static function login($person){
        $obj_person = new Person();
        $obj_person-> setDni_number($person);

        return PersonDao::login($obj_person);
    }
    // public function Index(){
    //     require_once 'View/header.php';
    //     require_once 'View/LoginDocumento/validation_document.php';
    //     require_once 'View/footer.php';
    // }

    public static function profile($dni){
        $obj_person = new Person();
        $obj_person-> setDni_number($dni);

        return PersonDao::search($obj_person);
    }



    public static function Listar(){

        return PersonDao::Listar();
    }

    public static function ListarPersonas(){

        return PersonDao::ListarPersonas();
    }


    //Llamado a la vista persona-editar
    public static function Crud($dni){
        $pvd = new Person();
        $pvd-> setdni_number($dni);
        
        return PersonDao::search($pvd);
        //Se obtienen los datos de la persona a editar.
  }
  
  public static function searchById($data){
    $pvd = new Person();
    $pvd-> setDni_number($data);
    
    return PersonDao::searchByTest($pvd);
    //Se obtienen los datos de la persona a editar.
}



  //Método que modifica el modelo de una persona.
  public  static function Editar($data){
    $pvd = new Person();
    $pvd-> setDni_number($data['dni_number']);
    $pvd-> setSurname($data['surname']);
    $pvd-> setName($data['name']);
    $pvd-> setId_status($data['detail']);

    return PersonDao::Update($pvd);
    

    header('Location: index.php');
}



}
