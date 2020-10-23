<?php
    include_once "../Carpetamodelo/Usuario.php"
    $servidorBD = 'localhost';
    $usuarioBD = 'root';
    $password = '';
    $bd = 'AulaNosa';
    $con = new mysqli ($servidorBD, $usuarioBD, $password, $bd);
    $sql = "SELECT id, login, password, alumno_id FROM  USUARIO WHERE login=? and password=?;";
    $consultaPreparada=$con->prepare ($sql);
    $consultaPreparada-> bind_param("ss", $login, $password);
    $consultaPreparada->execute();
    $filas = $consultaPreparada->fecth();

    
    function obtenerUsuario ($login, $password){
        //select  * from usuario where login = 'log1' and PASSWORD = '1234';
        //en mysqli  'log1' -> ? porque es más seguro
        //$consultaPreparada->bind_param("ss", $login, $pass); $consultaPreparada->execute();[ si es un insert ]
        // $datos= $consultaPreparada -> query(); consulta 
    }

    function guardarUsuario ($usuario){

    }

    function eliminarUsuario ($usuario){

    }


?>
