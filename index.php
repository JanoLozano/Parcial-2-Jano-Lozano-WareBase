<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>WareBase - Inicio</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-9Bf3bHn7QZ+1ffkR++lt+0Y3b7BgylWYceXBym9gsyHYI0eqHZ5S50U8xEMpB7uYxn6nqQwvR2UupF6HdJtCrA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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

        
        #carruselOfertas {
            margin-top: 50px;
        }

        
        .toggle-contenido {
            display: none;
        }

        .toggle-contenido + label {
            cursor: pointer;
            color: blue;
        }

        .contenido-oculto {
            display: none;
            margin-top: 10px;
        }

        .toggle-contenido:checked + label + .contenido-oculto {
            display: block;
        }

        
        .caracteristica {
            margin-top: 20px;
        }
        .carousel-caption {
            background-color: rgba(0, 0, 0, 0.5);
            padding: 10px;
            border-radius: 5px;
        }
        .border-img {
            border: 3px solid black;
        }
    </style>
</head>
<body>
<?php require_once('header.php')?>


<div class="container mt-4">
    <div class="row">
        <div class="col-12">
            <!-- Carrusel de ofertas-->
            <div id="carruselOfertas" class="carousel slide border-img" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carruselOfertas" data-slide-to="0" class="active"></li>
                    <li data-target="#carruselOfertas" data-slide-to="1"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="imagen1.jpg" class="d-block w-100 " alt="Oferta 1">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>¡¡Oferta Especial!!!</h5>
                            <p>Oferta única en nuestra tienda. Celular Samsung con auriculares inalámbricos al 40% de descuento</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="imagen2.jpg" class="d-block w-100" alt="Oferta 2">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>¡¡Oferta Especial!!!</h5>
                            <p>Combo: Celular LG M52 5G, Reloj Lg, Monitor LG, Notebook Lenovo y Auriculares Redragon. ¡Todo a un increíble 40% de descuento!</p>
                        </div>
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carruselOfertas" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Anterior</span>
                </a>
                <a class="carousel-control-next" href="#carruselOfertas" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Siguiente</span>
                </a>
            </div>
        </div>
    </div>
    
    <div class="row mt-4">
        <div class="col-12">
            <!-- Ultimas noticias -->
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Últimas Noticias</h5>
                    <p class="card-text">Amd y su nuevo microprocesador</p>
                    <input type="checkbox" id="toggleNoticias" class="toggle-contenido">
                    <label for="toggleNoticias">Ver Más</label>
                    <div class="contenido-oculto">
                        <p>El Ryzen 9 9950X cuenta con 16 núcleos y 32 hilos, alcanzando una velocidad de reloj de hasta 5.7 GHz, mientras que 
                            el Ryzen 9 9900X tiene 12 núcleos y 24 hilos, con una velocidad de reloj de hasta 5.6 GHz</p>
                    </div>
                </div>
            </div>
            <div class="card mt-3">
                <div class="card-body">
                    <h5 class="card-title">Últimas Noticias</h5>
                    <p class="card-text">Intel y su microprocesadores cada vez destacan</p>
                    <input type="checkbox" id="toggleOferta" class="toggle-contenido">
                    <label for="toggleOferta">Ver Más</label>
                    <div class="contenido-oculto">
                        <p>Del Intel Core Ultra, también conocido como "Meteor Lake". Este procesador introduce varias innovaciones significativas en la arquitectura de las 
                            CPU de Intel. Utiliza la litografía Intel 4 y organiza su lógica en bloques funcionales denominados "tiles"</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Por que elegirnos -->
    <div class="elegirnos mt-5">
        <div class="container">
            <h2>¿Por qué elegirnos?</h2>
            <div class="row">
                <div class="col-md-4 caracteristica">
                    <h5>Variedad de Productos</h5>
                    <p>Ofrecemos una amplia gama de productos para satisfacer todas tus necesidades tecnológicas.</p>
                </div>
                <div class="col-md-4 caracteristica">
                    <h5>Precios Competitivos</h5>
                    <p>Garantizamos precios justos y ofertas exclusivas para que siempre obtengas el mejor valor.</p>
                </div>
                <div class="col-md-4 caracteristica">
                    <h5>Atención al Cliente</h5>
                    <p>Nuestro equipo de atención al cliente está disponible para ayudarte en todo momento.</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 caracteristica">
                    <h5>Envíos Rápidos</h5>
                    <p>Nos aseguramos de que recibas tus productos en el menor tiempo posible.</p>
                </div>
                <div class="col-md-4 caracteristica">
                    <h5>Calidad Garantizada</h5>
                    <p>Todos nuestros productos son de alta calidad y vienen con garantía.</p>
                </div>
                <div class="col-md-4 caracteristica">
                    <h5>Compras Seguras</h5>
                    <p>Tu seguridad es nuestra prioridad, por lo que implementamos las mejores prácticas de seguridad online.</p>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<?php include ('footer.php')?>
</body>
</html>
