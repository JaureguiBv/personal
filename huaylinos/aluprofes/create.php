<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $_POST['nombre'];
    $edad = $_POST['edad'];
    $genero = $_POST['genero'];

    $sql = "INSERT INTO docentes (nombre_docente, edad, genero) VALUES ('$nombre', $edad, '$genero')";
    if ($conn->query($sql) === TRUE) {
        header("Location: read.php");
        exit;
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="styles.css">
    <title>Crear Docente</title>
</head>
<body>
    <h1>Agregar Nuevo Docente</h1>
    <form method="POST">
        <label>Nombre:</label>
        <input type="text" name="nombre" required>
        <label>Edad:</label>
        <input type="number" name="edad" required>
        <label>Género:</label>
        <select name="genero" required>
            <option value="M">Masculino</option>
            <option value="F">Femenino</option>
        </select>
        <button type="submit">Guardar</button>
    </form>
    <a href="read.php">Volver a la Lista</a>
</body>
</html>
