<?php
@include("conexion.php");

if ($conexion) {
    // Obtener los datos del formulario
    $codigoVaca = $_POST['codigo'];

    $sql = "DELETE FROM ganado WHERE codigo_vaca = $codigoVaca;";

    if (mysqli_query($conexion, $sql)) {
        echo "Se ha eliminado el ganado";
        header("Location: ../mantenimiento/ganado.php");
    } else {
        echo "No se pudo eliminar el ganado";
    }
} else {
    echo "No se pudo conectar a la base de datos";
}
?>