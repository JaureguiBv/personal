<?php
include '../db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Eliminamos la materia
    $sql = "DELETE FROM Materia WHERE id_materia = ?";
    $stmt = $CONEXION->prepare($sql);
    $stmt->bind_param('i', $id);
    $stmt->execute();

    header('Location: read .php');
} else {
    header('Location: index.php');
}
?>
