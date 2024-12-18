<?php
session_start(); 

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['aluNombre'])) {
    // Si no hay sesión iniciada, redirigir a la página de inicio de sesión
    header("Location: index.php");
    exit(); // Asegúrate de hacer un exit después de header
}

// Aquí puedes acceder al aluCodigo que se guardó al iniciar sesión
if (isset($_SESSION['aluCodigo'])) {
    $codigoAlumno = $_SESSION['aluCodigo']; // Almacena el código del alumno en una variable
    // Puedes usar $codigoAlumno en cualquier parte de este script
} else {
    echo "No se ha guardado el código del alumno.";
}
?>
