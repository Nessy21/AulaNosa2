<?php
    include_once "../CarpetaModelo/Alumno.php";
    include_once "../CarpetaModelo/Usuario.php";
    include_once "../CarpetaModelo/ServicioAlumnos.php";
    //recoger datos formulario (formulario alta alumno)

    
    $user = $_POST['user'];
    $password = $_POST['password'];
    $nombre=$_POST['nombre'];
    $apellidos=$_POST['apellidos'];
    $fecha_Nac=$_POST['fecha_Nac'];
    
    if(isset($_POST['idAlumno'])){//si existe hay que modificarlo
        $idAlumno = $_POST['idAlumno'];

        $al = new Alumno($idAlumno, $nombre, $apellidos, new DateTime($fecha_Nac));// id del alumno para modificar lo que sea         
        $serv = new ServicioAlumnos;
        $serv-> modificarAlumno($al);
        header("Location:../CarpetaVista/ListadoAlumnos.php");
    }else{

        $al = new Alumno(0, $nombre, $apellidos, new DateTime($fecha_Nac));// id 0 para que cree el alumno
        
        $usu = new Usuario (0, $user, $password, $al->getId());//falta poner alumno_id-> 
        $serv = new ServicioAlumnos;
        $serv-> altaAlUsu($al, $usu);
        header("Location:../CarpetaVista/ListadoAlumnos.php");
    }

   

    
?>