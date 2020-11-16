<?php
    include_once "../CarpetaDatos/AlumnoDAO.php";//intermediario entre los datos y la vista
    
    $alDAO = new AlumnoDAO();//objeto para poder utilizar las funciones de dentro de la clase
    //$alDAO = obtenerListadoAlumnos();
   
    $alDAO = guardarAlumno();// ...undefined method...
  
    class ServicioAlumnos{
        
        function guardarAlumno(){
            //recibe tipo alumno y crea en bbdd mediante el metodo del DAO

            //creacion de un alumno y se lo pasamos al método del DAO 
            $f = new DateTime ('1998-10-02');
            $al = new Alumno (4, "Jaime", "Martinez", $f);//con parámetros
           
            
            AlumnoDAO::guardarAlumno($al);//método del DAO

        }



        
    }//class
?>