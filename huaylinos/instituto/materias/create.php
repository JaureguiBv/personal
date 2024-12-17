<?php
include '../db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $_POST['nombre'];
    $creditos = $_POST['creditos'];

    // Insertamos la nueva materia
    $sql = "INSERT INTO Materia (nombre, creditos) VALUES (?, ?)";
    $stmt = $CONEXION->prepare($sql);
    $stmt->bind_param('si', $nombre, $creditos);
    $stmt->execute();

    header('Location: index.php');
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Materia</title>
</head>
<body>
    <header>
        <h1>Agregar Nueva Materia</h1>
    </header>

    <main>
        <section>
            <form action="create.php" method="POST">
                <label for="nombre">Nombre:</label>
                <input type="text" name="nombre" id="nombre" required><br>

                <label for="creditos">Créditos:</label>
                <input type="number" name="creditos" id="creditos" required><br>

                <button type="submit">Agregar Materia</button>
            </form>
        </section>
    </main>

    <footer>
        <p>&copy; 2024 Sistema de Gestión de Materias</p>
    </footer>
</body>
</html>
