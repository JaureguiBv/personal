<?php
include '../db.php';

// Consulta para obtener las carreras desde la base de datos
$sql = "SELECT * FROM Carrera";
$result = $CONEXION->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Alumno</title>
    <link rel="stylesheet" href="style.css">
    <script>
        // JavaScript para asegurar que solo se ingresen 3 dígitos en la matrícula
        function validarMatricula(input) {
            // Limitar el campo de matrícula a 3 dígitos
            if (input.value.length > 3) {
                input.value = input.value.slice(0, 3);
            }
        }
    </script>
</head>
<body>
    <h1>Crear Alumno</h1>
    <form action="create_process.php" method="POST">
        
        
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" required><br>

        <label for="edad">Edad:</label>
        <input type="number" name="genero" required><br>

        <label for="carrera">Carrera:</label>
        <select name="carrera" required>
            <option value="">Selecciona una carrera</option>
            <?php while ($row = $result->fetch_assoc()) { ?>
                <option value="<?php echo $row['id_carrera']; ?>"><?php echo $row['nombre']; ?></option>
            <?php } ?>
        </select><br>

        <button type="submit">Guardar</button>
    </form>
</body>
</html>
