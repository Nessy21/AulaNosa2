<?php
    include_once "../Carpetamodelo/Usuario.php";
    $login= 'admin';
    $password='1234'; 
    $usu = new Usuario(0, 'usuario', 'asociado', 3);//modificamos para crear, modificar borrar
    $user = new Usuario (6, 'borrar jej', 'gerlo', 1);
    $usuDAO = new UsuarioDAO();//creamos un objeto para poder utilizar las funciones de dentro de la clase
    $usuDAO-> obtenerUsuario($login, $password);
    $usuDAO-> guardarUsuario ($usu);
    $usuDAO-> eliminarUsuario($user);
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
            $conexion = $this -> crearConexion();
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
            $id= $usuario -> getId();
            $login = $usuario->getLogin();
            $password = $usuario->getPassword();
            $alumno_id = $usuario -> getAlumno_id();
            $conexion= $this-> crearConexion(); 
            
            if ($id===0){// si tiene id -> 0  hacemos update || id no esta definido   
               //Insertamos
               $sql = "INSERT INTO USUARIO( login, password, alumno_id) values ( ?, ?, ?);";//autoincrementales no se pasan
               $consultaPreparada=$conexion->prepare ($sql);
               //asignariamos valores a los campos
               $consultaPreparada ->bind_param("ssi", $login, $password, $alumno_id);
               $consultaPreparada -> execute();
               $id = $conexion->insert_id;
               var_dump($id);
            }else{
                $id = $usuario-> getId();
                $sql = "UPDATE USUARIO SET login=?, password=? WHERE id=?;";
                $consultaPreparada=$conexion->prepare($sql);
                $consultaPreparada->bind_param("ssi", $login, $password, $id);
                $consultaPreparada-> execute();
                $id = $conexion->insert_id;
                var_dump($id);
            }
            $conexion->close();
        }

        function eliminarUsuario ($usuario){
            $id= $usuario -> getId();
            $conexion= $this-> crearConexion();
            //$sql = "SELECT id, login, password, alumno_id FROM  USUARIO WHERE login=? and password=?;";
            $sql = "DELETE FROM USUARIO where id=?;";
            $consultaPreparada=$conexion->prepare($sql);
            $consultaPreparada->bind_param("i", $id);
            $consultaPreparada-> execute();
            $conexion->close();
        }

    }//class
    

?>
