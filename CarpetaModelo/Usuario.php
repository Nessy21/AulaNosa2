<?php 
    class Usuario {
        //atributos 
        private $id;
        private $login;
        private $password;
        private $alumno_id;
        //getters y setters
        public function getId(){
            return $this->id;
        }
        public function setId($id){
            $this->id=$id;
        }
       
        public function getLogin(){
            return $this->login;
        }
        public function setLogin($login){
            $this->login=$login;
        }
        public function getPassword(){
            return $this->password;
        }
        public function setPassword($password){
            $this->password=$password;
        }
        public function getAlumno_id(){
            return $this->alumno_id;
        }
        public function setAlumno_id($alumno_id){
            $this->alumno_id=$alumno_id;
        }
        //constructor

        public function __construct($id, $login, $password, $alumno_id){
            $this->id=$id;
            $this->login=$login;
            $this->password=$password;
            $this->alumno_id=$alumno_id;
        }
    }
?>