<?php
    session_start();
    unset($_SESSION['datosUser']);
    header("Location: login.php");
?>