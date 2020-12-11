<?php 
    include_once "../CarpetaDatos/AlumnoDAO.php";
    header("Content-type:text/xml");//procesar documento como  tipo texto 
    header("Content-disposition:attachment;filename='listadoAlumnos.xml'");//guardamos el documento en el equipo
    $alDAO = new AlumnoDAO();
    $listaAlumnos= $alDAO->obtenerListadoAlumnos(); 
    $xml="<listaAlumnos>";
    foreach($listaAlumnos as $al){
        $idAlumno=$al->getId();
        $nombrAlumno=$al->getNombre();
        $apellidosAlumno=$al->getApellidos();
        $xml=$xml."<alumno>
                    <nombre>$nombrAlumno</nombre>
                    <apellidos>$apellidosAlumno</apellidos>
                    <fecha_nac>".$al->getFecha_nacimiento()."</fecha_nac>
                </alumno>   
            ";       
    }//foreach
    $xml=$xml."</listaAlumnos>";
    echo $xml;
        

?>