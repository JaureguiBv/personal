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
</head>
<body>
    <header>
        <h1>Editar Carrera</h1>
    </header>

    <main>
        <section>
            <form action="update.php?id=<?php echo $carrera['id_carrera']; ?>" method="POST">
                <label for="nombre">Nombre:</label>
                <input type="text" name="nombre" id="nombre" value="<?php echo $carrera['nombre']; ?>" required><br>

                <button type="submit">Actualizar Carrera</button>
            </form>
        </section>
    </main>

    <footer>
        <p>&copy; 2024 Sistema de Gestión de Carreras</p>
    </footer>
</body>
</html>
