<?php
include '../db.php';

$id = $_GET['id'];
$sql = "DELETE FROM estudiante WHERE id_estudiante = $id";

if ($CONEXION->query($sql) === TRUE) {
    echo "Alumno eliminado correctamente.";
    header("location: read.php");
} else {
    echo "Error al eliminar el alumno: " . $CONEXION->error;
}

$CONEXION->close();
?>
