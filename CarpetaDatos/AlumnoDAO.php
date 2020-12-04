<?php
    include_once "../CarpetaModelo/Alumno.php";
    include_once "../CarpetaModelo/Usuario.php";
    //$f = new DateTime ('1997-08-26');
    //$al = new Alumno (3, 'Alumno', 'Rodriguez', $f);//crear objeto tipo fecha
    //$alDAO = new AlumnoDAO();//creamos un objeto para poder utilizar las funciones de dentro de la clase
    //$id = 2;
    //$alDAO-> obtenerAlumno($id);
    //$alDAO-> guardarAlumno($al);
   // $alu = new Alumno (3, "", "", 0);//si tiene usuarios asociados no borra
    //$alDAO-> eliminarAlumno($alu);
    //$alDAO-> obtenerListadoAlumnos();

    class AlumnoDAO{

        function crearConexion(){//conexion de php a la bbdd
            $servidorBD = 'localhost';
            $usuarioBD = 'root';
            $password = '';
            $bd = 'AulaNosa2';
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
            $f = $alumno->getFecha_nacimiento();
            $conexion=$this-> crearConexion();
            if ($id===0){// si tiene id -> 0  hacemos nuevo || id no esta definido
                //Insertamos
                $sql = "INSERT INTO ALUMNO( nombre, apellidos, fecha_nacimiento) values ( ?, ?, ?);";//autoincrementales no se pasan
                $consultaPreparada=$conexion->prepare($sql);
                //asignariamos valores a los campos
                $fecha = $f->format('Y-m-d');
                $consultaPreparada->bind_param("sss", $nombre, $apellidos, $fecha);
                $consultaPreparada->execute();
                $id = $conexion->insert_id;
                //tenemos que actualizar el id de altaAlumno (que será cero para entrar en insert) e igualarlo con el id autoincremental de la bbdd
                $alumno->setId($id);
                var_dump($id);//creado con éxito
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

        function eliminarAlumno($alumno){//eliminar alumnos
            $id= $alumno -> getId();
            $conexion= $this-> crearConexion();
            $sql = "DELETE FROM ALUMNO where id=?;";
            $consultaPreparada=$conexion->prepare($sql);
            $consultaPreparada->bind_param("i", $id);
            $consultaPreparada-> execute();
            $conexion->close();
        }

        function obtenerListadoAlumnos(){//devolver todos los usuarios de la bbdd
            $conexion = $this->crearConexion();
            $sql = "SELECT id, nombre, apellidos, fecha_nacimiento FROM  ALUMNO;";
            $consultaPreparada=$conexion->prepare($sql);
            $consultaPreparada->execute();
            $resultado = $consultaPreparada->get_result();
            $listaAlumnos= array();//creamos un array donde guardaremos los alumnos
            while($filas = $resultado->fetch_array()) //filas es un solo alumno 
            {
               //($id, $nombre, $apellidos, $fecha_nacimiento)
                $al= new Alumno( $filas['id'], $filas['nombre'], $filas['apellidos'], $filas['fecha_nacimiento']);
                $listaAlumnos[]=$al;//añadimos el alumno 
            }
            $conexion->close();
            
            return $listaAlumnos;
        }

        function altaAlUsu($al, $usu){
           // $usuDAO = new UsuarioDAO();
            //$alDAO = new AlumnoDAO();
            try{
                $conexion=$this->crearConexion();
                $conexion->autocommit(false);
                $conexion->begin_Transaction();

                //insertar alumno (lastinsertid )

                $id = $al -> getId();
                $nombre = $al->getNombre();
                $apellidos = $al->getApellidos();
                $f = $al->getFecha_nacimiento();
                $sql = "INSERT INTO ALUMNO( nombre, apellidos, fecha_nacimiento) values ( ?, ?, ?);";//autoincrementales no se pasan
                $consultaPreparada=$conexion->prepare($sql);
                //asignariamos valores a los campos
                $fecha = $f->format('Y-m-d');
                $consultaPreparada->bind_param("sss", $nombre, $apellidos, $fecha);
                $consultaPreparada->execute();
                $idAlumno = $conexion->insert_id;
                $al->setId($idAlumno);

                //insertar usuario

                $id= $usu->getId();
                $login = $usu->getLogin();
                $password = $usu->getPassword();
                $alumno_id = $idAlumno; //$usu->getAlumno_id();
                $sql = "INSERT INTO USUARIO(login, password, alumno_id) values ( ?, ?, ?);";//autoincrementales no se pasan
                $consultaPreparada=$conexion->prepare ($sql);
                //asignariamos valores a los campos
                $consultaPreparada->bind_param("ssi", $login, $password, $alumno_id);
                $consultaPreparada->execute();
                $id = $conexion->insert_id;

                $conexion->commit();
            }catch(Exception $e){
                $conexion -> rollback();
            }

        }


    }//class
?>