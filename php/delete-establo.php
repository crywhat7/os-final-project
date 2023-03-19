<?php
@include("conexion.php");

if ($conexion) {
    // Obtener los datos del formulario
    $codigo = $_POST['codigo'];

    $sql = "DELETE FROM establos WHERE codigo_establo = $codigo;";

    if (mysqli_query($conexion, $sql)) {
        echo "Se ha eliminado el establo";
        header("Location: ../mantenimiento/establos.php");
    } else {
        echo "No se pudo eliminar el establo";
    }
} else {
    echo "No se pudo conectar a la base de datos";
}
?>