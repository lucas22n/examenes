<?php

class Examen
{
    private $id_question;
    private $question;
	private $id_category;
    private $eliminate;
    private $id_response;

    public function getId_question(){
		return $this->id_question;
	}

	public function setId_question($id_question){
		$this->id_question = $id_question;
	}

	public function getQuestion(){
		return $this->question;
	}

	public function setQuestion($question){
		$this->question = $question;
	}

	public function getId_category(){
		return $this->id_category;
	}

	public function setId_category($id_category){
		$this->id_category = $id_category;
	}

	public function getEliminate(){
		return $this->eliminate;
	}

	public function setEliminate($eliminate){
		$this->eliminate = $eliminate;
	}

	public function getId_response(){
		return $this->id_response;
	}

	public function setId_response($id_response){
		$this->id_response = $id_response;
	}
}