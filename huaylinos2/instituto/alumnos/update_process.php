<?php
include '../db.php';

$id=$_POST['id'];
$nombre = $_POST['nombre'];
$genero = $_POST['genero'];
$carrera_id = $_POST['carrera_id'];

$sql = "UPDATE estudiante SET nombre='$nombre', genero='$genero', carrera_id='$carrera_id' 
WHERE id_estudiante= $id";

if ($CONEXION->query($sql) === TRUE) {
    echo "Alumno actualizado correctamente.";
    header("location: read.php");
} else {
    echo "Error al actualizar el alumno: " . $CONEXION->error;
}

$CONEXION->close();
?>
