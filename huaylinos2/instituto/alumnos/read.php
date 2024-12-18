<?php
include '../db.php';
$sql = "SELECT estudiante.id_estudiante, estudiante.nombre, estudiante.genero, Carrera.nombre AS nombre_carrera 
FROM estudiante 
JOIN Carrera 
ON estudiante.carrera_id = Carrera.id_carrera;";


$result = $CONEXION->query($sql);
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Alumnos</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body>
    <?php include_once 'nav.php'; ?>
    <main>
        <div class="container py-5">
            <h1 class="text-center mb-4">Lista de Alumnos</h1>
            <div class="table-responsive">
                <table class="table table-dark table-striped table-bordered align-middle">
                    <thead class="table-primary text-dark">
                        <tr>
                            <th>Matrícula</th>
                            <th>Nombre</th>
                            <th>Edad</th>
                            <th>Carrera</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($fila = $result->fetch_assoc()) { ?>
                            <tr>
                                <td><?php echo $fila['id_estudiante']; ?></td>
                                <td><?php echo $fila['nombre']; ?></td>
                                <td><?php echo $fila['genero']; ?></td>
                                <td><?php echo $fila['nombre_carrera']; ?></td>
                                <td>
                                    <a href="update.php?id=<?php echo $fila['id_estudiante']; ?>" class="btn btn-warning btn-sm">Editar</a>
                                    <a href="delete_process.php?id=<?php echo $fila['id_estudiante']; ?>" class="btn btn-danger btn-sm">Eliminar</a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>

</html>