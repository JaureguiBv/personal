<?php
include '../db.php';

$clave_profesor = $_GET['clave'];  // Recibimos la clave del profesor a eliminar

$sql = "DELETE FROM docente WHERE id_docente = $clave_profesor";

if ($CONEXION->query($sql) === TRUE) {
    echo "Profesor eliminado correctamente.";
    header("location: read.php");
} else {
    echo "Error al eliminar el profesor: " . $CONEXION->error;
}

$CONEXION->close();
?>
