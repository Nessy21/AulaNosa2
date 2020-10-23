<?php 
    class Usuario {
        //atributos 
        private $id;
        private $alumno_id;
        private $login;
        private $password;

        //getters y setters
        public function getId(){
            return $this->id;
        }
        public function setId($id){
            $this->id=$id;
        }
        public function getAlumno_id(){
            return $this->alumno_id;
        }
        public function setAlumno_id($alumno_id){
            $this->alumno_id=$alumno_id;
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

        //constructor

        public function __construct($id, $alumno_id, $login, $password){
            $this->id=$id;
            $this->alumno_id=$alumno_id;
            $this->login=$login;
            $this->password=$password;
        }
    }
?>