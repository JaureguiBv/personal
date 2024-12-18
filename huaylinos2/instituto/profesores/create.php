<?php include '../db.php'; ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Profesor</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body>
    <?php include_once 'nav.php'; ?>


    <main>
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="card border-0 shadow-lg" style="background-color: #2b2d42; width: 30rem;">
            <div class="card-body">
                <h2 class="card-title text-center text-light mb-4">Formulario para Crear Profesor</h2>
                <form action="create_process.php" method="POST">
                    <!-- Nombre -->
                    <div class="mb-3">
                        <label for="nombre" class="form-label text-light">Nombre:</label>
                        <input type="text" name="nombre" class="form-control" placeholder="Ingresa el nombre" required>
                    </div>

                    <!-- Edad -->
                    <div class="mb-3">
                        <label for="edad" class="form-label text-light">Edad:</label>
                        <input type="number" name="edad" class="form-control" placeholder="Ingresa la edad" required>
                    </div>

                    <!-- Género -->
                    <div class="mb-3">
                        <label for="genero" class="form-label text-light">Género:</label>
                        <select name="genero" class="form-select text-light bg-secondary" required>
                            <option value="" disabled selected>Selecciona el género</option>
                            <option value="Masculino">Masculino</option>
                            <option value="Femenino">Femenino</option>
                        </select>
                    </div>

                    <!-- Botón de envío -->
                    <button type="submit" class="btn btn-primary w-100" style="background-color: #7b2cbf; border: none;">
                        Guardar
                    </button>
                </form>
            </div>
        </div>
    </div>
    </main>

    <footer>
        <p>&copy; 2024 Sistema de Gestión de Profesores</p>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>
