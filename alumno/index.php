<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD en PHP y MariaDB</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
    <h1>Gestión de Personas</h1>
    <a href="add.php" class="button">Añadir Persona</a>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Edad</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include 'config.php';
            $stmt = $conn->query("SELECT * FROM persona");
            while ($row = $stmt->fetch()) {
                echo "<tr>
                    <td>{$row['id']}</td>
                    <td>{$row['nombre']}</td>
                    <td>{$row['edad']}</td>
                    <td>
                        <a href='edit.php?id={$row['id']}' class='button'>Editar</a>
                        <a href='delete.php?id={$row['id']}' class='button delete'>Eliminar</a>
                    </td>   
                </tr>";
            }
            ?>
        </tbody>
    </table>
    <script src="assets/script.js"></script>
</body>
</html>
