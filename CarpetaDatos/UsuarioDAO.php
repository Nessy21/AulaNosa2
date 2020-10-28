<?php
    include_once "../Carpetamodelo/Usuario.php";
    $login= 'admin';
    $password='1234'; 
    $usu = new Usuario(5, 'paquito', 'gerlo', 1 );
    $usuDAO = new UsuarioDAO();//creamos un objeto para poder utilizar las funciones de dentro de la clase
    $usuDAO-> obtenerUsuario($login, $password);
    $usuDAO-> guardarUsuario ($usu);

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
            $login = $usuario->getLogin();
            $password = $usuario->getPassword();
            $alumno_id = $usuario -> getAlumno_id();
            $conexion= $this-> crearConexion(); 
            $id = 5;//prueba para ver si cambia
            if ($id!=0){// si tiene id -> 0  hacemos update || id no esta definido   
                $id = $usuario-> setId(5);  //No me cambia el id   //no me hace update
                $sql = "UPDATE USUARIO SET id='$id' ,login='$login', password='$password', alumno_id='$alumno_id' WHERE id='$id';";
                $consultaPreparada=$conexion->prepare($sql);//le he puesto un i a bind_param error por demasiados parametros 
                $consultaPreparada->bind_param("issi", $id, $login, $password, $alumno_id);//error por poner line 41->YA NO
                $consultaPreparada-> execute();
                $id = $conexion->insert_id;
                var_dump($id);
                //SET login = ? o como 

            }else{//Insertamos
                $sql = "INSERT INTO USUARIO( login, password, alumno_id) values ( ?, ?, ?);";//autoincrementales no se pasan
                $consultaPreparada=$conexion->prepare ($sql);
                //asignariamos valores a los campos
                $consultaPreparada ->bind_param("ssi", $login, $password, $alumno_id);
                $consultaPreparada -> execute();
                $id = $conexion->insert_id;
                var_dump($id);
            }
            $conexion->close();
        }

        function eliminarUsuario ($usuario){
            $conexion= $this-> crearConexion();
            $id = $usuario->getId();
            $sql = "SELECT id, login, password, alumno_id FROM  USUARIO WHERE login=? and password=?;";
            $sql = "DELETE FROM USUARIO( login, password, alumno_id) where (id=?);";

        }

    }//class
    

?>
