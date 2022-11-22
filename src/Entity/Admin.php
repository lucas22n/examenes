<?php

class Admin{
    private $id;
    private $user;
    private $password;
    private $id_rol;
    private $id_condition;

    public function getId(){
		return $this->id;
	}

	public function setId($id){
		$this->id = $id;
	}

	public function getUser(){
		return $this->user;
	}

	public function setUser($user){
		$this->user = $user;
	}

	public function getPassword(){
		return $this->password;
	}

	public function setPassword($password){
		$this->password = $password;
	}

	public function getId_rol(){
		return $this->id_rol;
	}

	public function setId_rol($id_rol){
		$this->id_rol = $id_rol;
	}

	public function getId_condition(){
		return $this->id_condition;
	}

	public function setId_condition($id_condition){
		$this->id_condition = $id_condition;
	}
}

?>