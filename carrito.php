<?php
include 'config.php';
session_start();
$session_id = session_id();

// Funcion para eliminar un producto del carrito
if (isset($_GET['eliminar']) && !empty($_GET['eliminar'])) {
    $item_id = $_GET['eliminar'];
    // Preparar la consulta DELETE
    $sql_delete = "DELETE FROM items_carrito WHERE id = ? AND session_id = ?";
    
    $stmt_delete = $conn->prepare($sql_delete);
    $stmt_delete->bind_param("is", $item_id, $session_id);
    
    if ($stmt_delete->execute()) {
        
    } else {
        echo "Error al eliminar el producto: " . $stmt_delete->error;
    }
    
    $stmt_delete->close();
}


if (isset($_GET['restar']) && !empty($_GET['restar'])) {
    $item_id = $_GET['restar'];
    // Preparar la consulta UPDATE con parametros seguros
    $sql_update = "UPDATE items_carrito SET cantidad = cantidad - 1 WHERE id = ? AND session_id = ? AND cantidad > 1";
    
    $stmt_update = $conn->prepare($sql_update);
    $stmt_update->bind_param("is", $item_id, $session_id);
    
    if ($stmt_update->execute()) {
        
    } else {
        echo "Error al restar el producto: " . $stmt_update->error;
    }
    
    $stmt_update->close();
}


$sql = "SELECT items_carrito.id, productos.nombre, productos.precio, items_carrito.cantidad 
        FROM items_carrito 
        JOIN productos ON items_carrito.producto_id = productos.id 
        WHERE items_carrito.session_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $session_id);
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Carrito de Compras</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1 class="mt-4 mb-3">Carrito de Compras</h1>
        <div class="table-responsive-sm">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Producto</th>
                        <th>Precio</th>
                        <th>Cantidad</th>
                        <th>Total</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($result && $result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row['nombre'] . "</td>";
                            echo "<td>$" . $row['precio'] . "</td>";
                            echo "<td>" . $row['cantidad'] . "</td>";
                            echo "<td>$" . ($row['precio'] * $row['cantidad']) . "</td>";
                            echo "<td>";
                            echo "<a href='carrito.php?eliminar=" . $row['id'] . "' class='btn btn-danger btn-sm'><i class='fas fa-trash-alt'></i></a> ";
                            echo "<a href='carrito.php?restar=" . $row['id'] . "' class='btn btn-warning btn-sm'><i class='fas fa-minus'></i></a>";
                            echo "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='5'>No hay productos en el carrito.</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
        <a href="tienda.php" class="btn btn-secondary">Seguir Comprando</a>
    </div>
</body>
</html>
<?php require_once('footer.php');?>