<?php
    include_once "../CarpetaDatos/AlumnoDAO.php";
   obtenerListadoAlumnos();
    //guardarAlumno() 
    $al = new Alumno ();//meterle parámetros 

    
    function obtenerListadoAlumnos (){//retorna todos los Alumnos de la bbdd
        $conexion = $this -> crearConexion();//
        $sql = "SELECT id, nombre, apellidos, fecha_nacimiento FROM  ALUMNO ;";
        $consultaPreparada=$conexion->prepare($sql);
        $consultaPreparada->execute();
        $resultado = $consultaPreparada->get_result();
        $filas = $resultado->fetch_array();
            //$al = new Alumno ($fila[1],...);
            //$listaAlumnos[i] = $al;
        $i=0;
        while ($filas!=false){
            $filas = $resultado->fetch_array();//devuelve un array con los resultados de la fila
            $listaAlumnos [$i];
            $i++;
            }
        $conexion->close();

            
    }

    function guardarAlumno ($alumno){
        //recibe tipo alumno y crea en bbdd mediante el metodo del dao
        guardarAlumno($alumno);

        
    }
    


?>