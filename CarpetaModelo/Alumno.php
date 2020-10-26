<?php
    class Alumno {
        //atributos 
        private $id;
        private $nombre;
        private $apellidos;
        private $fecha_nacimiento;

        //getters y setters
        public function getId(){
            return $this->id;
        }
        public function setId($id){
            $this->id=$id;
        }
        public function getNombre(){
            return $this->nombre;
        }
        public function setNombre($nombre){
            $this->nombre=$nombre;
        }
        public function getApellidos(){
            return $this->apellidos;
        }
        public function setApellidos($apellidos){
            $this->apellidos=$apellidos;
        }
        
        public function getFecha_nacimiento(){
            return $this->fecha_nacimiento;
        }
        public function setFecha_nacimiento($fecha_nacimiento){
            $this->fecha_nacimiento=$fecha_nacimiento;
        }

        //constructor

        public function __construct($id, $nombre, $apellidos, $fecha_nacimiento){
            $this->id=$id;
            $this->nombre=$nombre;
            $this->apellidos=$apellidos;
            $this->fecha_nacimiento=$fecha_nacimiento;
        }
    } 


?>