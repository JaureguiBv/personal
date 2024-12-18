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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body>
    <?php include_once 'nav.php'; ?>


    <main>
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="card border-0 shadow-lg">
                    <div class="card-header text-center" style="background-color: #7b2cbf; color: #fff;">
                        <h2>Formulario de Edición</h2>
                    </div>
                    <div class="card-body bg-light">
                        <form action="update_process.php" method="POST">
                            <!-- Campo oculto para la clave -->
                            <input type="hidden" name="clave" value="<?php echo $profesor['id_docente']; ?>">

                            <!-- Nombre -->
                            <div class="mb-3">
                                <label for="nombre" class="form-label">Nombre:</label>
                                <input type="text" name="nombre" class="form-control" 
                                       value="<?php echo $profesor['nombre']; ?>" required>
                            </div>

                            <!-- Edad -->
                            <div class="mb-3">
                                <label for="edad" class="form-label">Edad:</label>
                                <input type="text" name="edad" class="form-control" 
                                       value="<?php echo $profesor['edad']; ?>" required>
                            </div>

                            <!-- Género -->
                            <div class="mb-3">
                                <label for="genero" class="form-label">Género:</label>
                                <input type="text" name="genero" class="form-control" 
                                       value="<?php echo $profesor['genero']; ?>" required>
                            </div>

                            <!-- Botón de Enviar -->
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary w-50" 
                                        style="background-color: #7b2cbf; border: none;">Guardar Cambios</button>
                            </div>
                        </form>
                    </div>
                </div>
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