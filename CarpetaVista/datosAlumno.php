<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Datos del alumno</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
    <header>
        <a href="login.php">Login</a><!--funciona cuando no estas logueado, si lo estas, te lleva a datos-->
        <a href="ListadoAlumnos.php">Listado alumnos</a>
        <a href="FormularioAltaAlumno.php">Formulario alta alumno</a>
        <a href="datosAlumno.php">Datos</a>
    
    </header>
    <?php
        include_once "../CarpetaModelo/Usuario.php";
        session_start();
        if (isset($_SESSION['datosUser'])){//solo muestra datos si haces el login en login.php
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