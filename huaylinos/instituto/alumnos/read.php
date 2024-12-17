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
</head>
<body>
    <h1>Lista de Alumnos</h1>
    <table border="1">
        <tr>
            <th>Matrícula</th>
            <th>Nombre</th>
            <th>Edad</th>
            <th>Carrera</th>
            <th>Acciones</th>
        </tr>
        <?php while ($fila = $result->fetch_assoc()) { ?>
        <tr>
            <td><?php echo $fila['id_estudiante']; ?></td>
            <td><?php echo $fila['nombre']; ?></td>
            <td><?php echo $fila['genero']; ?></td>
            <td><?php echo $fila['nombre_carrera']; ?></td>
            <td>
                <a href="update.php?id=<?php echo $fila['id_estudiante']; ?>">Editar</a>
                <a href="delete_process.php?id=<?php echo $fila['id_estudiante']; ?>">Eliminar</a>
            </td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>
