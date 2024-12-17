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
</head>
<body>
    <header>
        <h1>Lista de Materias</h1>
    </header>

    <main>
        <section>
            <h2>Materias Registradas</h2>
            <a href="create.php">Agregar Nueva Materia</a>
            <table>
                <tr>
                    <th>Nombre</th>
                    <th>Créditos</th>
                    <th>Acciones</th>
                </tr>
                <?php while ($fila = $result->fetch_assoc()) { ?>
                    <tr>
                        <td><?php echo $fila['nombre']; ?></td>
                        <td><?php echo $fila['creditos']; ?></td>
                        <td>
                            <a href="update.php?id=<?php echo $fila['id_materia']; ?>">Editar</a>
                            <a href="delete_process.php?id=<?php echo $fila['id_materia']; ?>">Eliminar</a>
                        </td>
                    </tr>
                <?php } ?>
            </table>
        </section>
    </main>

    <footer>
        <p>&copy; 2024 Sistema de Gestión de Materias</p>
    </footer>
</body>
</html>
