<?php
@include("conexion.php");

if ($conexion) {
    // Obtener los datos del formulario
    $codigo = $_POST['codigo'];

    $sql = "DELETE FROM alimentos WHERE codigo_alimento = $codigo;";

    if (mysqli_query($conexion, $sql)) {
        echo "Se ha eliminado el ganado";
        header("Location: ../mantenimiento/alimentos.php");
    } else {
        echo "No se pudo eliminar el ganado";
    }
} else {
    echo "No se pudo conectar a la base de datos";
}
?>