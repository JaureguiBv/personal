<?php
    include("../conexion.php");

    // Verificamos que la conexión se haya realizado correctamente
    if (!$conn) {
        die("Error de conexión a la base de datos: " . mysqli_connect_error());
    }

    // Verificamos que se haya pasado un código para eliminar
    if (isset($_GET['eliminar']) && isset($_GET['codigo'])) {
        $codigo = $_GET['codigo'];

        // 1. Eliminamos primero los registros relacionados en la tabla `votaciones`
        $queryDeleteVotaciones = $conn->prepare("DELETE FROM votaciones WHERE codCandidato = ?");
        if ($queryDeleteVotaciones === false) {
            die("Error en la preparación de la consulta: " . $conn->error);
        }
        $queryDeleteVotaciones->bind_param("s", $codigo); // 's' para indicar que es un string
        $queryDeleteVotaciones->execute();
        $queryDeleteVotaciones->close();

        // 2. Ahora eliminamos el registro en `tblalumnos`
        $queryDeleteAlumno = $conn->prepare("DELETE FROM tblalumnos WHERE aluCodigo = ?");
        if ($queryDeleteAlumno === false) {
            die("Error en la preparación de la consulta: " . $conn->error);
        }
        $queryDeleteAlumno->bind_param("s", $codigo);

        if ($queryDeleteAlumno->execute()) {
            header("Location: ../usuario.php"); // Redireccionamos después de eliminar
            exit();
        } else {
            echo "No se pudo borrar al usuario: " . $conn->error;
        }

        $queryDeleteAlumno->close();
    } else {
        echo "No se encontró ningún código para eliminar.";
    }

    // Cerramos la conexión
    $conn->close();
?>
