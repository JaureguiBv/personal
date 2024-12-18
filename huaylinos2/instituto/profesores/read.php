<?php
include '../db.php';
$sql = "SELECT * FROM docente";
$result = $CONEXION->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Profesores</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body>
    <?php include_once 'nav.php'; ?>

    <main>
    <div class="container py-5">
            <h2 class=" text-center text-dark pb-5">Profesores Registrados</h2>
            
        <div class="table-responsive">
            <table class="table table-dark table-hover table-bordered align-middle">
                <thead>
                    <tr class="text-center">
                        <th>Nombre</th>
                        <th>Edad</th>
                        <th>Género</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($fila = $result->fetch_assoc()) { ?>
                        <tr>
                            <td><?php echo $fila['nombre']; ?></td>
                            <td class="text-center"><?php echo $fila['edad']; ?></td>
                            <td class="text-center"><?php echo $fila['genero']; ?></td>
                            <td class="text-center">
                                <a href="update.php?clave=<?php echo $fila['id_docente']; ?>" 
                                   class="btn btn-warning btn-sm me-2">Editar</a>
                                <a href="delete_process.php?clave=<?php echo $fila['id_docente']; ?>" 
                                   class="btn btn-danger btn-sm">Eliminar</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
    </main>

    <footer>
        <p>&copy; 2024 Sistema de Gestión de Profesores</p>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>
