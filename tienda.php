<?php
include 'config.php';

session_start();

$sql = "SELECT * FROM productos";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Tienda</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <style>
         .navbar {
            border-bottom: 2px solid #dee2e6;
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
        .ver-carrito {
            position: absolute;
            top: 120px;
            right: 20px;
            z-index: 999;
        }

        .ver-carrito a {
            background-color: orange;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
        }


        .card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0px 10px 15px rgba(0, 0, 0, 0.1);
        }

        h1{
            text-align: center;
            padding-top: 30px; 
            padding-bottom: 30px;
            font-size: 2.5rem;
            letter-spacing: 2px;
        }
    </style>
</head>
<body>
    <?php include 'header.php'; ?>
    <div class="container">
        <h1>TIENDA</h1>
        <div class="row">
            <?php while($row = $result->fetch_assoc()): ?>
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $row['nombre']; ?></h5>
                            <p class="card-text"><?php echo $row['descripcion']; ?></p>
                            <p class="card-text">$<?php echo $row['precio']; ?></p>
                            <a href="añadir_carrito.php?id=<?php echo $row['id']; ?>" class="btn btn-primary">
                                <i class="fas fa-hand-pointer"></i> Añadir al carrito
                            </a>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    </div>
    <div class="ver-carrito">
        <a href="carrito.php">
            <i class="fas fa-shopping-cart"></i> Ver Carrito
        </a>
    </div>

</body>
</html>

<?php $conn->close(); 
require_once('footer.php');
?>
