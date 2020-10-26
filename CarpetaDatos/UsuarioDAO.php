<?php
    include_once "../Carpetamodelo/Usuario.php";
    $login= 'admin';
    $password='1234'; 
    $usu = new UsuarioDAO();
    $usuDAO = new UsuarioDAO();//creamos un objeto para poder utilizar las funciones de dentro de la clase
    $usuDAO-> obtenerUsuario($login, $password);
    //$usuDAO-> guardarUsuario ($usu);

    class UsuarioDAO{
        
        function crearConexion(){//conexion de php a la bbdd
            $servidorBD = 'localhost';
            $usuarioBD = 'root';
            $password = '';
            $bd = 'AulaNosa';
            $con = new mysqli ($servidorBD, $usuarioBD, $password, $bd);
            if ($con->connect_error){
                echo ('Problemas conectando con la BD<br>'.$con->connect_error);
            }
            return $con;
        }
        
        function obtenerUsuario ($login, $password){
            $conexion = $this -> crearConexion();//peta
            $sql = "SELECT id, login, password, alumno_id FROM  USUARIO WHERE login=? and password=?;";
            $consultaPreparada=$conexion->prepare ($sql);
            $consultaPreparada-> bind_param("ss", $login, $password);
            $consultaPreparada->execute();
            $resultado= $consultaPreparada -> get_result();
            $filas = $resultado->fetch_array();
            var_dump ($filas);
            $conexion->close();
        }

        function guardarUsuario ($usuario){
            $conexion= $this-> crearConexion();
          
            $login = $usuario->getLogin();
            $password = $usuario->getPassword();
            $alumno_id = $usuario -> getAlumno_id();
            $sql = "INSERT INTO USUARIO( id, login, password, alumno_id) values (?, ?, ?, ?);";
            $consultaPreparada=$conexion->prepare ($sql);
            //asignariamos valores a los campos
            $consultaPreparada = bind_param("ssi", $login, $password, $alumno_id);
            $consultaPreparada = execute();
            $id = $conexion->insert_id;
            var_dump($id);
            $consultaPreparada = close();
        }

        function eliminarUsuario ($usuario){

        }

    }//class
    

?>
