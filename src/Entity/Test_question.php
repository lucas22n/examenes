<?php

    class Test_question{

        // private $id_test_question;
        private $id_test;
        public $id_question;
        public $eliminate;

        // public function getId_test_question(){
        //     return $this->id_test_question;
        // }
    
        // public function setId_test_question($id_test_question){
        //     $this->id_test_question = $id_test_question;
        // }
    
        public function getId_test(){
            return $this->id_test;
        }
    
        public function setId_test($id_test){
            $this->id_test = $id_test;
        }
    
        public function getId_question(){
            return $this->id_question;
        }
    
        public function setId_question($id_question){
            $this->id_question = $id_question;
        }
        public function getEliminate(){
            return $this->id_eliminate;
        }
    
        public function setEliminate($eliminate){
            $this->eliminate = $eliminate;
        }
    }