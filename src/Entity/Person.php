<?php
class Person
{
    private $pdo;
	private $id;
    private $id_type_dni;
    private $dni_number;
    public $name;
    private $surname;
    private $id_gender;
    private $phone;
    private $email;
    private $date_time;
    private $id_status;
	private $test;

    public function getId(){
		return $this->id;
	}

	public function setId($id){
		$this->id = $id;
	}

	public function getId_type_dni(){
		return $this->id_type_dni;
	}

	public function setId_type_dni($id_type_dni){
		$this->id_type_dni = $id_type_dni;
	}

	public function getDni_number(){
		return $this->dni_number;
	}

	public function setDni_number($dni_number){
		$this->dni_number = $dni_number;
	}

	public function getName(){
		return $this->name;
	}

	public function setName($name){
		$this->name = $name;
	}

	public function getSurname(){
		return $this->surname;
	}

	public function setSurname($surname){
		$this->surname = $surname;
	}

	public function getId_gender(){
		return $this->id_gender;
	}

	public function setId_gender($id_gender){
		$this->id_gender = $id_gender;
	}

	public function getPhone(){
		return $this->phone;
	}

	public function setPhone($phone){
		$this->phone = $phone;
	}

	public function getEmail(){
		return $this->email;
	}

	public function setEmail($email){
		$this->email = $email;
	}

	public function getDate_time(){
		return $this->date_time;
	}

	public function setDate_time($date_time){
		$this->date_time = $date_time;
	}

	public function getId_status(){
		return $this->id_status;
	}

	public function setId_status($id_status){
		$this->id_status = $id_status;
	}

	public function getTest(){
		return $this->test;
	}

	public function setTest($test){
		$this->test = $test;
	}


}
