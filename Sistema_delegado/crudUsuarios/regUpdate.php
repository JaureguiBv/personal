<?php       
include("../conexion.php");

if (isset($_POST['editar'])) {
    if (
        strlen($_POST['codigo']) >= 1 &&
        strlen($_POST['nombre']) >= 1 &&
        strlen($_POST['apellido']) >= 1 &&
        strlen($_POST['candidato']) >= 1 &&
        strlen($_POST['usuario']) >= 1 &&
        strlen($_POST['password']) >= 1 
    ) {
        $codigo = trim($_POST['codigo']);
        $nombre = trim($_POST['nombre']);
        $apellido = trim($_POST['apellido']);
        $candidato = trim($_POST['candidato']);
        $usuario = trim($_POST['usuario']);
        $password = trim($_POST['password']);
        
        $codigoOriginal = trim($_POST['codigo_original']);

        $consulta = "UPDATE tblalumnos
            SET aluCodigo = '$codigo',
            aluNombre = '$nombre',
            aluApellido = '$apellido',
            aluCandidato = '$candidato',
            aluUsuario = '$usuario',
            aluPassword = '$password'
            WHERE aluCodigo = '$codigoOriginal'";

        $resultado = mysqli_query($conn, $consulta);

        if ($resultado) {
            header("location: ../usuario.php");
        } else {
            echo "Error en la actualización de datos: " . mysqli_error($conn);
        }
    } else {
        echo "Por favor complete todos los campos.";
    }
}
?>
