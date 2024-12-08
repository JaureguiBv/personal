<?php
include 'db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM Soldado WHERE codigo_soldado = $id";

    if ($conn->query($sql) === TRUE) {
        echo "Soldado eliminado exitosamente. <a href='index.php'>Volver al listado</a>";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>
