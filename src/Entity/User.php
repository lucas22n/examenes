<?php
class User
{
    public $user;
	private $id;
    private $dni_number;
    private $name;
    private $surname;

    public function getId(){
		return $this->id;
	}

	public function setId($id){
		$this->id = $id;
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
}