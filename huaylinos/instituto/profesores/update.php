<?php
include '../db.php';

$clave_profesor = $_GET['clave'];  // Recibimos la clave del profesor
$sql = "SELECT * FROM docente WHERE id_docente = $clave_profesor";
$result = $CONEXION->query($sql);
$profesor = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Profesor</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Editar Profesor</h1>
    </header>

    <main>
        <section>
            <h2>Formulario de Edición</h2>
            <form action="update_process.php" method="POST">
                <input type="hidden" name="clave" value="<?php echo $profesor['id_docente']; ?>"><br>

                <label for="nombre">Nombre:</label>
                <input type="text" name="nombre" value="<?php echo $profesor['nombre']; ?>" required><br>

                <label for="direccion">Edad:</label>
                <input type="text" name="edad" value="<?php echo $profesor['edad']; ?>" required><br>

                <label for="telefono">Genero:</label>
                <input type="text" name="genero" value="<?php echo $profesor['genero']; ?>" required><br>

                

                <button type="submit">Guardar Cambios</button>
            </form>
        </section>
    </main>

    <footer>
        <p>&copy; 2024 Sistema de Gestión de Profesores</p>
    </footer>
</body>
</html>
