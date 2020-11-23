<?php
    include_once "../CarpetaDatos/AlumnoDAO.php";//intermediario entre los datos y la vista
    
    $alDAO = new AlumnoDAO();//objeto para poder utilizar las funciones de dentro de la clase
  
    $alDAO-> obtenerListadoAlumnos();

    $f = new DateTime ('1998-10-02');
    $al = new Alumno (4, "Jaime", "Martinez", $f);//con parámetros
    $alDAO =  ServicioAlumnos::guardarAlumno($al);//Especificamos que llamamos a guardarAlumno de servicioAlumnos 
    
    //el error solo lo da cuando entras desde aqui, asi que hay un fallo aqui 
    class ServicioAlumnos{
        
        function guardarAlumno($al){//recibe tipo alumno y lo crea en bbdd mediante el metodo del DAO
            
            AlumnoDAO::guardarAlumno($al);//pasamos el alumnos al método del DAO
            
            
           
        }

    }//class
?>