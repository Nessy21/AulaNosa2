<?php
    include_once "../CarpetaDatos/AlumnoDAO.php";
   obtenerListadoAlumnos();
    //guardarAlumno() 
    $al = new Alumno ();//meterle parámetros 

    
    function obtenerListadoAlumnos (){//retorna todos los Alumnos de la bbdd
        $conexion = $this -> crearConexion();// error
        $sql = "SELECT id, nombre, apellidos, fecha_nacimiento FROM  ALUMNO ;";
        $consultaPreparada=$conexion->prepare($sql);
        $consultaPreparada->execute();
        $resultado = $consultaPreparada->get_result();
        $filas = $resultado->fetch_array(); //fetch array devuelve array o falso
        $i=0;
        var_dump($filas);
        do{//$filas != false
            //devuelve un array con los resultados de la fila
            $listaAlumnos [$i];
            $i++;
            var_dump($listaAlumnos[$i]);
            //$al = new Alumno ($fila[1],...);
            //$listaAlumnos[i] = $al;
        }
        while ($filas = $resultado->fetch_array());     
        $conexion->close();

            
    }

    function guardarAlumno ($alumno){
        //recibe tipo alumno y crea en bbdd mediante el metodo del dao
        guardarAlumno($alumno);

        
    }
    


?>