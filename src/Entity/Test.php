<?php

class Test
{
	private $id_test;
    private $id_category;
    private $id_type_test;
	private $detail;
	private $status;
	private $detail_test;
	private $crate_at;


    public function getId_test(){
		return $this->id_test;
	}

	public function setId_test($id_test){
		$this->id_test = $id_test;
	}

	public function getId_category(){
		return $this->id_category;
	}

	public function setId_category($id_category){
		$this->id_category = $id_category;
	}

	public function getId_type_test(){
		return $this->id_type_test;
	}

	public function setId_type_test($id_type_test){
		$this->id_type_test = $id_type_test;
	}
	public function getDetal(){
		return $this->detail;
	}

	public function setDetail($detail){
		$this->detail = $detail;
	}
	public function getStatus(){
		return $this->status;
	}

	public function setStatus($status){
		$this->status = $status;
	}
	public function getDetail_test(){
		return $this->detail_test;
	}

	public function setDetail_test($detail_test){
		$this->detail_test = $detail_test;
	}
	public function getCrateAt(){
		return $this->crate_at;
	}

	public function setCrateAt($crate_at){
		$this->crate_at = $crate_at;
	}
}