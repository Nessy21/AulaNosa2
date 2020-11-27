<?php
    include_once "../CarpetaDatos/AlumnoDAO.php";//intermediario entre los datos y la vista
    include_once "../CarpetaDatos/UsuarioDAO.php";
    //$alDAO-> obtenerListadoAlumnos();

    // $f = new DateTime ('1998-10-02');//prueba, despues borrar esto, cuando hagamos 
    // $al = new Alumno (4, "Jaime", "Martinez", $f);//con parámetros
    $alDAO =  ServicioAlumnos::guardarAlumno($al);//Específicamos que llamamos a guardarAlumno de servicioAlumnos 
    $usuDAO = ServicioAlumnos::guardarUsuario($usu);
    class ServicioAlumnos{
        
        function guardarAlumno($al){//recibe tipo alumno y lo crea en bbdd mediante el metodo del DAO
            $alDAO = new AlumnoDAO();
            $alDAO->guardarAlumno($al);
        }

        function guardarUsuario($usu){
            $usuDAO = new UsuarioDAO();
            $usuDAO->guardarUsuario($usu);
            // tener en cuenta:
            //● Que no exista ya un usuario dado de alta con el login dado.
            
            //● Que deberá darse de alta el Alumno y su Usuario de forma transaccional.
        }

    }//class
?>