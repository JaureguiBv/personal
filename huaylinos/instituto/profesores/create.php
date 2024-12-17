<?php include '../db.php'; ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Profesor</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Crear Profesor</h1>
    </header>

    <main>
        <section>
            <h2>Formulario para Crear Profesor</h2>
            <form action="create_process.php" method="POST">
                <label for="nombre">Nombre:</label>
                <input type="text" name="nombre" required><br>

                <label for="direccion">Edad:</label>
                <input type="text" name="edad" required><br>

                <label for="telefono">Genero:</label>
                <input type="text" name="genero" required><br>

                
                <button type="submit">Guardar</button>
            </form>
        </section>
    </main>

    <footer>
        <p>&copy; 2024 Sistema de Gestión de Profesores</p>
    </footer>
</body>
</html>
