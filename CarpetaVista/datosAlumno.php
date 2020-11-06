<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Datos del alumno</title>
</head>
<body>
    <?php
        include_once "../CarpetaModelo/Usuario.php";
        session_start();
        if (isset($_SESSION['datosUser'])){ 
            $datos = $_SESSION['datosUser'];
            //sacamos los datos del Usuario
            echo "User: ";
            echo $datos->getLogin();
            echo "<br>";
            echo "Contraseña: ";
            echo $datos->getPassword();
            // echo "<br>";
            // echo "Apellidos: ";
            // echo $datos->getApellidos();
            // echo "<br>"; 
            // echo "Fecha de nacimiento : ";
            // echo $datos->getFecha_nacimiento();  
        }
        
    ?>
    <form action="desloguear.php" method="POST">
        <input type="submit" value="Desloguear">
    </form> 
</body>
</html>