<?php
    include_once "../CarpetaModelo/Autenticacion.php";

    $user = $_POST['user'];
    $password = $_POST['password'];

    //llamamos a la funcion autenticar usuario (pero esto ya lo hace usuDAO)
    $mc=new Autenticacion();
    $mc-> autenticarUsuario($user, $password);//para invocar se utiliza '->'
    $resultado=$mc-> autenticarUsuario($user, $password);//para guardar el resultado

    //var_dump($resultado);

    //redireccionar
    if ($resultado!=false){
        session_start();
        $_SESSION['datosUser'] = $resultado;

        setcookie('numvisitas', $cont, time()+60);
        header ("Location: datosAlumno.php?");//user=$user&password=$password para que se vea en la URL 


    }else{
        $cont=1;
       if(!isset($_COOKIE['numvisitas'])){//creamos una cookie en caso de que no haya
            setcookie('numvisitas', $cont, time()+60);
        }else{//en caso de que haya una cookie existente, actualizamos el contador
            $cont=$_COOKIE['numvisitas'];
            $cont++;
            setcookie('numvisitas', $cont, time()+60);
        }
        header ("Location: errorAutentificacion.php");
    }
    
?>