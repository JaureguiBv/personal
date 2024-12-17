<?php
$CONEXION = new mysqli("localhost", "root", "", "universidad");

// Verificar conexión
if ($CONEXION->connect_error) {
    die("Error al conectar con la base de datos: " . $CONEXION->connect_error);
}
?>
