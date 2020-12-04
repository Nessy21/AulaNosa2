<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de alumnos</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <style>
        body{
            background-color: #EEE9AD;
        }
        div{
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 10%;
        }
        table{
            text-align: center;
            border-collapse: collapse;
            
        }
        td, th, tr{
            border: 1px solid #8D7A10;
        }
        th{
            color: white;
            background-color: #CABB66;
            padding: 5% 0%;
        }
        td{
            background-color: white;
            padding: 2% 0%;
        }
    </style>
</head>
<body>
   
    <div>
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
    </div>
    

</body>
</html>

