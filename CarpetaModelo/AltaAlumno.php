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
    

    $al = new Alumno(0, $nombre, $apellidos, new DateTime($fecha_Nac));// id 0 para que cree el alumno
    $serv = new ServicioAlumnos;
    
    //
            
    $usu = new Usuario (0, $user, $password, $alu->getId());//falta poner alumno_id-> 
    $serv = new ServicioAlumnos;
    $serv-> altaAlUsu($al, $usu);


?>