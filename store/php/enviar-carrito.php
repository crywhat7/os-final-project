<?php
@include("../../php/conexion.php");

if ($conexion) {
    // Obtener los datos del formulario
    $sqlInsertarFactura = $_POST['sql_insertar_factura'];
    $sqlInsertarVentas = $_POST['sql_insertar_ventas'];

    // Inicio de la transacción
    mysqli_begin_transaction($conexion);

    // Insertar la nueva factura y obtener su código
    mysqli_query($conexion, $sqlInsertarFactura);
    $codigo_factura = mysqli_insert_id($conexion);

    // Reemplazar todos los ::codigo_factura por el código de la factura
    $sqlInsertarVentas = str_replace("::codigo_factura", $codigo_factura, $sqlInsertarVentas);

    // Insertar las ventas asociadas a la factura
    mysqli_query($conexion, $sqlInsertarVentas);

    // Calcular el subtotal, impuesto y total
    $resultado = mysqli_query($conexion, "SELECT SUM(total) FROM ventas WHERE codigo_factura = $codigo_factura");
    $subtotal = mysqli_fetch_row($resultado)[0];
    $impuesto = $subtotal * 0.1;
    $total = $subtotal + $impuesto;

    // Actualizar el total y subtotal de la factura
    mysqli_query($conexion, "UPDATE facturas SET subtotal = $subtotal, impuesto = $impuesto, total = $total WHERE codigo_factura = $codigo_factura");

    // Confirmar la transacción
    mysqli_commit($conexion);

    // Cerrar la conexión
    mysqli_close($conexion);

    // Mostrar un mensaje de éxito
    echo "Se ha registrado la factura";
    header("Location: ../thank-you.html");
} else {
    echo "No se pudo conectar a la base de datos";
}
?>