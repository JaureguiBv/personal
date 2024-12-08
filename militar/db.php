<?php
$host = "localhost"; // o tu servidor de base de datos
$user = "root"; // tu usuario de MySQL
$pass = ""; // tu contraseña de MySQL
$dbname = "controlmilitar";

$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>
