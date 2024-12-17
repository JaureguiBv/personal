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
</head>
<body>
    <header>
        <h1>Editar Materia</h1>
    </header>

    <main>
        <section>
            <form action="update.php?id=<?php echo $materia['id_materia']; ?>" method="POST">
                <label for="nombre">Nombre:</label>
                <input type="text" name="nombre" id="nombre" value="<?php echo $materia['nombre']; ?>" required><br>

                <label for="creditos">Créditos:</label>
                <input type="number" name="creditos" id="creditos" value="<?php echo $materia['creditos']; ?>" required><br>

                <button type="submit">Actualizar Materia</button>
            </form>
        </section>
    </main>

    <footer>
        <p>&copy; 2024 Sistema de Gestión de Materias</p>
    </footer>
</body>
</html>
