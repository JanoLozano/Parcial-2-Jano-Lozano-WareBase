<?php
session_start();

// Destruir todas las variables de sesion
session_unset();

// Destruir la sesion
session_destroy();

// Redirigir a la pagina de inicio
header("Location: index.php");
header("Location: tienda.php");
header("Location: contacto.php");
exit();

?>
