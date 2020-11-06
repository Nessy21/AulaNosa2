<?php
    include_once "../CarpetaVista/Autenticar.php";
    include_once "Usuario.php";
    include_once "../CarpetaDatos/UsuarioDAO.php";//conectamos con usuarioDAO para que haga sus comprobaciones(?)

    class Autenticacion{

        function autenticarUsuario($user, $password){
            
            $user = new UsuarioDAO();
            $userGuardado=$user-> obtenerUsuario($user, $password);

            if ($userGuardado!=false){
                return $userGuardado;
            }else{
                return false;
            }
        }//Autenticar usuario
    }
?>