<?php
@include("conexion.php");

if ($conexion) {
    // Obtener los datos del formulario
    $nombre = $_POST['nombre'];
    $imagen = $_POST['imagen'];

    // Validar los datos recibidos
    if (!empty($nombre) && !empty($imagen)) {
        // Mostrar un mensaje de éxito
        $nombre = strtoupper($nombre);
        
        // A cada variable se le eliminan los espacios sobrantes.
        $nombre = trim($nombre);

        $sql = "INSERT INTO alimentos (nombre, imagen)
                VALUES ('$nombre', '$imagen');";

        if (mysqli_query($conexion, $sql)) {
            echo "Se ha registrado el alimento";
            header("Location: ../mantenimiento/alimentos.php");
        } else {
            echo "No se pudo registrar el alimento";
        }
    } else {
        // Mostrar un mensaje de error
        echo "Algunos de los datos proporcionados no son válidos. Por favor, inténtalo de nuevo.";
    }

} else {
    echo "No se pudo conectar a la base de datos";
}
?>