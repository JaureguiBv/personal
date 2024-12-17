<?php
include '../db.php';

// Obtener los datos del formulario
$nombre = $_POST['nombre'];
$edad = $_POST['edad'];
$genero = $_POST['genero'];

// Insertar los datos en la tabla Profesor
$sql = "INSERT INTO docente (
nombre,
edad,
genero
) 
        VALUES ('$nombre', '$edad', '$genero')";

if ($CONEXION->query($sql) === TRUE) {
    echo "Profesor creado correctamente.";
    header("location: read.php");
} else {
    echo "Error al crear el profesor: " . $CONEXION->error;
}

$CONEXION->close();
?>
