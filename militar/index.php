<?php
include 'db.php';

$sql = "SELECT * FROM Soldado";
$result = $conn->query($sql);

echo "<h2>Listado de Soldados</h2>";
echo "<table border='1'>
<tr>
    <th>Nombre</th>
    <th>Apellido</th>
    <th>Grado</th>
    <th>Cuerpo</th>
    <th>Cuartel</th>
    <th>Compañía</th>
    <th>Acciones</th>
</tr>";

while ($row = $result->fetch_assoc()) {
    echo "<tr>
    <td>" . $row['nombre'] . "</td>
    <td>" . $row['apellido'] . "</td>
    <td>" . $row['grado'] . "</td>
    <td>" . $row['id_cuerpo'] . "</td>
    <td>" . $row['id_cuartel'] . "</td>
    <td>" . $row['id_compania'] . "</td>
    <td><a href='edit.php?id=" . $row['codigo_soldado'] . "'>Editar</a> | <a href='delete.php?id=" . $row['codigo_soldado'] . "'>Eliminar</a></td>
    </tr>";
}
echo "</table>";

echo "<a href='create.php'>Crear Nuevo Soldado</a>";
?>
