<?php
    include_once "../CarpetaModelo/Autenticacion.php";
    
 //no entraba porque faltaba la class

    $user = $_POST['user'];//lo que viene del formulario
    $password = $_POST['password'];//

        //llamamos a la funcion autenticar usuario (pero esto ya lo hace usuDAO)
        $mc=new Autenticacion();//no va a ir porque el Autenticacion tiene errores
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
            header ("Location: errorAutenticacion.php");
        }
    
?>