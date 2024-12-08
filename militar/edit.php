<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $codigo_soldado = $_POST['codigo_soldado'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $grado = $_POST['grado'];
    $id_cuerpo = $_POST['id_cuerpo'];
    $id_cuartel = $_POST['id_cuartel'];
    $id_compania = $_POST['id_compania'];

    $sql = "UPDATE Soldado SET nombre='$nombre', apellido='$apellido', grado='$grado', id_cuerpo='$id_cuerpo', id_cuartel='$id_cuartel', id_compania='$id_compania' WHERE codigo_soldado=$codigo_soldado";

    if ($conn->query($sql) === TRUE) {
        echo "Soldado actualizado exitosamente. <a href='index.php'>Volver al listado</a>";
    } else {
        echo "Error: " . $conn->error;
    }
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM Soldado WHERE codigo_soldado = $id";
    $result = $conn->query($sql);
    $soldado = $result->fetch_assoc();
}
?>

<h2>Editar Soldado</h2>
<form method="POST">
    <input type="hidden" name="codigo_soldado" value="<?php echo $soldado['codigo_soldado']; ?>">

    <label for="nombre">Nombre:</label><br>
    <input type="text" name="nombre" value="<?php echo $soldado['nombre']; ?>" required><br>

    <label for="apellido">Apellido:</label><br>
    <input type="text" name="apellido" value="<?php echo $soldado['apellido']; ?>" required><br>

    <label for="grado">Grado:</label><br>
    <input type="text" name="grado" value="<?php echo $soldado['grado']; ?>" required><br>

    <label for="id_cuerpo">Cuerpo (ID):</label><br>
    <input type="number" name="id_cuerpo" value="<?php echo $soldado['id_cuerpo']; ?>" required><br>

    <label for="id_cuartel">Cuartel (ID):</label><br>
    <input type="number" name="id_cuartel" value="<?php echo $soldado['id_cuartel']; ?>" required><br>

    <label for="id_compania">Compañía (ID):</label><br>
    <input type="number" name="id_compania" value="<?php echo $soldado['id_compania']; ?>" required><br>

    <input type="submit" value="Actualizar Soldado">
</form>
