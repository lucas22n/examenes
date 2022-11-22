<?php

class Options{
    private $id_option;
    private $opcion;
    private $id_question;

    public function getId_option(){
		return $this->id_option;
	}

	public function setId_option($id_option){
		$this->id_option = $id_option;
	}

	public function getOpcion(){
		return $this->opcion;
	}

	public function setOpcion($opcion){
		$this->opcion = $opcion;
	}

	public function getId_question(){
		return $this->id_question;
	}

	public function setId_question($id_question){
		$this->id_question = $id_question;
	}
}