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
</head>
<body>
    <header>
        <h1>Lista de Profesores</h1>
    </header>

    <main>
        <section>
            <h2>Profesores Registrados</h2>
            <a href="create.php">Agregar nuevo profesor</a>
            <table>
                <tr>
                    <th>Nombre</th>
                    <th>Edad</th>
                    <th>Genero</th>
                    
                    <th>Acciones</th>
                </tr>
                <?php while ($fila = $result->fetch_assoc()) { ?>
                    <tr>
                        <td><?php echo $fila['nombre']; ?></td>
                        <td><?php echo $fila['edad']; ?></td>
                        <td><?php echo $fila['genero']; ?></td>
                        
                        <td>
                            <a href="update.php?clave=<?php echo $fila['id_docente']; ?>">Editar</a>
                            <a href="delete_process.php?clave=<?php echo $fila['id_docente']; ?>">Eliminar</a>
                        </td>
                    </tr>
                <?php } ?>
            </table>
        </section>
    </main>

    <footer>
        <p>&copy; 2024 Sistema de Gestión de Profesores</p>
    </footer>
</body>
</html>
