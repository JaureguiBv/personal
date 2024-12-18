<?php
include '../db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Obtenemos los datos de la materia a editar
    $sql = "SELECT * FROM Materia WHERE id_materia = ?";
    $stmt = $CONEXION->prepare($sql);
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $resultado = $stmt->get_result();
    $materia = $resultado->fetch_assoc();
    
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $nombre = $_POST['nombre'];
        $creditos = $_POST['creditos'];

        // Actualizamos la materia
        $sql = "UPDATE Materia SET nombre = ?, creditos = ? WHERE id_materia = ?";
        $stmt = $CONEXION->prepare($sql);
        $stmt->bind_param('sii', $nombre, $creditos, $id);
        $stmt->execute();

        header('Location: read.php');
    }
} else {
    header('Location: index.php');
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Materia</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body>
<?php include_once 'nav.php'; ?>

    <main>
    <div class="container py-5">
        <h2 class="text-center mb-4">Actualizar Materia</h2>
        
        <form action="update.php?id=<?php echo $materia['id_materia']; ?>" method="POST" class="shadow-lg p-4 rounded bg-secondary">
            <!-- Nombre -->
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre:</label>
                <input type="text" name="nombre" id="nombre" class="form-control" value="<?php echo $materia['nombre']; ?>" required>
            </div>

            <!-- Créditos -->
            <div class="mb-3">
                <label for="creditos" class="form-label">Créditos:</label>
                <input type="number" name="creditos" id="creditos" class="form-control" value="<?php echo $materia['creditos']; ?>" required>
            </div>

            <!-- Botón de Envío -->
            <button type="submit" class="btn btn-primary w-100" style="background-color: #7b2cbf; border: none;">
                Actualizar Materia
            </button>
        </form>
    </div>
    </main>

    <footer>
        <p>&copy; 2024 Sistema de Gestión de Materias</p>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>
