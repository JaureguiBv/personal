<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $grado = $_POST['grado'];
    $id_cuerpo = $_POST['id_cuerpo'];
    $id_cuartel = $_POST['id_cuartel'];
    $id_compania = $_POST['id_compania'];

    $sql = "INSERT INTO Soldado (nombre, apellido, grado, id_cuerpo, id_cuartel, id_compania)
            VALUES ('$nombre', '$apellido', '$grado', '$id_cuerpo', '$id_cuartel', '$id_compania')";

    if ($conn->query($sql) === TRUE) {
        echo "Nuevo soldado creado exitosamente. <a href='index.php'>Volver al listado</a>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<h2>Crear Nuevo Soldado</h2>
<form method="POST">
    <label for="nombre">Nombre:</label><br>
    <input type="text" name="nombre" required><br>

    <label for="apellido">Apellido:</label><br>
    <input type="text" name="apellido" required><br>

    <label for="grado">Grado:</label><br>
    <input type="text" name="grado" required><br>

    <label for="id_cuerpo">Cuerpo (ID):</label><br>
    <input type="number" name="id_cuerpo" required><br>

    <label for="id_cuartel">Cuartel (ID):</label><br>
    <input type="number" name="id_cuartel" required><br>

    <label for="id_compania">Compañía (ID):</label><br>
    <input type="number" name="id_compania" required><br>

    <input type="submit" value="Crear Soldado">
</form>
