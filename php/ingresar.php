<?php

require 'conexion.php';
session_start();

$user = $_POST['user'];
$password = $_POST['password'];

$consulta = "SELECT * FROM clientes WHERE usuario='$user' and pass='$password'";
$resultado = mysqli_query($conex, $consulta);

$array = mysqli_fetch_array($resultado);

if ($array['contar'] > 0) {
    header("Location:../mantenimiento/ganado.php");
} else {
    echo "Error en la autenticación";
}
mysqli_free_result($resultado);
mysqli_close($conex);

?>