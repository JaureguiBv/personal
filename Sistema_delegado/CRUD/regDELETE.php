<?php
include('../conexion.php');

if (!$conn) {
    die("Conexión fallida: " . mysqli_connect_error());
}

if (isset($_POST['eliminar'])) {
    $codigo = $_POST['codigo']; 
    $consulta = "UPDATE tblalumnos SET aluCandidato = 'no' WHERE aluCodigo = '$codigo'";
    $resultado = mysqli_query($conn, $consulta);

    if ($resultado) {
        header("location: ../bienvenido.php");
    } else {
        echo "Error al eliminar el registro: " . mysqli_error($conn);
    }
} else {
    echo "Código no recibido.";
}

// Cierra la conexión
mysqli_close($conn);
?>
