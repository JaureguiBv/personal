<?php 
    include ("../conexion.php");

    function eliminarAlumno($codigo) {
        global $conn; // Usar la conexión global de la base de datos
        
        $consulta = "DELETE FROM tblalumnos WHERE aluCodigo = '$codigo'";
        $resultado = mysqli_query($conn, $consulta);
    
        if ($resultado) {
            echo "Registro eliminado exitosamente.";
        } else {
            echo "Error al eliminar el registro: " . mysqli_error($conn);
        }
    }
    
?>