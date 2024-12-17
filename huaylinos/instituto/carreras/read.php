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
</head>
<body>
    <header>
        <h1>Lista de Carreras</h1>
    </header>

    <main>
        <section>
            <h2>Carreras Registradas</h2>
            <a href="create.php">Agregar Nueva Carrera</a>
            <table>
                <tr>
                    <th>Nombre</th>
                    <th>Acciones</th>
                </tr>
                <?php while ($fila = $result->fetch_assoc()) { ?>
                    <tr>
                        <td><?php echo $fila['nombre']; ?></td>
                        <td>
                            <a href="update.php?id=<?php echo $fila['id_carrera']; ?>">Editar</a>
                            <a href="delete.php?id=<?php echo $fila['id_carrera']; ?>">Eliminar</a>
                        </td>
                    </tr>
                <?php } ?>
            </table>
        </section>
    </main>

    <footer>
        <p>&copy; 2024 Sistema de Gestión de Carreras</p>
    </footer>
</body>
</html>
