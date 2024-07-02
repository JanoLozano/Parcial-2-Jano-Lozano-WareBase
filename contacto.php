<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WareBase - Contacto</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
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
    </style>
</head>
<body>
<?php require_once('header.php'); ?>

<div class="container mt-5">
    <h2>Contacto</h2>
    <form action="contacto.php" method="POST">
        <div class="form-group">
            <label for="nombre">Nombre:</label>
            <input type="text" class="form-control" id="nombre" name="nombre" required>
        </div>
        <div class="form-group">
            <label for="email">Correo Electrónico:</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="asunto">Asunto:</label>
            <input type="text" class="form-control" id="asunto" name="asunto" required>
        </div>
        <div class="form-group">
            <label for="mensaje">Mensaje:</label>
            <textarea class="form-control" id="mensaje" name="mensaje" rows="5" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>
</div>

<?php require_once('footer.php'); ?>
</body>
</html>
