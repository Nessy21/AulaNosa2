<?php 
    include_once "../Carpetamodelo/Alumno.php";//hgf
    $f = new DateTime ('1997-08-26'); 
    $al = new Alumno (3, 'Alumno', 'Rodriguez', $f);//crear objeto tipo fecha 
    $alDAO = new AlumnoDAO();//creamos un objeto para poder utilizar las funciones de dentro de la clase
    $id = 2;
    $alDAO-> obtenerAlumno($id);
    $alDAO-> guardarAlumno($al);
    $alu = new Alumno (3, "", "", 0);//si tiene usuarios asociados no borra
    $alDAO-> eliminarAlumno($alu);

    class AlumnoDAO{

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

        function obtenerAlumno($id){
            $conexion = $this -> crearConexion();
            $sql = "SELECT id, nombre, apellidos, fecha_nacimiento FROM  ALUMNO WHERE id=? ;";
            $consultaPreparada=$conexion->prepare ($sql);
            $consultaPreparada->bind_param("i", $id);
            $consultaPreparada->execute();
            $resultado = $consultaPreparada->get_result();
            $filas = $resultado->fetch_array();
            var_dump ($filas);
            $conexion->close();
        }
    
        function guardarAlumno($alumno){
            $id = $alumno -> getId();
            $nombre = $alumno->getNombre();
            $apellidos = $alumno->getApellidos();
            $f = $alumno->getFecha_nacimiento();//
            $conexion= $this-> crearConexion(); 
            if ($id===0){// si tiene id -> 0  hacemos update || id no esta definido   
                //Insertamos
                $sql = "INSERT INTO ALUMNO( nombre, apellidos, fecha_nacimiento) values ( ?, ?, ?);";//autoincrementales no se pasan
                $consultaPreparada=$conexion->prepare ($sql);
                //asignariamos valores a los campos
                $fecha = $f->format('Y-m-d');
                $consultaPreparada->bind_param("sss", $nombre, $apellidos, $fecha);
                $consultaPreparada->execute();
                $id = $conexion->insert_id;
                var_dump($id);
            }else{
                $id = $alumno-> getId();
                $sql = "UPDATE ALUMNO SET nombre=?, apellidos=?, fecha_nacimiento=? WHERE id=?;";
                $consultaPreparada=$conexion->prepare($sql);
                $fecha = $f->format('Y-m-d');
                $consultaPreparada->bind_param("sssi", $nombre, $apellidos, $fecha, $id);
                $consultaPreparada->execute();
                $id = $conexion->insert_id;
                var_dump($id);
            }
            $conexion->close();


        }
    
        function eliminarAlumno($alumno){
            $id= $alumno -> getId();
            $conexion= $this-> crearConexion();
            $sql = "DELETE FROM ALUMNO where id=?;";
            $consultaPreparada=$conexion->prepare($sql);
            $consultaPreparada->bind_param("i", $id);
            $consultaPreparada-> execute();
            $conexion->close();
        }
    
    }

?>