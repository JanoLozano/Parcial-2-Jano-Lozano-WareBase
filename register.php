<?php
// Incluir el archivo de configuracion de la base de datos
include 'config.php';

// Inicializar variables para los mensajes de error y éxito
$error = '';
$success = '';

// Verificar si el formulario de registro fue enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Verificar si el correo electronico ya esta registrado
    $sql_verificar = "SELECT id FROM usuarios WHERE email = ?";
    $stmt_verificar = $conn->prepare($sql_verificar);
    $stmt_verificar->bind_param("s", $email);
    $stmt_verificar->execute();
    $stmt_verificar->store_result();

    if ($stmt_verificar->num_rows > 0) {
        $error = "El correo electrónico ya está registrado.";
    } else {
        // Hash de la contraseña antes de almacenarla en la base de datos
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Preparar la consulta para insertar el nuevo usuario
        $sql_insertar = "INSERT INTO usuarios (nombre, email, password) VALUES (?, ?, ?)";
        $stmt_insertar = $conn->prepare($sql_insertar);
        $stmt_insertar->bind_param("sss", $nombre, $email, $hashed_password);

        if ($stmt_insertar->execute()) {
            $success = "Registro exitoso. Ahora puedes iniciar sesión.";
        } else {
            $error = "Error al registrar el usuario: " . $stmt_insertar->error;
        }
    }

    // Cerrar las conexiones y liberar los recursos
    $stmt_verificar->close();
    $stmt_insertar->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro de Usuario</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1>Registro de Usuario</h1>
        <?php if (!empty($error)) : ?>
            <div class="alert alert-danger" role="alert"><?php echo $error; ?></div>
        <?php endif; ?>
        <?php if (!empty($success)) : ?>
            <div class="alert alert-success" role="alert"><?php echo $success; ?></div>
        <?php endif; ?>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <div class="form-group">
                <label for="nombre">Nombre completo:</label>
                <input type="text" class="form-control" id="nombre" name="nombre" required>
            </div>
            <div class="form-group">
                <label for="email">Correo electrónico:</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Contraseña:</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <button type="submit" class="btn btn-primary">Registrarse</button>
        </form>
        <p>¿Ya tienes una cuenta? <a href="login.php">Inicia sesión aquí</a>.</p>
    </div>
</body>
</html>
<?php require_once('footer.php');?>