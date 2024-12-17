<?php
include '../db.php';

// Obtener el ID del estudiante
$id = $_GET['id'];

// Obtener datos del estudiante
$sql = "SELECT * FROM estudiante WHERE id_estudiante = $id";
$result = $CONEXION->query($sql);
if (!$result || $result->num_rows == 0) {
    die("Estudiante no encontrado.");
}
$alumno = $result->fetch_assoc();

// Obtener la lista de carreras
$sql_carreras = "SELECT id_carrera, nombre FROM Carrera";
$carreras = $CONEXION->query($sql_carreras);
if (!$carreras) {
    die("Error al obtener las carreras: " . $CONEXION->error);
}
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Alumno</title>
</head>
<body>
    <h1>Editar Alumno</h1>
    <form action="update_process.php" method="POST">
        <!-- ID oculto para el proceso de actualización -->
        <input type="hidden" name="id" value="<?php echo $alumno['id_estudiante']; ?>">
        
        <!-- Nombre -->
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" value="<?php echo $alumno['nombre']; ?>" required><br>
        
        <!-- Género -->
        <label for="genero">Género:</label>
        <input type="text" name="genero" value="<?php echo $alumno['genero']; ?>" required><br>
        
        <!-- Selección de carrera -->
        <label for="carrera">Carrera:</label>
        <select name="carrera_id" id="carrera" required>
            <?php while ($fila = $carreras->fetch_assoc()) { ?>
                <option value="<?php echo $fila['id_carrera']; ?>" 
                    <?php echo $fila['id_carrera'] == $alumno['carrera_id'] ? 'selected' : ''; ?>>
                    <?php echo $fila['nombre']; ?>
                </option>
            <?php } ?>
        </select><br>
        
        <!-- Botón de envío -->
        <button type="submit">Guardar Cambios</button>
    </form>
</body>
</html>

