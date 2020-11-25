<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de alumnos</title>
</head>
<body>
    <?php //mostrar todos los alumnos en una tabla
        include_once "../CarpetaDatos/AlumnoDAO.php";
        $alDAO = new AlumnoDAO();
        $alDAO->obtenerListadoAlumnos(); // muestra todos los alumnos (menos el primero no sé por qué)



    ?>

    <table>
        <tr>
            <th>ID</th><!--encabezado de la tabla-->
            <th>Nombre</th>
            <th>Apellidos</th>
            <th>Fecha de nacimiento</th>
        </tr>
        
        <?php//sacar datos que hay en la bbdd
            echo '<tr>';//alumnoDAO -> obtenerListadoAlumnos arreglar 
            echo '<td>' $filas['id'] '</td>' '<td>' $filas['nombre'] '</td>' '<td>' $filas['apellidos'] '</td>' '<td>' $filas['fecha_nacimiento'] '</td>';
            echo '</tr>';

            
            
            
        ?>





    </table>

    

</body>
</html>

