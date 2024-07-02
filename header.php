<?php
// Iniciar la sesion solo si no esta iniciada
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>WareBase</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
        }
        .navbar {
            border-bottom: 2px solid #dee2e6;
            background-color: #fff;
        }
        .navbar-brand img {
            height: 80px;
        }
        .nav-link {
            color: #000;
            font-weight: 500;
        }
        .nav-item {
            margin-right: 15px;
        }
        .nav-link:hover {
            color: #0056b3;
        }
        .nav-link.active {
            color: #0056b3;
            font-weight: 700;
        }
        @media (min-width: 992px) {
            .nav-link {
                position: relative;
                text-decoration: none;
                color: inherit;
                padding-bottom: 5px;
            }
            .nav-link::after {
                content: '';
                position: absolute;
                bottom: 0;
                left: 50%;
                transform: translateX(-50%);
                width: 0;
                height: 1px;
                background-color: #000;
                transition: width 0.3s ease;
            }
            .nav-link:hover::after {
                width: calc(100% - 20px);
            }
        }
        @media (max-width: 991px) {
            .navbar-brand {
                margin: 0 auto;
                display: block;
                text-align: center;
            }
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light px-4">
    <a class="navbar-brand" href="index.php">
        <img src="WareBasev2.png" alt="WareBase">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav me-auto">
            <li class="nav-item">
                <a class="nav-link <?= (basename($_SERVER['PHP_SELF']) == 'index.php') ? 'active' : ''; ?>" href="index.php">Inicio</a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?= (basename($_SERVER['PHP_SELF']) == 'tienda.php') ? 'active' : ''; ?>" href="tienda.php">Tienda</a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?= (basename($_SERVER['PHP_SELF']) == 'contacto.php') ? 'active' : ''; ?>" href="contacto.php">Contacto</a>
            </li>
            <?php
            if (isset($_SESSION['id'])) {
                if ($_SESSION['role'] === 'admin') {
                    echo '<li class="nav-item">';
                    echo '<a class="nav-link" href="administrador.php">Administrar Productos</a>';
                    echo '</li>';
                }
                echo '<li class="nav-item">';
                echo '<a class="nav-link" href="logout.php">Salir</a>';
                echo '</li>';
            } else {
                echo '<li class="nav-item">';
                echo '<a class="nav-link" href="login.php">Iniciar sesión</a>';
                echo '</li>';
                echo '<li class="nav-item">';
                echo '<a class="nav-link" href="register.php">Registrarse</a>';
                echo '</li>';
            }
            ?>
        </ul>
    </div>
</nav>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>
