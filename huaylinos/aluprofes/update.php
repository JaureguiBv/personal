<?php
include 'db.php';

$id = $_GET['id'];
$sql = "SELECT * FROM docentes WHERE id_docente = $id";
$result = $conn->query($sql);
$docente = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $_POST['nombre'];
    $edad = $_POST['edad'];
    $genero = $_POST['genero'];

    $sql = "UPDATE docentes SET nombre_docente = '$nombre', edad = $edad, genero = '$genero' WHERE id_docente = $id";
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
    <title>Actualizar Docente</title>
</head>
<body>
    <h1>Actualizar Docente</h1>
    <form method="POST">
        <label>Nombre:</label>
        <input type="text" name="nombre" value="<?= $docente['nombre_docente'] ?>" required>
        <label>Edad:</label>
        <input type="number" name="edad" value="<?= $docente['edad'] ?>" required>
        <label>Género:</label>
        <select name="genero" required>
            <option value="M" <?= $docente['genero'] == 'M' ? 'selected' : '' ?>>Masculino</option>
            <option value="F" <?= $docente['genero'] == 'F' ? 'selected' : '' ?>>Femenino</option>
        </select>
        <button type="submit">Guardar Cambios</button>
    </form>
    <a href="read.php">Volver a la Lista</a>
</body>
</html>
