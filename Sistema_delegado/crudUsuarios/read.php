<?php
session_start();
include("../conexion.php");

if (isset($_POST['registrar'])) {
    // Verificar que todos los campos sean llenados
    if (strlen($_POST['codigo']) >= 1 &&
        strlen($_POST['nombre']) >= 1 &&
        strlen($_POST['apellido']) >= 1 &&
        strlen($_POST['candidato']) >= 1 &&
        strlen($_POST['usuario']) >= 1 &&
        strlen($_POST['password']) >= 1
    ) {
        $codigo = trim($_POST['codigo']);
        $nombre = trim($_POST['nombre']);
        $apellido = trim($_POST['apellido']);
        $candidato = trim($_POST['candidato']); // Valor del select
        $usuario = trim($_POST['usuario']);
        $password = trim($_POST['password']);

        

        // Consulta para insertar en la base de datos
        $consulta = "INSERT INTO tblalumnos (aluCodigo, aluNombre, aluApellido, aluCandidato, aluUsuario, aluPassword) VALUES (
            '$codigo', '$nombre', '$apellido', '$candidato', '$usuario', '$password')";

        // Ejecutar la consulta
        $resultado = mysqli_query($conn, $consulta);

        if ($resultado) {
            // Iniciar sesión y almacenar datos del usuario
            $_SESSION['aluCodigo'] = $codigo;
            $_SESSION['aluNombre'] = $nombre;
            
            // Redirigir al usuario al dashboard o página de inicio
            $_SESSION['mensaje'] = "Registro exitoso. ¡Bienvenido, $nombre!";
            header("Location: ../usuario.php"); // Cambia a la ruta de tu página de inicio
            exit();
        } else {
            echo "<div class='alert alert-danger'>ERROR: " . mysqli_error($conn) . "</div>";
        }
    } else {
        echo "<div class='alert alert-warning'>Todos los campos son obligatorios.</div>";
    }
}
?>
