<?php

class Category{
    private $id_category;
    private $type_category;
    
    public function getId_category(){
		return $this->id_category;
	}

	public function setId_category($id_category){
		$this->id_category = $id_category;
	}

	public function getType_category(){
		return $this->type_category;
	}

	public function setType_category($type_category){
		$this->type_category = $type_category;
	}
}