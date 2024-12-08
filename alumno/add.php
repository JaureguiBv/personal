<?php
include 'config.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $_POST['nombre'];
    $edad = $_POST['edad'];

    $stmt = $conn->prepare("INSERT INTO persona (nombre, edad) VALUES (?, ?)");
    $stmt->execute([$nombre, $edad]);

    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Añadir Persona</title>
</head>
<body>
    <h2>Añadir Persona</h2>
    <form method="POST">
        <label>Nombre:</label><input type="text" name="nombre" required><br>
        <label>Edad:</label><input type="number" name="edad" required><br>
        <button type="submit">Guardar</button>
    </form>
</body>
</html>
