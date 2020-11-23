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
        $alDAO->obtenerListadoAlumnos();



    ?>

    <table><!--encabezado de la tabla-->
        <th>ID</th>
        <th>Nombre</th>
        <th>Apellidos</th>
        <th>Fecha de nacimiento</th>
        <?php//sacar datos que hay en la bbdd
            

            
            
            
        ?>





    </table>

    

</body>
</html>

