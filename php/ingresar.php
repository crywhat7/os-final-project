<?php

@include("../php/conexion.php");
session_start();

$user = $_POST['user'];
$password = $_POST['password'];

$consulta = "SELECT 1 FROM clientes WHERE username='$user' and pass='$password'";
$resultado = mysqli_query($conexion, $consulta);

// Si el usuario existe, se crea la sesión
if (mysqli_num_rows($resultado) > 0) {  
    header("Location: ../mantenimiento/ganado.php");
} else {
    echo "El usuario o la contraseña son incorrectos";
}

mysqli_free_result($resultado);
?>