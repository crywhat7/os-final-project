<?php
@include("conexion.php");

if ($conexion) {
    // Obtener los datos del formulario
    $nombre = $_POST['nombre'];
    $capacidad = $_POST['capacidad'];
    $imagen = $_POST['imagen'];

    // Validar los datos recibidos
    if (!empty($nombre) && !empty($imagen) && !empty($capacidad)) {
        // Mostrar un mensaje de éxito
        $nombre = strtoupper($nombre);
        
        // A cada variable se le eliminan los espacios sobrantes.
        $nombre = trim($nombre);

        $sql = "INSERT INTO establos (nombre, imagen, capacidad)
                VALUES ('$nombre', '$imagen', $capacidad);";

        if (mysqli_query($conexion, $sql)) {
            echo "Se ha registrado el establo";
            header("Location: ../mantenimiento/establos.php");
        } else {
            echo "No se pudo registrar el establo";
        }
    } else {
        // Mostrar un mensaje de error
        echo "Algunos de los datos proporcionados no son válidos. Por favor, inténtalo de nuevo.";
    }

} else {
    echo "No se pudo conectar a la base de datos";
}
?>