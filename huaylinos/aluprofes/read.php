<?php
include 'db.php';

$sql = "SELECT * FROM docentes";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="styles.css">
    <title>Lista de Docentes</title>
</head>
<body>
    <h1>Lista de Docentes</h1>
    <a href="create.php">Agregar Nuevo Docente</a>
    <table>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Edad</th>
            <th>Género</th>
            <th>Acciones</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?= $row['id_docente'] ?></td>
            <td><?= $row['nombre_docente'] ?></td>
            <td><?= $row['edad'] ?></td>
            <td><?= $row['genero'] ?></td>
            <td>
                <a href="update.php?id=<?= $row['id_docente'] ?>">Editar</a>
                <a href="delete.php?id=<?= $row['id_docente'] ?>">Eliminar</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>
