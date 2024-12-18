<?php
include 'db.php';

// Obtener los soldados
$sql = "SELECT s.Codigo_Soldado, s.Nombre, s.Apellidos, s.Grado, c.Denominacion AS Cuerpo, 
        co.Actividad_Principal AS Compania, cu.Nombre AS Cuartel 
        FROM Soldado s
        JOIN Cuerpo c ON s.Codigo_Cuerpo = c.Codigo_Cuerpo
        JOIN Compania co ON s.Numero_Compania = co.Numero_Compania
        JOIN Cuartel cu ON s.Codigo_Cuartel = cu.Codigo_Cuartel";

$stmt = $conn->query($sql);
$soldados = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Soldados</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="index.css">
</head>
<body>
    <header>
        <?php require_once 'nav.php'; ?>
    </header>
<table border="1">
    <thead>
        <tr>
            <th>Codigo</th>
            <th>Nombre</th>
            <th>Apellidos</th>
            <th>Grado</th>
            <th>Cuerpo</th>
            <th>Compañía</th>
            <th>Cuartel</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($soldados as $soldado) { ?>
            <tr>
                <td><?= $soldado['Codigo_Soldado'] ?></td>
                <td><?= $soldado['Nombre'] ?></td>
                <td><?= $soldado['Apellidos'] ?></td>
                <td><?= $soldado['Grado'] ?></td>
                <td><?= $soldado['Cuerpo'] ?></td>
                <td><?= $soldado['Compania'] ?></td>
                <td><?= $soldado['Cuartel'] ?></td>
                <td>
                    <a href="editar_soldado.php?codigo=<?= $soldado['Codigo_Soldado'] ?>">Editar</a> |
                    <a href="eliminar_soldado.php?codigo=<?= $soldado['Codigo_Soldado'] ?>" onclick="return confirm('¿Estás seguro de que deseas eliminar este soldado?')">Eliminar</a>
                </td>
            </tr>

        <?php } ?>
    </tbody>
</table>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>