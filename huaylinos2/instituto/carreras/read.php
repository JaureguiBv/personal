<?php
include '../db.php';
$sql = "SELECT * FROM Carrera";
$result = $CONEXION->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Carreras</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body>
    <?php include_once 'nav.php'; ?>

    <main>
    <div class="container py-5">
        <h2 class="text-center mb-4">Carreras Registradas</h2>
        
        <!-- Enlace para agregar nueva carrera -->
        <div class="text-end mb-3">
            <a href="create.php" class="btn btn-success">Agregar Nueva Carrera</a>
        </div>
        
        <!-- Tabla de carreras -->
        <table class="table table-bordered table-striped table-hover">
            <thead class="table-dark">
                <tr>
                    <th>Nombre</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($fila = $result->fetch_assoc()) { ?>
                    <tr>
                        <td><?php echo $fila['nombre']; ?></td>
                        <td>
                            <a href="update.php?id=<?php echo $fila['id_carrera']; ?>" class="btn btn-warning btn-sm">Editar</a>
                            <a href="delete.php?id=<?php echo $fila['id_carrera']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar esta carrera?')">Eliminar</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    </main>

    <footer>
        <p>&copy; 2024 Sistema de Gestión de Carreras</p>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>
