<?php
session_start();
include 'config.php';

if (!isset($_SESSION['carrito'])) {
    $_SESSION['carrito'] = [];
}

$producto_id = $_GET['id']; // Obtener el ID del producto desde la URL

// Consultar la base de datos para obtener informacion del producto
$sql_producto = "SELECT * FROM productos WHERE id = $producto_id";
$result_producto = $conn->query($sql_producto);

if ($result_producto->num_rows > 0) {
    $row_producto = $result_producto->fetch_assoc();

    $precio = $row_producto['precio'];
    $cantidad = 1;
    $session_id = session_id();

    // Verificar si el producto ya esta en el carrito
    $sql_existencia = "SELECT * FROM items_carrito WHERE producto_id = $producto_id AND session_id = '$session_id'";
    $result_existencia = $conn->query($sql_existencia);

    if ($result_existencia->num_rows > 0) {
        // Actualizar la cantidad si el producto ya esta en el carrito
        $sql_actualizar = "UPDATE items_carrito SET cantidad = cantidad + 1 WHERE producto_id = $producto_id AND session_id = '$session_id'";
        if ($conn->query($sql_actualizar) === TRUE) {
            echo "Producto actualizado en el carrito.";
        } else {
            echo "Error al actualizar producto: " . $conn->error;
        }
    } else {
        // Insertar el producto en el carrito si no esta presente
        $sql_insertar = "INSERT INTO items_carrito (producto_id, cantidad, session_id) VALUES ($producto_id, $cantidad, '$session_id')";
        if ($conn->query($sql_insertar) === TRUE) {
            echo "Producto añadido al carrito.";
        } else {
            echo "Error al añadir producto: " . $conn->error;
        }
    }
} else {
    echo "Producto no encontrado.";
}

$conn->close();

// Redireccionar de vuelta a la pagina de tienda después de añadir el producto
header("Location: tienda.php");
exit();
require_once('footer.php');
?>
