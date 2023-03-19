<?php
@include("conexion.php");

if ($conexion) {
    // Obtener los datos del formulario
    $nombre = $_POST['nombre'];
    $imagen = $_POST['imagen'];
    $tipo_producto = $_POST['tipo_producto'];
    $precio = $_POST['precio'];

    // Validar los datos recibidos
    if (!empty($nombre) && !empty($imagen)) {
        // Mostrar un mensaje de éxito
        $nombre = strtoupper($nombre);
        
        // A cada variable se le eliminan los espacios sobrantes.
        $nombre = trim($nombre);

        $sql = "INSERT INTO productos (nombre_producto, tipo_producto, precio, imagen)
                VALUES ('$nombre', $tipo_producto, $precio, '$imagen');";

        if (mysqli_query($conexion, $sql)) {
            echo "Se ha registrado el producto";
            header("Location: ../mantenimiento/productos.php");
        } else {
            echo "No se pudo registrar el producto";
        }
    } else {
        // Mostrar un mensaje de error
        echo "Algunos de los datos proporcionados no son válidos. Por favor, inténtalo de nuevo.";
    }

} else {
    echo "No se pudo conectar a la base de datos";
}
?>