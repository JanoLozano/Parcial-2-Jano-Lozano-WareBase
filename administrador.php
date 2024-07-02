<?php
session_start();

// Verificar si el usuario esta logueado y es administrador
if (!isset($_SESSION['id']) || $_SESSION['role'] !== 'admin') {
    // Redirigir a una página de acceso no autorizado o a otra página adecuada
    header("Location: acceso_restringido.php");
    exit();
}

// Incluir el archivo de configuracion
include 'config.php';

// Logica para gestionar productos
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['action'])) {
    // Agregar un producto
    if ($_POST['action'] === 'agregar_producto') {
        // Procesar la logica para agregar un producto a la base de datos
        $nombre = $_POST['nombre'];
        $descripcion = $_POST['descripcion'];
        $precio = $_POST['precio'];

        //insercion en la base de datos
        $sql = "INSERT INTO productos (nombre, descripcion, precio) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sss", $nombre, $descripcion, $precio);
        $stmt->execute();
        $stmt->close();

        // Redirigir o mostrar mensajes de exito
        header("Location: administrador.php");
        exit();
    }
}

// Consulta para obtener todos los productos
$sql = "SELECT * FROM productos";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Panel de Administrador</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <?php include 'header.php'; ?>

    <div class="container mt-5">
        <h1>Panel de Administrador</h1>
        <h2>Gestión de Productos</h2>

        <!-- Formulario para agregar productos -->
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <div class="form-group">
                <label for="nombre">Nombre del Producto:</label>
                <input type="text" class="form-control" id="nombre" name="nombre" required>
            </div>
            <div class="form-group">
                <label for="descripcion">Descripción:</label>
                <textarea class="form-control" id="descripcion" name="descripcion" rows="3" required></textarea>
            </div>
            <div class="form-group">
                <label for="precio">Precio:</label>
                <input type="number" class="form-control" id="precio" name="precio" step="0.01" required>
            </div>
            <button type="submit" class="btn btn-primary" name="action" value="agregar_producto">Agregar Producto</button>
        </form>

        <hr>

        <!-- Mostrar lista de productos existentes -->
        <h3>Lista de Productos</h3>
        <div class="row">
            <?php while($row = $result->fetch_assoc()): ?>
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $row['nombre']; ?></h5>
                            <p class="card-text"><?php echo $row['descripcion']; ?></p>
                            <p class="card-text">$<?php echo $row['precio']; ?></p>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    </div>

    <?php include 'footer.php'; ?>
</body>
</html>

<?php $conn->close(); 
require_once('footer.php');
?>