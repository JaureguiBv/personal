<?php
include '../db.php';
$sql = "SELECT * FROM Materia";
$result = $CONEXION->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Materias</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    
</head>
<body>
<?php include_once 'nav.php'; ?>

    <main>
    <div class="container py-5">
        <div class="row">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h2 class="text-light">Materias Registradas</h2>
                    <a href="create.php" class="btn btn-primary" style="background-color: #7b2cbf; border: none;">
                        Agregar Nueva Materia
                    </a>
                </div>

                <div class="table-responsive">
                    <table class="table table-dark table-striped table-bordered text-center">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Créditos</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($fila = $result->fetch_assoc()) { ?>
                                <tr>
                                    <td><?php echo $fila['nombre']; ?></td>
                                    <td><?php echo $fila['creditos']; ?></td>
                                    <td>
                                        <a href="update.php?id=<?php echo $fila['id_materia']; ?>" 
                                           class="btn btn-warning btn-sm">Editar</a>
                                        <a href="delete_process.php?id=<?php echo $fila['id_materia']; ?>" 
                                           class="btn btn-danger btn-sm">Eliminar</a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    </main>

    <footer>
        <p>&copy; 2024 Sistema de Gestión de Materias</p>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>
