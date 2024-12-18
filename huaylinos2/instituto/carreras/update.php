<?php
include '../db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Obtenemos los datos de la carrera a editar
    $sql = "SELECT * FROM Carrera WHERE id_carrera = ?";
    $stmt = $CONEXION->prepare($sql);
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $resultado = $stmt->get_result();
    $carrera = $resultado->fetch_assoc();
    
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $nombre = $_POST['nombre'];

        // Actualizamos la carrera
        $sql = "UPDATE Carrera SET nombre = ? WHERE id_carrera = ?";
        $stmt = $CONEXION->prepare($sql);
        $stmt->bind_param('si', $nombre, $id);  // 'si' para indicar string e integer
        $stmt->execute();

        header('Location: read.php');  // Redirigimos a la lista de carreras
    }
} else {
    header('Location: read.php');  // Si no se pasa un id, redirigimos a la lista de carreras
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Carrera</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body>
<?php include_once 'nav.php'; ?>
    <main>
    <div class="container py-5">
        <h2 class="text-center mb-4">Actualizar Carrera</h2>

        <!-- Formulario de actualización -->
        <form action="update.php?id=<?php echo $carrera['id_carrera']; ?>" method="POST">
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre:</label>
                <input type="text" name="nombre" id="nombre" class="form-control" value="<?php echo $carrera['nombre']; ?>" required>
            </div>

            <button type="submit" class="btn btn-primary">Actualizar Carrera</button>
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
