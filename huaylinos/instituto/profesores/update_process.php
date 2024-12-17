<?php
include '../db.php';

// Obtener datos del formulario
$clave_profesor = $_POST['clave'];
$nombre = $_POST['nombre'];
$edad = $_POST['edad'];
$genero = $_POST['genero'];

// Actualizar los datos del profesor en la base de datos
$sql = "UPDATE docente SET nombre = '$nombre', edad = '$edad', genero = '$genero' WHERE id_docente = $clave_profesor";

if ($CONEXION->query($sql) === TRUE) {
    echo "Profesor actualizado correctamente.";
    header("location: read.php");
} else {
    echo "Error al actualizar el profesor: " . $CONEXION->error;
}

$CONEXION->close();
?>
