<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario</title>
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

        //Hacer un login de usuario. Despues autenticamos contra la bbdd que tenemos. 

        session_start();
        if(isset($_SESSION['datosUser'])){
            header("Location: datosUser.php");
        }
        $cont=1;

        if(!isset($_COOKIE['numvisitas'])){
            setcookie('numvisitas', $cont, time()+60);
        }else{
            $cont=$_COOKIE['numvisitas'];
        }

        if($cont==4){
            echo "demasiados intentos...vuelva a intentarlo más tarde";
        }else{
            echo $cont."<br>";
            echo ' <form action="Autenticar.php" method="POST">
            <label for="user">Usuario:</label>
            <input type="text" name="user" id="user" placeholder="Introduce tu usuario...">
            <br>
            <label for="pwd">Contraseña:</label>
            <input type="password" name="password" id="password" placeholder="Introduce la contraseña...">
            <br>
            <input type="submit" value="Enviar">
        </form>';

        
        }
    ?>
</body>
</html>