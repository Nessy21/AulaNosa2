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
    <form action="../CarpetaModelo/AltaAlumno.php" method="POST" class="text-center">
        <fieldset>
            <legend>Alumno</legend>
            <?php
                include_once '../CarpetaModelo/Alumno.php';
                if(isset($_GET['id'])){//si existe lo guardamos en idAlumno
                    $idAlumno = $_GET['id'];
                    include_once "../CarpetaModelo/ServicioAlumnos.php";
                    $serv = new ServicioAlumnos;
                    $alRec=$serv-> obtenerAlumnoId($idAlumno);
                    //print_r($alRec);
                    $nombre=$alRec->getNombre();
                    $apellidos=$alRec->getApellidos();
                    $fecha_Nac=$alRec->getFecha_nacimiento();

                    echo "
                    <label for='user'>Nombre:</label>
                    <input type='hidden' name='idAlumno' value='$idAlumno'><!--no le muestra al usuario-->
                    <input type='text' name='nombre' id='nombre' value='$nombre' placeholder='Introduce tu nombre...' required>
                    <br>
                    <label for='apellido'>Apellido:</label>
                    <input type='text' name='apellidos' id='apellidos' value='$apellidos' placeholder='Introduce tu apellidos...' required>
                    <br><label for='fecha_Nac'>Fecha de nacimiento:</label>
                    <input type='date' name='fecha_Nac' id='fecha_Nac' value='$fecha_Nac'>
                    <br>
                    ";
                }else{//si no viene con un id asignado de un alumno mostramos todo el formulario
                    echo "
                    <label for='user'>Nombre:</label>
                
                    <input type='text' name='nombre' id='nombre' placeholder='Introduce tu nombre...' required>
                    <br>
                    <label for='apellido'>Apellido:</label>
                    <input type='text' name='apellidos' id='apellidos' placeholder='Introduce tu apellidos...' required>
                    <br><label for='fecha_Nac'>Fecha de nacimiento:</label>
                    <input type='date' name='fecha_Nac' id='fecha_Nac'> 
                    <br>
                    </fieldset>
                    <fieldset>
                        <legend>Datos usuario</legend>
                        
                        <label for='user'>Usuario:</label>
                        <input type='text' name='user' id='user' placeholder='Introduce tu usuario...' required>
                        <br>
                        <label for='pwd'>Contraseña:</label>
                        <input type='password' name='password' id='password' placeholder='Introduce la contraseña...' required>
                        <br>
                    </fieldset>
                    ";
                }
            ?>
        <input type="submit" value="Enviar">
    </form>
</body>
</html>

