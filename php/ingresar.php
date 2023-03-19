<?php

@include("../php/conexion.php");
$user = $_POST['user'];
$password = $_POST['password'];

$consulta = "SELECT * FROM clientes WHERE username='$user' and pass='$password'";
$resultado = mysqli_query($conexion, $consulta);


// Guardar el nombre, id, usuario en la sesión
if (mysqli_num_rows($resultado) > 0) {
    $fila = mysqli_fetch_assoc($resultado);
    $codigo = $fila['codigo_cliente'];
    $nombre = $fila['nombre'];
    $username = $fila['username'];
    $email = $fila['email'];
    echo "
        <script>
            const session = {
                codigo_cliente: {$codigo},
                nombre: '{$nombre}',
                username: '{$username}',
                email: '{$email}'
            }
            sessionStorage.setItem('data-user', JSON.stringify(session));
            window.setTimeout(function(){
                // alert('Bienvenido {$nombre}');
                window.location.href = '../store/';
            });
        </script>
    ";
    // header("Location: ../store/");
} else {
    echo "El usuario o la contraseña son incorrectos";
}
?>