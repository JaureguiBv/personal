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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body>
    <?php include_once 'nav.php'; ?>

    <main>
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="card border-0 shadow-lg" style="background-color: #2b2d42; width: 30rem;">
            <div class="card-body">
                <h1 class="card-title text-center text-light mb-4">Editar Alumno</h1>
                <form action="update_process.php" method="POST">
                    <!-- ID oculto -->
                    <input type="hidden" name="id" value="<?php echo $alumno['id_estudiante']; ?>">

                    <!-- Nombre -->
                    <div class="mb-3">
                        <label for="nombre" class="form-label text-light">Nombre:</label>
                        <input type="text" name="nombre" class="form-control" value="<?php echo $alumno['nombre']; ?>" required>
                    </div>

                    <!-- Género -->
                    <div class="mb-3">
                        <label for="genero" class="form-label text-light">Género:</label>
                        <input type="text" name="genero" class="form-control" value="<?php echo $alumno['genero']; ?>" required>
                    </div>

                    <!-- Selección de carrera -->
                    <div class="mb-3">
                        <label for="carrera" class="form-label text-light">Carrera:</label>
                        <select name="carrera_id" id="carrera" class="form-select text-light bg-secondary" required>
                            <?php while ($fila = $carreras->fetch_assoc()) { ?>
                                <option value="<?php echo $fila['id_carrera']; ?>" 
                                    <?php echo $fila['id_carrera'] == $alumno['carrera_id'] ? 'selected' : ''; ?>>
                                    <?php echo $fila['nombre']; ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>

                    <!-- Botón de envío -->
                    <button type="submit" class="btn btn-primary w-100" style="background-color: #7b2cbf; border: none;">
                        Guardar Cambios
                    </button>
                </form>
            </div>
        </div>
    </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>

</html>