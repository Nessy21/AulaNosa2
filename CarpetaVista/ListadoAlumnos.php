<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de alumnos</title>
</head>
<body>
   

    <table>
        <tr>
            <th>ID</th><!--encabezado de la tabla-->
            <th>Nombre</th>
            <th>Apellidos</th>
            <th>Fecha de nacimiento</th>
        </tr>
        
        <?php
        //sacar datos que hay en la bbdd
            //mostrar todos los alumnos en una tabla
            include_once "../CarpetaDatos/AlumnoDAO.php";
            $alDAO = new AlumnoDAO();
            $listaAlumnos= $alDAO->obtenerListadoAlumnos(); 
                foreach($listaAlumnos as $al){//recorres $listaAlumnos
                    echo '<tr>';//alumnoDAO -> obtenerListadoAlumnos  
                    echo '<td>'. $al->getId() .'</td><td>' .$al->getNombre(). '</td><td>'. $al->getApellidos(). '</td><td>' .$al->getFecha_nacimiento(). '</td>';
                    echo '</tr>'; 
                }  
        ?>
    </table>

    

</body>
</html>

