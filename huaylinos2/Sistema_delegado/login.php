<?php
session_start(); 

include("conexion.php");

if (isset($_POST['login'])) {
    if (strlen($_POST['usuario']) >= 1 && strlen($_POST['password']) >= 1) {
        $usuario = trim($_POST['usuario']);
        $password = trim($_POST['password']);

        // Consulta para verificar las credenciales del usuario
        $consulta = "SELECT * FROM tblalumnos WHERE aluUsuario = '$usuario' AND aluPassword = '$password'";
        $resultado = mysqli_query($conn, $consulta);

        if (mysqli_num_rows($resultado) == 1) {
            // Guardar los datos del usuario en la sesión
            $usuarioData = mysqli_fetch_assoc($resultado); // Obtener los datos del usuario
            $_SESSION['aluNombre'] = $usuarioData['aluNombre']; // Almacena el nombre en la sesión
            $_SESSION['aluCodigo'] = $usuarioData['aluCodigo']; // Almacena el código en la sesión

            // Redirigir a la página del usuario
            header("Location: usuario.php");
            exit(); 
        } else {
            echo '<div class="alert alert-danger" role="alert">Clave o contraseña incorrectas, por favor intente de nuevo</div>';
        }
    } else {
        echo '<div class="alert alert-info" role="alert">Por favor, complete los campos</div>';
    }
}
?>