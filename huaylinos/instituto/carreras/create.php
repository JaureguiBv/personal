<?php
include '../db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $_POST['nombre'];

    // Insertamos la nueva carrera
    $sql = "INSERT INTO Carrera (nombre) VALUES (?)";
    $stmt = $CONEXION->prepare($sql);

    // Asegúrate de especificar el tipo de dato: 's' para string
    $stmt->bind_param('s', $nombre);  // 's' es para indicar que el parámetro es un string
    $stmt->execute();

    // Redirigimos a la página de listado después de la inserción
    header('Location: read.php');
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Carrera</title>
</head>
<body>
    <header>
        <h1>Agregar Nueva Carrera</h1>
    </header>

    <main>
        <section>
            <form action="create.php" method="POST">
                <label for="nombre">Nombre:</label>
                <input type="text" name="nombre" id="nombre" required><br>

                <button type="submit">Agregar Carrera</button>
            </form>
        </section>
    </main>

    <footer>
        <p>&copy; 2024 Sistema de Gestión de Carreras</p>
    </footer>
</body>
</html>
