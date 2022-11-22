<?php

class Status{
    private $id_status;
    private $detail;

    public function getId_status(){
		return $this->id_status;
	}

	public function setId_status($id_status){
		$this->id_status = $id_status;
	}

	public function getDetail(){
		return $this->detail;
	}

	public function setDetail($detail){
		$this->detail = $detail;
	}
}