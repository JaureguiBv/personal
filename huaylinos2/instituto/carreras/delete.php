<?php
include '../db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Eliminamos la carrera
    $sql = "DELETE FROM Carrera WHERE id_carrera = ?";
    $stmt = $CONEXION->prepare($sql);
    $stmt->bind_param('i', $id);
    $stmt->execute();

    header('Location: read.php');
} else {
    header('Location: read.php');
}
?>
