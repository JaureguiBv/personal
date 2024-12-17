<?php
include 'db.php';

// Verificar si se recibió el código del soldado
if (isset($_GET['codigo'])) {
    $codigo = $_GET['codigo'];

    // Eliminar el soldado de la base de datos
    $sql = "DELETE FROM Soldado WHERE Codigo_Soldado = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$codigo]);

    echo "Soldado eliminado exitosamente!";
    header("Location: index.php"); // Redirigir de vuelta a la lista de soldados
    exit();
} else {
    echo "No se ha proporcionado un código válido de soldado.";
}
