<?php
@include("conexion.php");
/*
INSERT INTO clientes(nombre,apellido, fecha_nacimiento,fecha_registro,username,pass,email) VALUES ('Benito','Martinez','1982-03-22', CURRENT_DATE(),'badbunny','yeezy','badbunny@hotmail.com');
*/
if ($conexion) {
    // Obtener los datos del formulario
    $name = $_POST['name'];
    $lastname = $_POST['lastname'];
    $user = $_POST['user'];
    $email = $_POST['email'];
    $fech_nacimiento = $_POST['date'];
    $password = $_POST['password'];

    // Validar los datos recibidos
    if (!empty($name) && !empty($lastname) && !empty($user) && !empty($email) && !empty($fech_nacimiento) && !empty($password)) {
        // Mostrar un mensaje de éxito
        $name = strtoupper($name);
        $lastname = strtoupper($lastname);
        $user = strtoupper($user);
        $email = strtoupper($email);
        $fech_nacimiento = strtoupper($fech_nacimiento);
        $password = strtoupper($password);
        // A cada variable se le eliminan los espacios sobrantes.
        $name = trim($name);
        $lastname = trim($lastname);
        $user = trim($user);
        $email = trim($email);
        $fech_nacimiento = trim($fech_nacimiento);
        $password = trim($password);

        $sql = "INSERT INTO clientes(nombre,apellido, fecha_nacimiento,username,pass,email) VALUES ('$name','$lastname','$fech_nacimiento','$user','$password','$email');";

        if (mysqli_query($conexion, $sql)) {
            echo "Se ha registrado el cliente";
            header("Location: ../index.html");
        } else {
            echo "No se pudo registrar el cliente";
        }
    } else {
        // Mostrar un mensaje de error
        echo "Algunos de los datos proporcionados no son válidos. Por favor, inténtalo de nuevo.";
    }

} else {
    echo "No se pudo conectar a la base de datos";
}
?>