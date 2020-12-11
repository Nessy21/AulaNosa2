<?php
    include_once "../CarpetaDatos/AlumnoDAO.php";//intermediario entre los datos y la vista
    include_once "../CarpetaDatos/UsuarioDAO.php";
    //$alDAO-> obtenerListadoAlumnos();

    // $f = new DateTime ('1998-10-02');//prueba, despues borrar esto, cuando hagamos 
    // $al = new Alumno (4, "Jaime", "Martinez", $f);//con parámetros
    //$alDAO =  ServicioAlumnos::guardarAlumno($al);//Específicamos que llamamos a guardarAlumno de servicioAlumnos 
    //$alDAO =  ServicioAlumnos::altaAlUsu($al, $usu);
    class ServicioAlumnos{
        
        function guardarAlumno($al){//recibe tipo alumno y lo crea en bbdd mediante el metodo del DAO
            $alDAO = new AlumnoDAO();
            $alDAO->guardarAlumno($al);
        }


      
        function altaAlUsu($al, $usu){
            $alDAO = new AlumnoDAO();
           $variable = $alDAO->altaAlUsu($al, $usu);
           return $variable;
        }

        function modificarAlumno($al){
            $alDAO = new AlumnoDAO();
           $variable = $alDAO->guardarAlumno($al);
         
        }

        function usuarioExistente($usu){ //comprobación uno por uno en la bbdd//
            $usuDAO = new UsuarioDAO();
            if(isset($login)){//recorrer todos los login y si existe da error
                echo "El nombre de usuario ya existe. Vuelva a intentarlo con otro alias.";
            }else{
                $usuDAO->guardarUsuario($usu);
            }
        }
    
        function obtenerAlumnoId($id){
            $alDAO = new AlumnoDAO();
            return $alDAO->obtenerAlumno($id);
        }
    }//class
?>