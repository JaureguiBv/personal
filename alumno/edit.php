<?php
include 'config.php';
$id = $_GET['id'];
$stmt = $conn->prepare("SELECT * FROM persona WHERE id = ?");
$stmt->execute([$id]);
$persona = $stmt->fetch();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $_POST['nombre'];
    $edad = $_POST['edad'];

    $stmt = $conn->prepare("UPDATE persona SET nombre = ?, edad = ? WHERE id = ?");
    $stmt->execute([$nombre, $edad, $id]);

    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Persona</title>
</head>
<body>
    <h2>Editar Persona</h2>
    <form method="POST">
        <label>Nombre:</label><input type="text" name="nombre" value="<?php echo $persona['nombre']; ?>" required><br>
        <label>Edad:</label><input type="number" name="edad" value="<?php echo $persona['edad']; ?>" required><br>
        <button type="submit">Actualizar</button>
    </form>
</body>
</html>
