<?php
@include("conexion.php");

/*
 * Modificar el id "marca"
 * 
 * en la imagen de discord sale recortado
 * 
 * 
 * 
 * 
 */

if ($conexion) {
    // Obtener los datos del formulario
    $marca = $_POST['marca'];
    $nombre = $_POST['nombre'];
    $imagen = $_POST['imagen'];
    $establo_pertenece = $_POST['establo_pertenece'];
    $alimento_preferido = $_POST['alimento_preferido'];
    $fecha_nacimiento = $_POST['fecha_nacimiento'];

    // Validar los datos recibidos
    if (!empty($marca) && !empty($nombre) && !empty($imagen) && !empty($establo_pertenece) && !empty($alimento_preferido) && !empty($fecha_nacimiento)) {
        // Mostrar un mensaje de éxito
        $marca = strtoupper($marca);
        $nombre = strtoupper($nombre);
        $imagen = strtoupper($imagen);
        $establo_pertenece = strtoupper($establo_pertenece);
        $alimento_preferido = strtoupper($alimento_preferido);
        $fecha_nacimiento = strtoupper($fecha_nacimiento);

        // A cada variable se le eliminan los espacios sobrantes.
        $marca = trim($marca);
        $nombre = trim($nombre);
        $imagen = trim($imagen);
        $establo_pertenece = trim($establo_pertenece);
        $alimento_preferido = trim($alimento_preferido);
        $fecha_nacimiento = trim($fecha_nacimiento);

        $sql = "INSERT INTO ganado (marca, nombre, imagen, establo_pertenece, alimento_preferido, fecha_nacimiento)
      VALUES ('$marca', '$nombre', $imagen, '$establo_pertenece', '$alimento_preferido', '$fecha_nacimiento');";

        if (mysqli_query($conexion, $sql)) {
            echo "Se ha registrado el ganado";
        } else {
            echo "No se pudo registrar el ganado";
        }
    } else {
        // Mostrar un mensaje de error
        echo "Algunos de los datos proporcionados no son válidos. Por favor, inténtalo de nuevo.";
    }

} else {
    echo "No se pudo conectar a la base de datos";
}

header("Location: ../mantenimiento/ganado.php");
?>