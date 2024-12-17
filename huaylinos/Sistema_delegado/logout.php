<?php
session_start(); // Iniciar la sesión

// Destruir todas las variables de sesión
$_SESSION = array(); // Vaciar la sesión

// Destruir la sesión
session_destroy(); 

header("Location: index.php");
exit();
?>
