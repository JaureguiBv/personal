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
<a href="crear_soldado.php">Crear soldado</a>