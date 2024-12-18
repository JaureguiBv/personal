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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body>
<?php include_once 'nav.php'; ?>

    <main>
    <div class="container py-5">
        <h2 class="text-center mb-4">Agregar Nueva Carrera</h2>

        <!-- Formulario para agregar carrera -->
        <form action="create.php" method="POST">
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre:</label>
                <input type="text" name="nombre" id="nombre" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-success">Agregar Carrera</button>
            <a href="index.php" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
    </main>

    <footer>
        <p>&copy; 2024 Sistema de Gestión de Carreras</p>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>
