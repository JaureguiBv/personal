<?php
include '../db.php';

// Obtener datos del formulario
$nombre = $_POST['nombre'];
$genero = $_POST['genero'];
$carrera_id = $_POST['carrera'];  // Recibimos la carrera seleccionada



$sql = "INSERT INTO estudiante ( nombre, genero, carrera_id) 
        VALUES ( '$nombre', '$genero', '$carrera_id')";

if ($CONEXION->query($sql) === TRUE) {
    echo "Alumno creado correctamente.";
    header("location: read.php");
} else {
    echo "Error al crear el alumno: " . $CONEXION->error;
}

$CONEXION->close();
?>
